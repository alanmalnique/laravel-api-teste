<?php

return [
    'usuario' => env('EXOSSWALLET_USUARIO'),
    'senha' => env('EXOSSWALLET_SENHA'),
    'url' => env('EXOSSWALLET_URL'),
    'versao' => env('EXOSSWALLET_VERSAO'),
    'url_retorno' => env('EXOSSWALLET_URLRETORNO'),
    'conta_digital' => env('EXOSSWALLET_CONTADIGITAL'),
    'taxas' => [
    	'adquirente' => [
    		1 => 4.98,
    		2 => 7.32,
    		3 => 8.24,
    		4 => 9.15,
    		5 => 10.55,
    		6 => 11.43,
    		7 => 12.81,
    		8 => 13.67,
    		9 => 14.53,
    		10 => 15.87,
    		11 => 16.7,
    		12 => 17.53
    	]
    ],
    'dias_recebimento' => 3
];