<?php

namespace App\Http\Request\Aluno\Dados;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

use App\Http\Adapters\Aluno\Dados\UpdateRequestAdapter;

class UpdateRequest extends FormRequest
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
            'dtnascimento' => 'dtnascimento', 
            'whatsapp' => 'whatsapp', 
            'endereco' => 'endereco', 
            'numero' => 'numero', 
            'complemento' => 'complemento', 
            'bairro' => 'bairro', 
            'cep' => 'cep', 
            'email' => 'email', 
            'senha' => 'senha', 
            'anamnese.possui_hipertensao' => 'anamnese.possui_hipertensao', 
            'anamnese.pratica_atividade' => 'anamnese.pratica_atividade', 
            'anamnese.quais_atividades' => 'anamnese.quais_atividades', 
            'anamnese.toma_medicamento' => 'anamnese.toma_medicamento', 
            'anamnese.quais_medicamentos' => 'anamnese.quais_medicamentos', 
            'anamnese.fumante' => 'anamnese.fumante', 
            'anamnese.fumante_tempo' => 'anamnese.fumante_tempo', 
            'anamnese.possui_doenca' => 'anamnese.possui_doenca', 
            'anamnese.quais_doencas' => 'anamnese.quais_doencas', 
            'anamnese.apresenta_dor' => 'anamnese.apresenta_dor', 
            'anamnese.quais_dores' => 'anamnese.quais_dores', 
            'anamnese.movimento_dor' => 'anamnese.movimento_dor', 
            'anamnese.realizou_cirurgia' => 'anamnese.realizou_cirurgia', 
            'anamnese.quais_cirurgias' => 'anamnese.quais_cirurgias', 
            'anamnese.tempo_ultima_cirurgia' => 'anamnese.tempo_ultima_cirurgia', 
            'anamnese.objetivo' => 'anamnese.objetivo'
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
            'dtnascimento' => 'required', 
            'whatsapp' => 'required', 
            'endereco' => 'required|max:150', 
            'numero' => 'required|max:20', 
            'complemento' => 'max:20', 
            'bairro' => 'required|max:30', 
            'cep' => 'required|max:10', 
            'email' => 'required|max:80', 
            'senha' => '', 
            'anamnese.possui_hipertensao' => 'required', 
            'anamnese.pratica_atividade' => 'required', 
            'anamnese.quais_atividades' => 'required_if:anamnese.pratica_atividade,1', 
            'anamnese.toma_medicamento' => 'required', 
            'anamnese.quais_medicamentos' => 'required_if:anamnese.toma_medicamento,1', 
            'anamnese.fumante' => 'required', 
            'anamnese.fumante_tempo' => 'required_if:anamnese.fumante,1', 
            'anamnese.possui_doenca' => 'required', 
            'anamnese.quais_doencas' => 'required_if:anamnese.possui_doenca,1', 
            'anamnese.apresenta_dor' => 'required', 
            'anamnese.quais_dores' => 'required_if:anamnese.apresenta_dor,1', 
            'anamnese.movimento_dor' => 'required_if:anamnese.apresenta_dor,1', 
            'anamnese.realizou_cirurgia' => 'required', 
            'anamnese.quais_cirurgias' => 'required_if:anamnese.realizou_cirurgia,1', 
            'anamnese.tempo_ultima_cirurgia' => 'required_if:anamnese.realizou_cirurgia,1', 
            'anamnese.objetivo' => 'required'
        ];
    }

    public function bodyParameters(){
        return [
            'nome' => [
                'description' => 'Nome do aluno',
                'example' => 'Fulano de Tal'
            ],
            'dtnascimento' => [
                'description' => 'Data de nascimento do aluno',
                'example' => '99/99/9999'
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
                'example' => '12345'
            ],
            'complemento' => [
                'description' => 'Complemento do endereço do aluno',
                'example' => ''
            ],
            'bairro' => [
                'description' => 'Bairro do endereço do aluno',
                'example' => 'Bairro Teste'
            ],
            'cep' => [
                'description' => 'CEP do endereço do aluno',
                'example' => '99.999-99'
            ],
            'email' => [
                'description' => 'Email do aluno',
                'example' => 'teste@teste.com'
            ],
            'senha' => [
                'description' => 'Senha do aluno',
                'example' => 'teste123'
            ],
            'anamnese.possui_hipertensao' => [
                'description' => 'Aluno possui hipertensão',
                'example' => 1
            ],
            'anamnese.pratica_atividade' => [
                'description' => 'Aluno pratica atividade física',
                'example' => 1
            ],
            'anamnese.quais_atividades' => [
                'description' => 'Quais atividades',
                'example' => 'Basquete, Futebol'
            ],
            'anamnese.toma_medicamento' => [
                'description' => 'Aluno toma algum medicamento',
                'example' => 0
            ],
            'anamnese.quais_medicamentos' => [
                'description' => 'Quais medicamentos',
                'example' => ''
            ],
            'anamnese.fumante' => [
                'description' => 'Aluno fumante',
                'example' => 1
            ],
            'anamnese.fumante_tempo' => [
                'description' => 'Fuma há quanto tempo',
                'example' => '1 ano'
            ],
            'anamnese.possui_doenca' => [
                'description' => 'Aluno possui doença',
                'example' => 1
            ],
            'anamnese.quais_doencas' => [
                'description' => 'Quais doenças',
                'example' => 'Diabetes'
            ],
            'anamnese.apresenta_dor' => [
                'description' => 'Aluno apresenta dor',
                'example' => 0
            ],
            'anamnese.quais_dores' => [
                'description' => 'Quais dores',
                'example' => ''
            ],
            'anamnese.movimento_dor' => [
                'description' => 'Quais movimentos sente dores',
                'example' => ''
            ],
            'anamnese.realizou_cirurgia' => [
                'description' => 'Aluno realizou cirurgia',
                'example' => 1
            ],
            'anamnese.quais_cirurgias' => [
                'description' => 'Quais cirurgias',
                'example' => 'Clavicula'
            ],
            'anamnese.tempo_ultima_cirurgia' => [
                'description' => 'Tempo última cirurgia',
                'example' => '1 ano'
            ],
            'anamnese.objetivo' => [
                'description' => 'Objetivo do aluno',
                'example' => 'Hipertrofia'
            ]
        ];
    }

    public function validated()
    {
        return UpdateRequestAdapter::transform( $this->all() );
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

