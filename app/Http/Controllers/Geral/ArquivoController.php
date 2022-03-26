<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repository\ArquivoRepository;
use App\Utils\GeneralUtils;
use File;
use Response;

/**
 * @group Geral / Arquivo
 *
 * APIs para baixar arquivo
 */
class ArquivoController extends Controller
{
    private $arquivoRepository;
    
    public function __construct(ArquivoRepository $arquivoRepository) {
        $this->arquivoRepository = $arquivoRepository;
    }

    /**
     * Ver arquivo
     *
     * Método para baixar arquivo
     * 
     * @urlParam arq_id required ID do arquivo
     * 
     * @response 400 {
     *     "erro": true,
     *     "mensagem": "Arquivo não encontrado"
     * }
     * 
     */
    public function ver($arq_id)
    {
        $arquivo = $this->arquivoRepository->find($arq_id, "arq_id");

        if (!$arquivo) {
            return response([
                "erro" => true, 
                "mensagem" => "Arquivo não encontrado"
            ], 400);
        }

        $arquivo->filepath = GeneralUtils::filePath($arquivo);

        if (!File::exists($arquivo->filepath)) {
            abort(404);
        }

        $file = File::get($arquivo->filepath);
        $type = File::mimeType($arquivo->filepath);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    /**
     * Baixar arquivo
     *
     * Método para baixar arquivo
     * 
     * @urlParam arq_id required ID do arquivo
     * 
     * @response 400 {
     *     "erro": true,
     *     "mensagem": "Arquivo não encontrado"
     * }
     * 
     */
    public function baixar($arq_id)
    {
        $arquivo = $this->arquivoRepository->find($arq_id, "arq_id");

        if (!$arquivo) {
            return response([
                "erro" => true, 
                "mensagem" => "Arquivo não encontrado"
            ], 400);
        }

        $arquivo->filepath = GeneralUtils::filePath($arquivo);

        return response()->download($arquivo->filepath);
    }

    /**
     * Dados do arquivo
     *
     * Método para ver dados do arquivo
     * 
     * @urlParam arq_id required ID do arquivo
     * 
     * @response 200 {
     *     "arq_id": 1,
     *     "arq_data": "2020-06-09",
     *     "arq_pasta": "teste",
     *     "arq_extensao": "png",
     *     "arq_nome": "logo.png",
     *     "filepath": "/path/to/storage/5.png"
     * }
     * 
     * @response 400 {
     *     "erro": true,
     *     "mensagem": "Arquivo não encontrado"
     * }
     * 
     */
    public function dados($arq_id)
    {
        $arquivo = $this->arquivoRepository->find($arq_id, "arq_id");

        if (!$arquivo) {
            return response([
                "erro" => true, 
                "mensagem" => "Arquivo não encontrado"
            ], 400);
        }

        $arquivo->filepath = GeneralUtils::filePath($arquivo);

        return response()->json($arquivo);
    }
}