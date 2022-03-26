<?php

namespace App\Http\Service\Geral;

use Ixudra\Curl\Facades\Curl;

class ConsultaService
{

    /**
     * Retorna os dados da consulta de um CEP
     */
    public function cep($request){
        $cep = str_replace(array(".","-"), "", $request['cep']);
        $consultacep = Curl::to(\Config::get('viacep.url_consulta').$cep.'/json')
                ->returnResponseObject()
                ->get();
        return json_decode($consultacep->content, true);
    }
}
