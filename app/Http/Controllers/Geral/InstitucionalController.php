<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repository\InstitucionalRepository;
use App\Http\Repository\InstitucionalCategoriaRepository;

/**
 * @group Geral / Institucional
 *
 * APIs para gerenciar os dados institucionais
 */
class InstitucionalController extends Controller
{
    private $repository;
    private $institucionalCategoriaRepository;
    
    public function __construct(
        InstitucionalRepository $repository,
        InstitucionalCategoriaRepository $institucionalCategoriaRepository
    ){
        $this->repository = $repository;
        $this->institucionalCategoriaRepository = $institucionalCategoriaRepository;
    }

    /**
     * Listar Categorias
     *
     * Método para listar as categorias de institucional
     * 
     * @response 400 {
     *     "vazio": true
     * }
     * 
     * @response {
     *      "vazio": false,
     *      "data": [{
     *          "id": 1,
     *          "titulo": "Quem Somos",
     *          "resumo": "...",
     *          "arquivo": 1
     *     }]
     * }
     */
    public function categorias(Request $request)
    {
        $result = $this->institucionalCategoriaRepository->query()
            ->selectRaw('instc_id as id, instc_titulo as titulo, instc_resumo as resumo, arq_id as arquivo')
            ->where('instc_ativo', '=', '1')
            ->orderBy('instc_relevancia', 'desc')
            ->get();
        if($result->count() < 1){
            return response()->json([
                'vazio' => true
            ], 400);
        }
        
        return response()->json([
            "vazio" => false,
            "data" => $result
        ]);
    }

    /**
     * Consultar Categoria
     *
     * Método para mostar os detalhes de uma categoria institucional
     *
     * @urlParam id required ID da categoria institucional
     * 
     * @response 400 {
     *     "vazio": true
     * }
     * 
     * @response {
     *      "vazio": false,
     *      "data": {
     *          "id": 1,
     *          "titulo": "Quem Somos",
     *          "resumo": "...",
     *          "arquivo": 1
     *     }
     * }
     */
    public function categoria(Request $request, $id)
    {
        $result = $this->institucionalCategoriaRepository->query()
            ->selectRaw('instc_id as id, instc_titulo as titulo, instc_resumo as resumo, arq_id as arquivo')
            ->where('instc_id', '=', $id)
            ->first();
        if(!$result){
            return response()->json([
                'vazio' => true
            ], 400);
        }
        
        return response()->json([
            "vazio" => false,
            "data" => $result
        ]);
    }

    /**
     * Listar Institucional
     *
     * Método para listar os dados institucionais da categoria
     *
     * @urlParam categoria required ID da categoria institucional
     * 
     * @response 400 {
     *     "vazio": true
     * }
     * 
     * @response {
     *      "vazio": false,
     *      "data": [{
     *          "id": 1,
     *          "titulo": "Termos de uso",
     *          "texto": "..."
     *     }]
     * }
     */
    public function index(Request $request, $id)
    {
        $result = $this->repository->query()
            ->selectRaw('inst_id as id, inst_titulo as titulo, inst_texto as texto')
            ->where('instc_id', '=', $id)
            ->where('inst_ativo', '=', '1')
            ->orderBy('inst_relevancia', 'desc')
            ->get();
        if($result->count() < 1){
            return response()->json([
                'vazio' => true
            ], 400);
        }
        
        return response()->json([
            "vazio" => false,
            "data" => $result
        ]);
    }

    /**
     * Consultar Institucional
     *
     * Método para consultar os dados de um registro institucional
     *
     * @urlParam id required ID do institucional
     * 
     * @response 400 {
     *     "erro": true,
     *     "mensagem": "Os dados institucionais não foram encontrados"
     * }
     * 
     * @response {
     *      "erro": false,
     *      "data": {
     *          "id": 1,
     *          "titulo": "Termos de uso",
     *          "texto": "..."
     *     }
     * }
     */
    public function show(Request $request, $id)
    {
        $result = $this->repository->findBy("inst_id", $id);
        if(!$result){
            return response()->json([
                'erro' => true,
                'mensagem' => 'Os dados institucionais não foram encontrados'
            ], 400);
        }
        
        return response()->json([
            "erro" => false,
            "data" => [
                'id' => $result->inst_id,
                'titulo' => $result->inst_titulo,
                'texto' => $result->inst_texto
            ]
        ]);
    }
}