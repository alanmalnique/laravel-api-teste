<?php

namespace App\Http\Adapters\Aluno\Dados;

class UpdateRequestAdapter {
    public static function transform(array $data) 
    {
        $newDataArray = array(
            "alu_nome" => $data["nome"],
            "alu_dtnascimento" => date("Y-m-d", strtotime(str_replace("/", "-", $data["dtnascimento"]))),
            "alu_whatsapp" => $data["whatsapp"],
            "alu_endlogradouro" => $data["endereco"],
            "alu_endnumero" => $data["numero"],
            "alu_endcomplemento" => $data["complemento"],
            "alu_endbairro" => $data["bairro"],
            "alu_endcep" => $data["cep"],
            "alu_email" => $data["email"],
            "alu_senha" => isset($data['senha']) ? $data['senha'] : '',
            "anamnese" => [
                "anam_praticaatividade" => $data['anamnese']['pratica_atividade'],
                "anam_qualatividade" => $data['anamnese']['quais_atividades'],
                "anam_tomamedicamento" => $data['anamnese']['toma_medicamento'],
                "anam_qualmedicamento" => $data['anamnese']['quais_medicamentos'],
                "anam_fumante" => $data['anamnese']['fumante'],
                "anam_fumaquantotempo" => $data['anamnese']['fumante_tempo'],
                "anam_hipertensao" => $data['anamnese']['possui_hipertensao'],
                "anam_doenca" => $data['anamnese']['possui_doenca'],
                "anam_qualdoenca" => $data['anamnese']['quais_doencas'],
                "anam_apresentador" => $data['anamnese']['apresenta_dor'],
                "anam_qualdor" => $data['anamnese']['quais_dores'],
                "anam_qualmovimentosentedor" => $data['anamnese']['movimento_dor'],
                "anam_fezcirurgia" => $data['anamnese']['realizou_cirurgia'],
                "anam_cirurgiaonde" => $data['anamnese']['quais_cirurgias'],
                "anam_tempocirurgia" => $data['anamnese']['tempo_ultima_cirurgia'],
                "anam_objetivo" => $data['anamnese']['objetivo']
            ]
        );
        return $newDataArray;
    }
}