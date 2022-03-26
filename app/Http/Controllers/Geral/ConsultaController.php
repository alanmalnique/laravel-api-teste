<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Request\Geral\Consulta\ConsultaCepRequest;

use App\Http\Service\Geral\ConsultaService;

/**
 * @group Geral / Consultas
 *
 * APIs para gerenciar as consultas aos bureaus.
 */
class ConsultaController extends Controller
{
    private $service;
    
    public function __construct(
        ConsultaService $service
    ){
        $this->service = $service;
    }

    /**
     * Consulta os dados de um CEP
     *
     * Método para consultar os dados de um CEP
     * 
     * @response 400 {
     *     "erro": true,
     *     "mensagem": "CEP não encontrado"
     * }
     * 
     * @response {
     *      "erro": false,
     *      "data": {
     *          "cep": "01001-000",
     *          "logradouro": "Praça da Sé",
     *          "complemento": "lado ímpar",
     *          "bairro": "Sé",
     *          "localidade": "São Paulo",
     *          "uf": "SP",
     *          "unidade": "",
     *          "ibge": "3550308",
     *          "gia": "1004"
     *     }
     * }
     */
    public function cep(ConsultaCepRequest $request)
    {
        $arrConsulta = array(
            "cep" => $request->input('cep')
        );

        $result = $this->service->cep($arrConsulta);

        if (isset($result['erro'])) {
            return response([
                "erro" => true, 
                "mensagem" => "CEP não encontrado"
            ], 400);
        }
        
        return response()->json([
            "erro" => false,
            "data" => $result
        ]);
    }
}