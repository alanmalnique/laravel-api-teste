<?php

namespace App\Http\Controllers\Professor;

use App\Http\Repository\AulaProfessorRepository;
use App\Http\Repository\ProfessorRepository;
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
 * @group Professor / Aula
 *
 * APIs para gerenciar as aulas de alunos
 */
class AulaController extends Controller
{
    private $repository;
    private $aulaProfessorRepository;

    private $guard;

    public function __construct(
        ProfessorRepository $repository,
        AulaProfessorRepository $aulaProfessorRepository,
        Guard $guard
    ){
        $this->repository = $repository;
        $this->aulaProfessorRepository = $aulaProfessorRepository;

        $this->guard = auth('professor');
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
        $professor = $this->guard->user();
        $tipo = $request->input("tipo");
        $arr_insere = [
            'prof_id' => $professor->prof_id
        ];
        if($tipo == 1){
            $arr_insere['aprof_dthrinicio'] = date("Y-m-d H:i:s");
        }else{
            $arr_insere['aprof_dthrtermino'] = date("Y-m-d H:i:s");
        }
        $insere = $this->aulaProfessorRepository->create($arr_insere);
        if(!$insere){
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível salvar o horário'
            ], 400);
        }
        return response()->json([
            'erro' => false,
            'data' => [
                'url' => $professor->prof_urlstreaming
            ]
        ]);
    }
}
