<?php

namespace App\Http\Request\Professor\Onboarding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'Email', 
            'senha' => 'Senha'
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
            'email' => 'required|max:80', 
            'senha' => 'required|max:80'
        ];
    }

    public function bodyParameters(){
        return [
            'email' => [
                'description' => 'Email do professor',
                'example' => 'teste@teste.com'
            ],
            'senha' => [
                'description' => 'Senha do professor',
                'example' => 'teste123'
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

