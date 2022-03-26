<?php
namespace App\Http\Service\Mensageria\Adapter;

use Exception;

class SMSAdapter
{
    private $serviceUrl;

    public function __construct()
    {
        $this->serviceUrl = \Config::get('facilitamovel.url_envio') . 
            '?user=' . \Config::get('facilitamovel.usuario') . 
            '&password=' . \Config::get('facilitamovel.senha');
    }

    public function send(array $data)
    {
        $number = str_replace(["(",")"," ","-"], "", $data['numero']);
        $message = urlencode('EXOSS CARD: '.$data['mensagem']);
        $urlToSend = $this->serviceUrl . '&destinatario=' . $number . '&msg=' . $message;
        
        $send = file_get_contents($urlToSend, false, stream_context_create([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false
            ],
        ]));

        if (strpos($send, ";") === false) {
			return [
                "success" => false,
                "message" => "Ocorreu um erro no envio do SMS"
            ];
        }
        
        $splitRequest = explode(";", $send);
        $messageCode = $splitRequest[1];

        return [
            "success" => true,
            "messageCode" => $messageCode
        ];
    }

}
