<?php

namespace App\Http\Request\Aluno\Onboarding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreRequest extends FormRequest
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nome' => 'nome',
            'email' => 'email', 
            'cpf' => 'cpf', 
            'senha' => 'senha',
            'whatsapp' => 'whatsapp',
            'endereco' => 'endereco',
            'numero' => 'numero',
            'complemento' => 'complemento',
            'bairro' => 'bairro',
            'cep' => 'cep',
            'cidade' => 'cidade',
            'uf' => 'uf',
            'pais' => 'pais',
            'plano' => 'plano',
            'professor' => 'professor',
            'dtnascimento' => 'dtnascimento',
            'anamnese.praticaatividade' => 'anamnese.praticaatividade',
            'anamnese.qualatividade' => 'anamnese.qualatividade',
            'anamnese.tomamedicamento' => 'anamnese.tomamedicamento',
            'anamnese.qualmedicamento' => 'anamnese.qualmedicamento',
            'anamnese.fumante' => 'anamnese.fumante',
            'anamnese.fumaquantotempo' => 'anamnese.fumaquantotempo',
            'anamnese.hipertensao' => 'anamnese.hipertensao',
            'anamnese.doenca' => 'anamnese.doenca',
            'anamnese.qualdoenca' => 'anamnese.qualdoenca',
            'anamnese.apresentador' => 'anamnese.apresentador',
            'anamnese.qualdor' => 'anamnese.qualdor',
            'anamnese.qualmovimentosentedor' => 'anamnese.qualmovimentosentedor',
            'anamnese.fezcirurgia' => 'anamnese.fezcirurgia',
            'anamnese.qualcirurgia' => 'anamnese.qualcirurgia',
            'anamnese.tempocirurgia' => 'anamnese.tempocirurgia',
            'anamnese.objetivo' => 'anamnese.objetivo',
            'aula.dia' => 'aula.dia',
            'aula.horario' => 'aula.horario',
            'aula.mes' => 'aula.mes'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:120',
            'email' => 'required|unique:tbl_aluno,alu_email|max:80', 
            'cpf' => 'required|unique:tbl_aluno,alu_cpf|max:14', 
            'senha' => 'required',
            'whatsapp' => 'required|unique:tbl_aluno,alu_whatsapp|max:15',
            'endereco' => 'required|max:150',
            'numero' => 'required|max:20',
            'complemento' => 'max:50',
            'bairro' => 'required|max:30',
            'cep' => 'required|max:10',
            'cidade' => 'required|max:50',
            'uf' => 'required|max:2',
            'pais' => 'required|max:30',
            'plano' => 'required|exists:tbl_planos,plan_id',
            'professor' => 'required|exists:tbl_professor,prof_id',
            'dtnascimento' => 'required',
            'anamnese.praticaatividade' => 'required',
            'anamnese.qualatividade' => 'required_if:anamnese.praticaatividade,1',
            'anamnese.tomamedicamento' => 'required',
            'anamnese.qualmedicamento' => 'required_if:anamnese.tomamedicamento,1',
            'anamnese.fumante' => 'required',
            'anamnese.fumaquantotempo' => 'required_if:anamnese.fumante,1',
            'anamnese.hipertensao' => 'required',
            'anamnese.doenca' => 'required',
            'anamnese.qualdoenca' => 'required_if:anamnese.doenca,1',
            'anamnese.apresentador' => 'required',
            'anamnese.qualdor' => 'required_if:anamnese.apresentador,1',
            'anamnese.qualmovimentosentedor' => 'required_if:anamnese.apresentador,1',
            'anamnese.fezcirurgia' => 'required',
            'anamnese.qualcirurgia' => 'required_if:anamnese.fezcirurgia,1',
            'anamnese.tempocirurgia' => 'required_if:anamnese.fezcirurgia,1',
            'anamnese.objetivo' => 'required',
            'aula.dia' => 'required',
            'aula.horario' => 'required',
            'aula.mes' => 'required'
        ];
    }

    public function bodyParameters(){
        return [
            'nome' => [
                'description' => 'Nome do aluno',
                'example' => 'Fulano de Tal'
            ],
            'email' => [
                'description' => 'Email do aluno',
                'example' => 'teste@teste.com'
            ],
            'cpf' => [
                'description' => 'CPF do aluno',
                'example' => '999.999.999-99'
            ],
            'senha' => [
                'description' => 'Senha do aluno',
                'example' => 'teste123'
            ],
            'whatsapp' => [
                'description' => 'Whatsapp do aluno',
                'example' => '(99) 99999-9999'
            ],
            'endereco' => [
                'description' => 'Endereço do aluno',
                'example' => 'Rua de Teste'
            ],
            'numero' => [
                'description' => 'Número do endereço do aluno',
                'example' => '102'
            ],
            'complemento' => [
                'description' => 'Complemento do endereço do aluno',
                'example' => ''
            ],
            'bairro' => [
                'description' => 'Bairro do endereço do aluno',
                'example' => 'Centro'
            ],
            'cep' => [
                'description' => 'CEP do endereço do aluno',
                'example' => '99.999-999'
            ],
            'cidade' => [
                'description' => 'Cidade do aluno',
                'example' => 'São Paulo'
            ],
            'uf' => [
                'description' => 'UF do endereço do aluno',
                'example' => 'SP'
            ],
            'pais' => [
                'description' => 'País do endereço do aluno',
                'example' => 'Brasil'
            ],
            'plano' => [
                'description' => 'ID do plano do aluno',
                'example' => 1
            ],
            'professor' => [
                'description' => 'ID do professor do aluno',
                'example' => 'SP'
            ],
            'dtnascimento' => [
                'description' => 'Dt. Nascimento do aluno',
                'example' => '99/99/9999'
            ],
            'anamnese.praticaatividade' => [
                'description' => 'Pratica Atividade',
                'example' => 1
            ],
            'anamnese.qualatividade' => [
                'description' => 'Quais Atividades',
                'example' => 'teste'
            ],
            'anamnese.tomamedicamento' => [
                'description' => 'Toma Medicamento',
                'example' => 1
            ],
            'anamnese.qualmedicamento' => [
                'description' => 'Quais Medicamentos',
                'example' => 'teste'
            ],
            'anamnese.fumante' => [
                'description' => 'Fumante',
                'example' => 1
            ],
            'anamnese.fumaquantotempo' => [
                'description' => 'Fuma há quanto tempo',
                'example' => 'teste'
            ],
            'anamnese.hipertensao' => [
                'description' => 'Possui Hipertensão',
                'example' => 1
            ],
            'anamnese.doenca' => [
                'description' => 'Possui doença',
                'example' => 1
            ],
            'anamnese.qualdoenca' => [
                'description' => 'Qual doença',
                'example' => 'teste'
            ],
            'anamnese.apresentador' => [
                'description' => 'Apresenta Dor',
                'example' => 1
            ],
            'anamnese.qualdor' => [
                'description' => 'Quais dores',
                'example' => 'teste'
            ],
            'anamnese.qualmovimentosentedor' => [
                'description' => 'Qual movimento sente dor',
                'example' => 'teste'
            ],
            'anamnese.fezcirurgia' => [
                'description' => 'Fez cirurgia',
                'example' => 1
            ],
            'anamnese.qualcirurgia' => [
                'description' => 'Qual cirurgia',
                'example' => 'teste'
            ],
            'anamnese.tempocirurgia' => [
                'description' => 'Tempo da última cirurgia',
                'example' => 'teste'
            ],
            'anamnese.objetivo' => [
                'description' => 'Qual Objetivo',
                'example' => 'teste'
            ],
            'aula.dia' => [
                'description' => 'Dia aula experimental',
                'example' => '10'
            ],
            'aula.mes' => [
                'description' => 'Mês aula experimental',
                'example' => '10'
            ],
            'aula.horario' => [
                'description' => 'Horário aula experimental',
                'example' => '10:00'
            ]
        ];
    }

    /**
    * [failedValidation [Overriding the event validator for custom error response]]
    * @param  Validator $validator [description]
    * @return [object][object of various validation errors]
    */
    public function failedValidation(Validator $validator) {
        $mensagens = $validator->errors()->messages();
        $msg_retorno = '';
        foreach($mensagens as $indice=>$mensagem){
            if($indice > 1)
                continue;
            $msg_retorno = $mensagem[0];
        }
        throw new HttpResponseException(response()->json([
            'erro' => true,
            'mensagem' => $msg_retorno
        ], 422)); 
    }
}

