<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repository\BannerRepository;

/**
 * @group Geral / Banner
 *
 * APIs para gerenciar os dados de banners
 */
class BannerController extends Controller
{
    private $repository;
    
    public function __construct(
        BannerRepository $repository
    ){
        $this->repository = $repository;
    }

    /**
     * Listar Banners
     *
     * Método para listar os banners
     * 
     *@response {
     *   "current_page": 1,
     *   "data": [
     *       {
     *          "id": 1,
     *          "titulo": "Banner 01",
     *          "descricao": "...",
     *          "link": "...",
     *          "arquivo": 1,
     *          "arquivo_pasta": "banner",
     *          "arquivo_extensao": "jpg"
     *       }
     *   ],
     *   "first_page_url": "http://domain/api/geral/banner?page=1",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": "http://domain/api/geral/banner?page=1",
     *   "next_page_url": null,
     *   "path": "http://domain/api/geral/banner",
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