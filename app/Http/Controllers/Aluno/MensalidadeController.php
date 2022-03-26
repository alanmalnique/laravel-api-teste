<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Repository\AlunoRepository;
use App\Http\Repository\TransacaoRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;

use App\Http\Request\Aluno\Mensalidade\StoreRequest;

use App\Http\Service\Payment\PaymentService;
use App\Http\Service\Payment\Adapter\ExossWalletAdapter;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTFactory;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group Aluno / Mensalidade
 *
 * APIs para gerenciar as mensalidades das contas de alunos
 */
class MensalidadeController extends Controller
{
    private $repository;
    private $transacaoRepository;
    
    private $paymentService;

    private $guard;

    public function __construct(
        AlunoRepository $repository,
        TransacaoRepository $transacaoRepository,
        Guard $guard
    ){
        $this->repository = $repository;
        $this->transacaoRepository = $transacaoRepository;

        $this->paymentService = new PaymentService(new ExossWalletAdapter);

        $this->guard = auth('aluno');
    }

    /**
     * Mensalidade
     *
     * Retorna os dados da mensalidade do aluno
     * @authenticated
     *
     * @response 200 {
     * {
     *      "dtvencimento": "9999-99-99"
     *      "descricao": "Mensal",
     *      "valor": 150,
     *      "historico": [
     *          {
     *              "valor": 150,
     *              "dtpagto": "9999-99-99"
     *          }
     *      ]
     * }
     */
    public function mensalidade(Request $request)
    {
        $aluno = $this->guard->user();
        $aluno = $this->repository->query()
            ->selectRaw('tbl_aluno.*, tbl_planos.*')
            ->join('tbl_planos', 'tbl_planos.plan_id', '=', 'tbl_aluno.plan_id')
            ->where("alu_id", "=", $aluno->alu_id)
            ->first();
        $arr_retorno = [
            'dtvencimento' => $aluno->alu_dtvencimento,
            'descricao' => $aluno->plan_titulo,
            'valor' => $aluno->plan_valor,
            'historico' => []
        ];
        $historico = $this->transacaoRepository->query()
            ->where('alu_id', '=', $aluno->alu_id)
            ->where('tsc_status', '=', '1')
            ->get();
        if($historico->count() > 0){
            foreach($historico as $transacoes){
                $arr_retorno['historico'][] = [
                    "valor" => $transacoes->tsc_valor,
                    "dtpagto" => date("Y-m-d", strtotime($transacoes->tsc_dthrpagto))
                ];
            }
        }
        return response()->json($arr_retorno);
    }

    /**
     * Pagamento
     *
     * Realiza o pagamento da mensalidade
     * @authenticated
     *
     * @response 200 {
     * {
     *      "dtvencimento": "9999-99-99"
     *      "descricao": "Mensal",
     *      "valor": 150,
     *      "historico": [
     *          {
     *              "valor": 150,
     *              "dtpagto": "9999-99-99"
     *          }
     *      ]
     * }
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        $aluno = $this->guard->user();
        $aluno = $this->repository->query()
            ->selectRaw('tbl_aluno.*, tbl_planos.*')
            ->join('tbl_planos', 'tbl_planos.plan_id', '=', 'tbl_aluno.plan_id')
            ->where("alu_id", "=", $aluno->alu_id)
            ->first();
        $data = $request->validated();
        // Insere a transação no banco de dados
        $valor_pagamento = $aluno->plan_valor;
        $dtprevisao = date("Y-m-d", strtotime("+".\Config::get('exosswallet.dias_recebimento')." days"));
        $txadq = \Config::get('exosswallet.taxas.adquirente')[1];
        $valoradq = sprintf("%.2f", ($valor_pagamento * ($txadq / 100)));
        $transacao = $this->transacaoRepository->create([
            'alu_id' => $aluno->alu_id,
            'plan_id' => $aluno->plan_id,
            'tsc_datahora' => date("Y-m-d H:i:s"),
            'tsc_valor' => $valor_pagamento,
            'tsc_parcelas' => 1,
            'tsc_status' => 0,
            'tsc_cartaofinal' => substr(str_replace(" ", "", $data['numero']), -6),
            'tsc_bandeira' => $data['bandeira'],
            'tsc_dataprevrecimento' => $dtprevisao,
            'tsc_recebido' => 0,
            'tsc_taxaadquirente' => $txadq,
            'tsc_valoradquirente' => $valoradq,
            'tsc_valorrecebido' => $valor_pagamento - $valoradq
        ]);
        if(!$transacao){
            DB::rollback();
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível criar a transação'
            ], 400);
        }
        // Envia a cobrança para a wallet
        $arr_cobranca = [
            'value' => $valor_pagamento,
            'installments' => 1,
            'type' => 2,
            'capture' => true,
            'return_url' => \Config::get('exosswallet.url_retorno'),
            'card' => [
                'number' => str_replace(" ", "", $data['numero']),
                'month' => $data['mes'],
                'year' => $data['ano'],
                'security_code' => $data['cvv'],
                'flag' => $data['bandeira'],
                'holder' => $data['titular']
            ],
            'split' => [
                [
                    'account_number' => \Config::get('exosswallet.conta_digital'),
                    'value' => $valor_pagamento
                ]
            ]
        ];
        $cobranca = $this->paymentService->criarcobranca($arr_cobranca);
        if($cobranca['error']){
            // Altera a transação para não aprovado
            $altera_transacao = $this->transacaoRepository->update([
                'tsc_status' => 4
            ], $transacao->tsc_id, 'tsc_id');
            DB::commit();
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível realizar a cobrança no cartão: '.$cobranca['message']
            ], 400);
        }
        // altera a transação para aprovada
        $altera_transacao = $this->transacaoRepository->update([
            'tsc_dthrpagto' => date("Y-m-d"),
            'tsc_status' => 1,
            'tsc_paymentid' => $cobranca['data']['payment_id']
        ], $transacao->tsc_id, 'tsc_id');
        // Altera a data de vencimento do usuário
        $dia_vencimento = date("d", strtotime($aluno->alu_dtvencimento));
        $data_vencimento = date("Y-m-", strtotime("+1 month")).$dia_vencimento;
        $altera_aluno = $this->repository->update([
            'alu_dtvencimento' => $data_vencimento,
            'alu_ativo' => 1
        ], $aluno->alu_id, 'alu_id');
        DB::commit();
        return response()->json([
            'erro' => false
        ]);
    }
}
