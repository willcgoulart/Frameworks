<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'name' => 'required',
            'cpf' => 'required|min:14',
            'user_name' => 'required',
            'email' => 'required|email',
            'tipo_user' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'min' => 'O :attribute deve ter pelo menos :min caracteres!',

            'user_name.required' => 'O campo UserName é obrigatório!',

            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo e-mail é obrigatório!',
            'email.email' => 'O e-mail deve ser um endereço de email válido!',

            'password.required' => 'O campo senha é obrigatório!',
            'password.min' => 'O senha deve ter pelo menos :min caracteres!',
            'password.confirmed' => 'A confirmação da senha não corresponde!',
            'password_confirmation.required' => 'O campo digite novamente é obrigatório!',
            'password_confirmation.min' => 'O digite novamente deve ter pelo menos :min caracteres!',
        ];
    }
}
