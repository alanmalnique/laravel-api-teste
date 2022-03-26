<?php

namespace App\Http\Request\Aluno\Mensalidade;

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
            'numero' => 'numero', 
            'mes' => 'mes', 
            'ano' => 'ano', 
            'cvv' => 'cvv', 
            'bandeira' => 'bandeira', 
            'titular' => 'titular'
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
            'numero' => 'required|max:19', 
            'mes' => 'required|max:2', 
            'ano' => 'required|max:4', 
            'cvv' => 'required|max:4', 
            'bandeira' => 'required', 
            'titular' => 'required'
        ];
    }

    public function bodyParameters(){
        return [
            'numero' => [
                'description' => 'Número do cartão',
                'example' => '9999 9999 9999 9999'
            ],
            'mes' => [
                'description' => 'Mês de validade',
                'example' => '01'
            ],
            'ano' => [
                'description' => 'Ano de validade',
                'example' => '2026'
            ],
            'cvv' => [
                'description' => 'CVV do cartão',
                'example' => '123'
            ],
            'bandeira' => [
                'description' => 'Bandeira do cartão',
                'example' => 2
            ],
            'titular' => [
                'description' => 'Titular do cartão',
                'example' => 'Nome de Teste'
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

