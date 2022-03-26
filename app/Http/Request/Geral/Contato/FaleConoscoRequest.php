<?php

namespace App\Http\Request\Geral\Contato;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class FaleConoscoRequest extends FormRequest
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
            'celular' => 'celular',
            'email' => 'required',
            'assunto' => 'assunto',
            'mensagem' => 'mensagem'
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
            'nome' => 'required',
            'celular' => 'required',
            'email' => 'required',
            'assunto' => 'required',
            'mensagem' => 'required'
        ];
    }

    public function bodyParameters(){
        return [
            'nome' => [
                'description' => 'Nome do contato',
                'example' => 'Fulano de Tal'
            ],
            'celular' => [
                'description' => 'Celular do contato',
                'example' => '(99) 99999-9999'
            ],
            'email' => [
                'description' => 'Email do contato',
                'example' => 'fulanodetal@outlook.com'
            ],
            'assunto' => [
                'description' => 'Assunto do contato',
                'example' => 'Dúvidas'
            ],
            'mensagem' => [
                'description' => 'Mensagem do contato',
                'example' => 'Gostaria de saber como baixar o app.'
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

