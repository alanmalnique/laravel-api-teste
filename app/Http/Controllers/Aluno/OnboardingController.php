<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Repository\AlunoRepository;
use App\Http\Repository\PlanosRepository;
use App\Http\Repository\ProfessorRepository;
use App\Http\Repository\AlunoHorariosRepository;
use App\Http\Repository\AlunoAnamneseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;

use App\Http\Request\Aluno\Onboarding\LoginRequest;
use App\Http\Request\Aluno\Onboarding\StoreRequest;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTFactory;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group Aluno / Onboarding
 *
 * APIs para gerenciar o onboarding das contas de alunos
 */
class OnboardingController extends Controller
{
    private $repository;
    private $planosRepository;
    private $professorRepository;
    private $alunoHorariosRepository;
    private $alunoAnamneseRepository;

    private $guard;

    public function __construct(
        AlunoRepository $repository,
        PlanosRepository $planosRepository,
        ProfessorRepository $professorRepository,
        AlunoHorariosRepository $alunoHorariosRepository,
        AlunoAnamneseRepository $alunoAnamneseRepository,
        Guard $guard
    ){
        $this->repository = $repository;
        $this->planosRepository = $planosRepository;
        $this->professorRepository = $professorRepository;
        $this->alunoHorariosRepository = $alunoHorariosRepository;
        $this->alunoAnamneseRepository = $alunoAnamneseRepository;

        $this->guard = auth('aluno');
    }

    /**
     * Login
     *
     * Realiza o login para utilizar o painel
     *
     * @response 400 {
     *   "erro": true,
     *   "mensagem": "Usuário e/ou senha inválido!"
     * }
     *
     * @response 200 {
     *   "erro": false,
     *   "data": {
     *      "id": 1,
     *      "nome": "Aluno de Teste",
     *      "arquivo": 1,
     *      "aula_hoje": 1,
     *      "horario_aula": "19:00",
     *      "dtvencimento": "9999-99-99",
     *      "plano": {
     *          "descricao": "Mensal",
     *          "valor": 150,
     *      }
     *      "token": "..."
     *   }
     * }
     */
    public function login(LoginRequest $request)
    {
        $aluno = $this->repository->query()
            ->selectRaw('tbl_aluno.*, tbl_planos.*, tbl_professor.prof_nome, tbl_professor.arq_id as arquivo_professor, tbl_professor.prof_whatsapp, tbl_aluno.arq_id as arquivo')
            ->join('tbl_planos', 'tbl_planos.plan_id', '=', 'tbl_aluno.plan_id')
            ->join('tbl_professor', 'tbl_professor.prof_id', '=', 'tbl_aluno.prof_id')
            ->where("alu_email", "=", $request->input("email"))
            ->where("alu_ativo", "=", "1")
            ->first();
        if ($aluno && $aluno->alu_id) {
            $senha = md5($request->input('senha'));
            if ($senha == $aluno->alu_senha) {
                // Pega se o aluno tem aula
                $dia_semana = date("w");
                $query = $this->alunoHorariosRepository->query()
                    ->where('alu_id', '=', $aluno->alu_id)
                    ->where('ahor_diasemana', '=', $dia_semana)
                    ->first();
                return response()->json([
                    "erro" => false, 
                    "data" => [
                        "id" => $aluno->alu_id,
                        "nome" => $aluno->alu_nome,
                        "arquivo" => $aluno->arquivo,
                        "aula_hoje" => ($aluno->alu_dthraulaexperimental ? true : ($query ? true : false)),
                        "horario_aula" => ($aluno->alu_dthraulaexperimental ? date("H:i", strtotime($aluno->alu_dthraulaexperimental)) : ($query ? date("H:i", strtotime(date("Y-m-d").' '.$query->ahor_horario)) : '')),
                        "dtvencimento" => $aluno->alu_dtvencimento,
                        "plano" => [
                            "descricao" => $aluno->plan_titulo,
                            "valor" => $aluno->plan_valor
                        ],
                        "professor" => [
                            "id" => $aluno->prof_id,
                            "nome" => $aluno->prof_nome,
                            "whatsapp" => $aluno->prof_whatsapp,
                            "arquivo" => $aluno->arquivo_professor
                        ],
                        "token" => JWTAuth::fromUser($aluno)
                    ]
                ]);
            }
        }
        return response()->json([
            "erro" => true, 
            "mensagem" => "Usuário e/ou senha inválido!"
        ], 400);
    }

    /**
     * Cadastro
     *
     * Realiza o cadastro do aluno para utilizar o painel
     *
     * @response 400 {
     *   "erro": true,
     *   "mensagem": "Não foi possível realizar o cadastro"
     * }
     *
     * @response 200 {
     *   "erro": false
     * }
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        $data = $request->validated();
        // Insere o aluno
        $insere = $this->repository->create([
            'prof_id' => $data['professor'],
            'plan_id' => $data['plano'],
            'alu_nome' => $data['nome'],
            'alu_email' => $data['email'],
            'alu_cpf' => $data['cpf'],
            'alu_senha' => md5($data['senha']),
            'alu_whatsapp' => $data['whatsapp'],
            'alu_endlogradouro' => $data['endereco'],
            'alu_endnumero' => $data['numero'],
            'alu_endcomplemento' => $data['complemento'],
            'alu_endbairro' => $data['bairro'],
            'alu_endcidade' => $data['cidade'],
            'alu_enduf' => $data['uf'],
            'alu_endcep' => $data['cep'],
            'alu_endpais' => $data['pais'],
            'alu_dtnascimento' => date("Y-m-d", strtotime(str_replace("/", "-", $data['dtnascimento']))),
            'alu_comoconheceu' => 1,
            'alu_dthraulaexperimental' => date("Y").'-'.str_pad($data['aula']['mes'], '0', 2, STR_PAD_LEFT).'-'.str_pad($data['aula']['dia'], '0', 2, STR_PAD_LEFT).' '.$data['aula']['horario'],
            'alu_ativo' => 1
        ]);
        if(!$insere){
            DB::rollback();
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível realizar o cadastro do aluno'
            ], 400);
        }
        $anamnese = $data['anamnese'];
        // Insere a anamnese do aluno
        $anamnese = $this->alunoAnamneseRepository->create([
            'alu_id' => $insere->alu_id,
            'anam_praticaatividade' => $anamnese['praticaatividade'],
            'anam_qualatividade' => $anamnese['qualatividade'],
            'anam_tomamedicamento' => $anamnese['tomamedicamento'],
            'anam_qualmedicamento' => $anamnese['qualmedicamento'],
            'anam_fumante' => $anamnese['fumante'],
            'anam_fumaquantotempo' => $anamnese['fumaquantotempo'],
            'anam_hipertensao' => $anamnese['hipertensao'],
            'anam_doenca' => $anamnese['doenca'],
            'anam_qualdoenca' => $anamnese['qualdoenca'],
            'anam_apresentador' => $anamnese['apresentador'],
            'anam_qualdor' => $anamnese['qualdor'],
            'anam_qualmovimentosentedor' => $anamnese['qualmovimentosentedor'],
            'anam_fezcirurgia' => $anamnese['fezcirurgia'],
            'anam_qualcirurgia' => $anamnese['qualcirurgia'],
            'anam_tempocirurgia' => $anamnese['tempocirurgia'],
            'anam_objetivo' => $anamnese['objetivo'],
        ]);
        if(!$anamnese){
            DB::rollback();
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível realizar o cadastro da anamnese do aluno'
            ], 400);
        }
        DB::commit();
        return response()->json([
            'erro' => false
        ]);
    }
}
