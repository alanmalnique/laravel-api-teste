<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Repository\AlunoRepository;
use App\Http\Repository\AlunoAnamneseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;

use App\Http\Request\Aluno\Dados\UpdateRequest;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTFactory;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group Aluno / Dados
 *
 * APIs para gerenciar os dados das contas de alunos
 */
class DadosController extends Controller
{
    private $repository;
    private $alunoAnamneseRepository;

    private $guard;

    public function __construct(
        AlunoRepository $repository,
        AlunoAnamneseRepository $alunoAnamneseRepository,
        Guard $guard
    ){
        $this->repository = $repository;
        $this->alunoAnamneseRepository = $alunoAnamneseRepository;

        $this->guard = auth('aluno');
    }

    /**
     * Exibir Perfil
     *
     * Retorna os dados do perfil do aluno
     * @authenticated
     *
     * @response 400 {
     *   "vazio": true
     * }
     *
     * @response 200 {
     *   "vazio": false,
     *   "data": {
     *      "id": 1,
     *      "nome": "Aluno de Teste",
     *      "dtnascimento": "9999-99-99",
     *      "whatsapp": "(99) 99999-9999",
     *      "endereco": "Rua de Teste",
     *      "numero": "10",
     *      "complemento": "",
     *      "bairro": "Bairro Teste",
     *      "cep": "99.999-999",
     *      "email": "teste@teste.com",
     *      "anamnese": {
     *          "possui_hipertensao": 1,
     *          "pratica_atividade": 1,
     *          "quais_atividades": "Teste",
     *          "toma_medicamento": 1,
     *          "quais_medicamentos": "Teste",
     *          "fumante": 1,
     *          "fumante_tempo": "Teste",
     *          "possui_doenca": 1,
     *          "quais_doencas": "Teste",
     *          "apresenta_dor": 1,
     *          "quais_dores": "teste",
     *          "movimento_dores": "Teste",
     *          "realizou_cirurgia": 1,
     *          "quais_cirurgias": "Teste",
     *          "tempo_ultima_cirurgia": "Teste",
     *          "objetivo": "Teste"
     *      }
     *   }
     * }
     */
    public function show(Request $request)
    {
        $aluno = $this->guard->user();
        $perfil = $this->repository->perfil($aluno->alu_id);
        if(!$perfil){
            return response()->json([
                'vazio' => true
            ], 400);
        }
        $perfil->anamnese = $this->alunoAnamneseRepository->anamnese($aluno->alu_id);
        return response()->json([
            'vazio' => false,
            'data' => $perfil
        ]);
    }

    /**
     * Atualizar Perfil
     *
     * Atualiza os dados do perfil do aluno
     * @authenticated
     *
     * @response 400 {
     *   "erro": true,
     *   "mensagem": "Não foi possível alterar os dados do aluno"
     * }
     *
     * @response 200 {
     *   "erro": false
     * }
     */
    public function update(UpdateRequest $request)
    {
        $aluno = $this->guard->user();
        $data = $request->validated();
        $anamnese = $data['anamnese'];
        unset($data['anamnese']);
        if(!empty($data['alu_senha'])){
            $data['alu_senha'] = md5($data['alu_senha']);
        }else{
            unset($data['alu_senha']);
        }
        $update = $this->repository->update($data, $aluno->alu_id, 'alu_id');
        if(!$update){
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível alterar os dados do aluno'
            ], 400);
        }
        $update_anamnese = $this->alunoAnamneseRepository->update($anamnese, $aluno->alu_id, 'alu_id');
        if(!$update_anamnese){
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível alterar os dados da anamnese do aluno'
            ], 400);
        }
        return response()->json([
            'erro' => false
        ]);
    }
}
