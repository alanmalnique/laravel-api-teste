<?php

namespace App\Http\Controllers\Geral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Interfaces\MensageriaInterface;
use App\Http\Service\Mensageria\MensageriaService;
use App\Http\Service\Mensageria\Adapter\EmailAdapter;

use App\Http\Request\Geral\Contato\FaleConoscoRequest;

/**
 * @group Geral / Contato
 *
 * APIs para gerenciar os contatos realizados com o Exoss Card
 */
class ContatoController extends Controller
{
    private $mensageriaService;

    public function __construct(){
        $this->mensageriaService = new MensageriaService(new EmailAdapter);
    }

    /**
     * Fale Conosco
     *
     * Método para enviar um email de contato
     * 
     * @response 400 {
     *     "erro": true,
     *     "mensagem": "Não foi possível enviar o email"
     * }
     * 
     * @response {
     *      "erro": false
     * }
     */
    public function faleconosco(FaleConoscoRequest $request)
    {
        // Envia o email de recuperação
        $data = array(
            "template" => "fale_conosco",
            "para" => \Config::get('contato.email_para'),
            "cc" => \Config::get('contato.email_cc'),
            "dados" => array(
                "nome" => $request->input('nome'),
                "celular" => $request->input('celular'),
                "assunto" => $request->input('assunto'),
                "mensagem" => $request->input('mensagem'),
                "email" => $request->input('email')
            )
        );
        $send = $this->mensageriaService->send($data);
        return response()->json([
            "erro" => false
        ]);
    }
}