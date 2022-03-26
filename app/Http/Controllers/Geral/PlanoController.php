<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repository\PlanosRepository;

/**
 * @group Geral / Planos
 *
 * APIs para gerenciar os dados de planos
 */
class PlanoController extends Controller
{
    private $repository;
    
    public function __construct(
        PlanosRepository $repository
    ){
        $this->repository = $repository;
    }

    /**
     * Listar Planos
     *
     * Método para listar os planos
     *
     * @queryParam perPage int Registros por página
     * @queryParam page int Página
     * 
     *@response {
     *   "current_page": 1,
     *   "data": [
     *       {
     *          "id": 1,
     *          "titulo": "Quem Somos",
     *          "resumo": "...",
     *          "descricao": "...",
     *          "valor": 250.00,
     *          "arquivo": 1
     *       }
     *   ],
     *   "first_page_url": "http://domain/api/geral/plano?page=1",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": "http://domain/api/geral/plano?page=1",
     *   "next_page_url": null,
     *   "path": "http://domain/api/geral/plano",
     *   "per_page": 20,
     *   "prev_page_url": null,
     *   "to": 1,
     *   "total": 1
     * }
     */
    public function index(Request $request)
    {
        $request->merge(['plan_ativo' => 1]);
        $result = $this->repository->listItems($request->all(), $request->input('perPage', 20));
        
        return response()->json($result);
    }

    /**
     * Consultar Plano
     *
     * Método para consultar os dados de um registro de plano
     *
     * @urlParam id required ID do plano
     * 
     * @response 400 {
     *     "erro": true,
     *     "mensagem": "Os dados do plano não foram encontrados"
     * }
     * 
     * @response {
     *      "erro": false,
     *      "data": {
     *          "id": 1,
     *          "titulo": "Biolivre",
     *          "valor": 250,
     *          "resumo": "...",
     *          "descricao": "...",
     *          "arquivo": 1
     *     }
     * }
     */
    public function show(Request $request, $id)
    {
        $result = $this->repository->findBy("plan_id", $id);
        if(!$result){
            return response()->json([
                'erro' => true,
                'mensagem' => 'Os dados do plano não foram encontrados'
            ], 400);
        }

        return response()->json([
            "erro" => false,
            "data" => [
                'id' => $result->plan_id,
                'titulo' => $result->plan_titulo,
                'resumo' => $result->plan_resumo,
                'descricao' => $result->plan_descricao,
                'valor' => $result->plan_valor,
                'arquivo' => $result->arq_id
            ]
        ]);
    }
}