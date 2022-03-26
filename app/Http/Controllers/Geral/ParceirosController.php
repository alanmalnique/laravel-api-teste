<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repository\ParceirosRepository;

/**
 * @group Geral / Parceiros
 *
 * APIs para gerenciar os dados de parceiros
 */
class ParceirosController extends Controller
{
    private $repository;
    
    public function __construct(
        ParceirosRepository $repository
    ){
        $this->repository = $repository;
    }

    /**
     * Listar Parceiros
     *
     * Método para listar os parceiros
     *
     * @queryParam perPage int Registros por página
     * @queryParam page int Página
     * 
     *@response {
     *   "current_page": 1,
     *   "data": [
     *       {
     *          "id": 1,
     *          "nome": "Quem Somos",
     *          "descricao": "...",
     *          "link": "...",
     *          "arquivo": 1
     *       }
     *   ],
     *   "first_page_url": "http://domain/api/geral/parceiros?page=1",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": "http://domain/api/geral/parceiros?page=1",
     *   "next_page_url": null,
     *   "path": "http://domain/api/geral/parceiros",
     *   "per_page": 20,
     *   "prev_page_url": null,
     *   "to": 1,
     *   "total": 1
     * }
     */
    public function index(Request $request)
    {
        $result = $this->repository->listItems($request->all(), $request->input('perPage', 20));
        
        return response()->json($result);
    }
}