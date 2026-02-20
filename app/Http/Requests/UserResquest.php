<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:250|',
            'email' => 'required|email|max:300|unique:user, email',
            'password' => 'required|min:6|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatorio.',
            'name.min'  =>  'O campo deve ter no minimo 3 caracteres. ',
            'name.max'  =>  'O campo nome deve ter no maximo 250 caracteres.',

            'email.required'  =>   'O campo email é obrigatorio.',
            'email.email'   =>  'Por favor, insira um endereço de e-mail válido.',
            'email.unique'  =>  'Esse email ja está em uso',

            'password.required' =>  'O campo password é obrigatorio.',
            'password.min'  =>  'O campo password deve ter no minimo 6 caracteres',
            'password.max'  =>  'O campo password aceita no maximo 100 caracteres',
        ];
    }
}
