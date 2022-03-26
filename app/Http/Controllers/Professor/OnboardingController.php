<?php

namespace App\Http\Controllers\Professor;

use App\Http\Repository\ProfessorRepository;
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
 * @group Professor / Onboarding
 *
 * APIs para gerenciar as contas de professores
 */
class OnboardingController extends Controller
{
    private $repository;

    private $guard;

    public function __construct(
        ProfessorRepository $repository,
        Guard $guard
    ){
        $this->repository = $repository;
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
     *      "nome": "Professor de teste",
     *      "arquivo": 1,
     *      "token": "..."
     *   }
     * }
	 */
    public function login(LoginRequest $request)
    {
        $professor = $this->repository->query()
            ->where("prof_email", "=", $request->input("email"))
            ->where("prof_ativo", "=", "1")
            ->first();
        if ($professor && $professor->prof_id) {
            $senha = md5($request->input('senha'));
            if ($senha == $professor->prof_senha) {
                return response()->json([
                    "erro" => false, 
                    "data" => [
                        "id" => $professor->prof_id,
                        "nome" => $professor->prof_nome,
                        "email" => $professor->prof_email,
                        "celular" => $professor->prof_whatsapp,
                        "arquivo" => $professor->arq_id,
                        "token" => JWTAuth::fromUser($professor)
                    ]
                ]);
            }
        }
        return response()->json([
            "erro" => true, 
            "mensagem" => "Usuário e/ou senha inválido!"
        ], 400);
    }
}
