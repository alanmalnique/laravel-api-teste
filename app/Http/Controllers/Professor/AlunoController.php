<?php

namespace App\Http\Controllers\Professor;

use App\Http\Repository\ProfessorRepository;
use App\Http\Repository\AlunoRepository;
use App\Http\Repository\AlunoAnamneseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;

use App\Http\Request\Professor\Onboarding\LoginRequest;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTFactory;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group Professor / Aluno
 *
 * APIs para gerenciar os alunos de professores
 */
class AlunoController extends Controller
{
    private $repository;
    private $alunoRepository;
    private $alunoAnamneseRepository;

    private $guard;

    public function __construct(
        ProfessorRepository $repository,
        AlunoRepository $alunoRepository,
        AlunoAnamneseRepository $alunoAnamneseRepository,
        Guard $guard
    ){
        $this->repository = $repository;
        $this->alunoRepository = $alunoRepository;
        $this->alunoAnamneseRepository = $alunoAnamneseRepository;

        $this->guard = auth('professor');
    }

    /**
     * Listar Alunos
     *
     * Retorna os dados dos alunos do professor
     * @authenticated
     *
     * @urlParam per_page int Registros por página. 
     * @urlParam page int Página atual. 
     * 
     * @response {
     *   "current_page": 1,
     *   "data": [
     *       {
     *           "id": 1,
     *           "nome": "Aluno de teste",
     *           "whatsapp": "(99) 99999-9999"
     *       }
     *   ],
     *   "first_page_url": "http://domain/professor/aluno?page=1",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": "http://domain/aprofessor/aluno?page=1",
     *   "next_page_url": null,
     *   "path": "http://domain/professor/aluno",
     *   "per_page": 20,
     *   "prev_page_url": null,
     *   "to": 1,
     *   "total": 1
     * }
     */
    public function index(Request $request)
    {
        $professor = $this->guard->user();
        $request->merge(['professor' => $professor->prof_id]);
        $result = $this->alunoRepository->listItems($request->all(), $request->input("per_page", 20));
        return response()->json($result);
    }

    /**
     * Exibir Aluno
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
    public function show(Request $request, $id)
    {
        $perfil = $this->alunoRepository->perfil($id);
        if(!$perfil){
            return response()->json([
                'vazio' => true
            ], 400);
        }
        $perfil->anamnese = $this->alunoAnamneseRepository->anamnese($id);
        return response()->json([
            'vazio' => false,
            'data' => $perfil
        ]);
    }
}
