<?php

namespace App\Http\Service\Arquivo;

use Illuminate\Support\Facades\Storage;
use App\Http\Repository\ArquivoRepository;

class ArquivoService
{
    private $repository;
    
    public function __construct(
        ArquivoRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Grava o arquivo no diretorio e guarda o caminho no banco
     */
    public function save($nomeArquivo, $tabela)
    {
        $explodedFileName = explode(".", $nomeArquivo);
        $extensao = end($explodedFileName);

        $data = [
            "arq_data" => date("Y-m-d"),
            "arq_pasta" => $tabela."/".date("Y/m/d"),
            "arq_extensao" => $extensao,
            "arq_nome" => $nomeArquivo
        ];

        return $this->repository->create($data);
    }

    public function uploadBase64($base64, $nomeArquivo, $tabela) {
        $pasta = $tabela . "/" . date("Y") . "/" . date("m") . "/" . date("d") . "/";

        $nomeArquivoSplited = explode(".", $nomeArquivo);
        $extensao = end($nomeArquivoSplited);
        
        if($extensao == "pdf"){
            $image = base64_decode($base64, true);
        }else{
            $strposComa = strpos($base64, ",") + 1;
            $base64_str = substr($base64, $strposComa);
            $image = base64_decode($base64_str);
        }

        $saved = $this->save($nomeArquivo, $tabela);
        
        if ($saved) {
            Storage::disk('public')->put($pasta . $saved->arq_id . "." . $extensao, $image);

            return $saved;
        }

        return false;
    }

    public function uploadFiles($file, $nomeArquivo, $tabela) {
        $pasta = $tabela . "/" . date("Y") . "/" . date("m") . "/" . date("d") . "/";

        $nomeArquivoSplited = explode(".", $nomeArquivo);
        $extensao = end($nomeArquivoSplited);

        $saved = $this->save($nomeArquivo, $tabela);
        
        if ($saved) {
            $file->move(base_path('storage/app/public/'.$pasta), $saved->arq_id . "." . $extensao);

            return $saved;
        }

        return false;
    }
}
