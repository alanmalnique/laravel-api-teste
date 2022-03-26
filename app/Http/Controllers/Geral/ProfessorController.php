<?php

namespace App\Http\Controllers\Geral;

use App\Http\Repository\ProfessorRepository;
use App\Http\Repository\ProfessorHorariosRepository;
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
 * @group Geral / Professor
 *
 * APIs para gerenciar os dados de professores
 */
class ProfessorController extends Controller
{
    private $repository;
    private $professorHorariosRepository;

    private $guard;

    public function __construct(
        ProfessorRepository $repository,
        ProfessorHorariosRepository $professorHorariosRepository,
        Guard $guard
    ){
        $this->repository = $repository;
        $this->professorHorariosRepository = $professorHorariosRepository;
    }

    /**
     * Listar Professores
     *
     * Retorna os professores ativos na plataforma
     *
     * @response 400 {
     *   "vazio": true
     * }
     *
     * @response 200 {
     *   "vazio": false,
     *   "data": [
     *      {
     *          "id": 1,
     *          "arquivo": 1,
     *          "nome": "Fulano de Tal",
     *          "descricao": "..."
     *      }
     *   ]
     * }
     */
    public function index(Request $request)
    {
        $response = $this->repository->professores();
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
     * Listar Horários
     *
     * Retorna os horários de um professor
     *
     * @response 400 {
     *   "vazio": true
     * }
     *
     * @response 200 {
     *   "vazio": false,
     *   "data": [
     *      "1": ["19:00:00", "20:00:00"]
     *   ]
     * }
     */
    public function horarios(Request $request, $professor)
    {
        $response = $this->professorHorariosRepository->horarios($professor);
        if($response->count() < 1){
            return response()->json([
                'vazio' => true
            ], 400);
        }
        $arr_horarios = [];
        foreach($response as $horarios){
            $arr_horarios[$horarios->diasemana][] = $horarios->horario;
        }
        return response()->json([
            'vazio' => false,
            'data' => $arr_horarios
        ]);
    }
}
