<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Repository\AlunoRepository;
use App\Http\Repository\AlunoHorariosRepository;
use App\Http\Repository\AulaAlunoRepository;
use App\Http\Repository\ProfessorRepository;
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
 * @group Aluno / Aula
 *
 * APIs para gerenciar as aulas de alunos
 */
class AulaController extends Controller
{
    private $repository;
    private $alunoHorariosRepository;
    private $aulaAlunoRepository;
    private $professorRepository;

    private $guard;

    public function __construct(
        AlunoRepository $repository,
        AlunoHorariosRepository $alunoHorariosRepository,
        AulaAlunoRepository $aulaAlunoRepository,
        ProfessorRepository $professorRepository,
        Guard $guard
    ){
        $this->repository = $repository;
        $this->alunoHorariosRepository = $alunoHorariosRepository;
        $this->aulaAlunoRepository = $aulaAlunoRepository;
        $this->professorRepository = $professorRepository;

        $this->guard = auth('aluno');
    }

    /**
     * Listar Horários
     *
     * Retorna os horários de aula  do aluno
     * @authenticated
     *
     * @response 400 {
     *   "vazio": true
     * }
     *
     * @response 200 {
     *   "vazio": false,
     *   "data": [
     *      {
     *          "diasemana": 1,
     *          "horario": "19:00:00",
     *          "professor": "Professor de teste"
     *      }
     *   ]
     * }
     */
    public function horarios(Request $request)
    {
        $aluno = $this->guard->user();
        $professor = $this->repository->query()
            ->selectRaw('tbl_professor.prof_nome')
            ->join('tbl_professor', 'tbl_professor.prof_id', '=', 'tbl_aluno.prof_id')
            ->where('alu_id', '=', $aluno->alu_id)
            ->first();
        $response = $this->alunoHorariosRepository->horarios($aluno->alu_id, $professor->prof_nome);
        if($response->count() < 1){
            return response()->json([
                'vazio' => true
            ], 400);
        }
        return response()->json([
            'vazio' => false,
            'data' => $response
        ]);
    }

    /**
     * Salvar Aula
     *
     * Grava o horário de entrada e saída
     * @authenticated
     *
     * @bodyParam tipo int required Tipo de registro (1-Entrada, 2-Saída)
     *
     * @response 400 {
     *   "erro": true,
     *   "mensagem": "Não foi possível salvar o horário"
     * }
     *
     * @response 200 {
     *   "erro": false,
     *   "data": {
     *       "url": "..."
     *   }
     * }
     */
    public function store(Request $request)
    {
        $aluno = $this->guard->user();
        $tipo = $request->input("tipo");
        $arr_insere = [
            'alu_id' => $aluno->alu_id
        ];
        if($tipo == 1){
            $arr_insere['aalu_dthrinicio'] = date("Y-m-d H:i:s");
        }else{
            $arr_insere['aalu_dthrtermino'] = date("Y-m-d H:i:s");
        }
        $insere = $this->aulaAlunoRepository->create($arr_insere);
        if(!$insere){
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível salvar o horário'
            ], 400);
        }
        $professor = $this->professorRepository->findBy("prof_id", $aluno->prof_id);
        return response()->json([
            'erro' => false,
            'data' => [
                'url' => $professor->prof_urlstreaming
            ]
        ]);
    }
}
