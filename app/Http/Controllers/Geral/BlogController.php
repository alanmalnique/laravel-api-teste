<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repository\BlogRepository;

/**
 * @group Geral / Blog
 *
 * APIs para gerenciar os dados de blog
 */
class BlogController extends Controller
{
    private $repository;
    
    public function __construct(
        BlogRepository $repository
    ){
        $this->repository = $repository;
    }

    /**
     * Listar Notícias
     *
     * Método para listar as notícias
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
     *          "data": "9999-99-99",
     *          "arquivo": 1,
     *          "parceiro": {
     *              "id": 1,
     *              "nome": "Testes",
     *              "arquivo": 1
     *          }
     *       }
     *   ],
     *   "first_page_url": "http://domain/api/geral/blog?page=1",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": "http://domain/api/geral/blog?page=1",
     *   "next_page_url": null,
     *   "path": "http://domain/api/geral/blog",
     *   "per_page": 20,
     *   "prev_page_url": null,
     *   "to": 1,
     *   "total": 1
     * }
     */
    public function index(Request $request)
    {
        $request->merge(['blog_ativo' => 1]);
        $result = $this->repository->listItems($request->all(), $request->input('perPage', 20));
        
        return response()->json($result);
    }

    /**
     * Consultar Notícia
     *
     * Método para consultar os dados de um registro de notícia
     *
     * @urlParam id required ID da notícia
     * 
     * @response 400 {
     *     "erro": true,
     *     "mensagem": "Os dados da notícia não foram encontrados"
     * }
     * 
     * @response {
     *      "erro": false,
     *      "data": {
     *          "id": 1,
     *          "titulo": "Quem Somos",
     *          "resumo": "...",
     *          "texto": "...",
     *          "datahora": "9999-99-99 99:99:99",
     *          "arquivo": 1,
     *          "parceiro": {
     *              "id": 1,
     *              "nome": "Testes",
     *              "url": "...",
     *              "arquivo": 1
     *          }
     *     }
     * }
     */
    public function show(Request $request, $id)
    {
        $result = $this->repository->query()
            ->join('tbl_arquivo', 'tbl_arquivo.arq_id', '=', 'tbl_blog.arq_id')
            ->where('blog_id', '=', $id)
            ->with(['parceiro'])
            ->first();
        if(!$result){
            return response()->json([
                'erro' => true,
                'mensagem' => 'Os dados da notícia não foram encontrados'
            ], 400);
        }
        $parceiro = [];
        if(!empty($result->parc_id)){
            $parceiro = [
                'id' => $result->parceiro->parc_id,
                'nome' => $result->parceiro->parc_nome,
                'url' => $result->parceiro->parc_link,
                'arquivo' => $result->parceiro->arq_id
            ];
        }
        return response()->json([
            "erro" => false,
            "data" => [
                'id' => $result->blog_id,
                'titulo' => $result->blog_titulo,
                'resumo' => $result->blog_resumo,
                'texto' => $result->blog_texto,
                'datahora' => $result->blog_datahora,
                'arquivo' => $result->arq_id,
                'arquivo_pasta' => $result->arq_pasta,
                'arquivo_extensao' => $result->arq_extensao,
                'parceiro' => $parceiro
            ]
        ]);
    }
}