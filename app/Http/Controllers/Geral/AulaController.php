<?php

namespace App\Http\Controllers\Geral;

use App\Http\Repository\AlunoRepository;
use App\Http\Repository\ProfessorRepository;
use App\Http\Repository\AulaProfessorRepository;
use App\Http\Repository\AulaAlunoRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTFactory;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group Geral / Aula
 *
 * APIs para gerenciar as aulas
 */
class AulaController extends Controller
{
    private $alunoRepository;
    private $professorRepository;
    private $aulaProfessorRepository;
    private $aulaAlunoRepository;

    public function __construct(
        AlunoRepository $alunoRepository,
        ProfessorRepository $professorRepository,
        AulaAlunoRepository $aulaAlunoRepository,
        AulaProfessorRepository $aulaProfessorRepository
    ){
        $this->alunoRepository = $alunoRepository;
        $this->professorRepository = $professorRepository;
        $this->aulaAlunoRepository = $aulaAlunoRepository;
        $this->aulaProfessorRepository = $aulaProfessorRepository;
    }

    /**
     * Salvar Aula
     *
     * Grava o horário de entrada e saída
     * @authenticated
     *
     * @bodyParam tipo int required Tipo de registro (1-Entrada, 2-Saída)
     * @bodyParam tipo_aula int required Tipo de registro (1-Professor, 2-Aluno)
     * @bodyParam id int required ID do aluno ou professor
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
        $tipo = $request->input("tipo");
        $tipo_aula = $request->input("tipo_aula");
        $id = $request->input('id');
        if($tipo == 1){
            if($tipo_aula == 1){
                $arr_insere = [
                    'prof_id' => $id
                ];
                if($tipo == 1){
                    $arr_insere['aprof_dthrinicio'] = date("Y-m-d H:i:s");
                }else{
                    $arr_insere['aprof_dthrtermino'] = date("Y-m-d H:i:s");
                }
                $insere = $this->aulaProfessorRepository->create($arr_insere);
                $professor = $this->professorRepository->findBy("prof_id", $id);
                $nome = $professor->prof_nome;
            }else{
                $arr_insere = [
                    'alu_id' => $id
                ];
                if($tipo == 1){
                    $arr_insere['aalu_dthrinicio'] = date("Y-m-d H:i:s");
                }else{
                    $arr_insere['aalu_dthrtermino'] = date("Y-m-d H:i:s");
                }
                $insere = $this->aulaAlunoRepository->create($arr_insere);
                $professor = $this->alunoRepository->query()
                    ->selectRaw('tbl_professor.*, tbl_aluno.alu_nome')
                    ->join("tbl_professor", 'tbl_professor.prof_id', '=', 'tbl_aluno.prof_id')
                    ->where('tbl_aluno.alu_id', '=', $id)
                    ->first();
                $arr_nome = explode(" ", $professor->alu_nome);
                $nome = reset($arr_nome);
            }
            if(!$insere){
                return response()->json([
                    'erro' => true,
                    'mensagem' => 'Não foi possível salvar o horário'
                ], 400);
            }
        }else{
            $update_professor = $this->aulaProfessorRepository->query()
                ->where('prof_id', '=', $id)
                ->whereRaw('aprof_dthrtermino IS NULL')
                ->update(['aprof_dthrtermino' => date("Y-m-d H:i:s")]);
            $update_aluno = $this->aulaAlunoRepository->query()
                ->join('tbl_aluno', 'tbl_aluno.alu_id', '=', 'tbl_aulaaluno.alu_id')
                ->where('tbl_aluno.prof_id', '=', $id)
                ->whereRaw('tbl_aulaaluno.aalu_dthrtermino IS NULL')
                ->update(['aalu_dthrtermino' => date("Y-m-d H:i:s")]);
            $professor = $this->professorRepository->findBy("prof_id", $id);
            $nome = $professor->prof_nome;
        }
        return response()->json([
            'erro' => false,
            'data' => [
                'url' => $professor->prof_urlstreaming,
                'nome' => $nome
            ]
        ]);
    }
}
