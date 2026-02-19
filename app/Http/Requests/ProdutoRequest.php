<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutoRequest extends FormRequest
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
            'name'      => 'required|min:3|max:250|string',
            'quanty'    => 'required|integer',
            'value'     => 'required|numeric|between:0,99999999.99'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo name é obrigatório.',
            'name.min' => 'O nome deve ter no minimo 3 caracteres.',
            'name.max' =>   'O nome deve ter no maximo 250 caracteres.',

            'quanty.required' => 'O campo quanty é obrigatório.',
            'quanty.interger' => 'A quantidade deve ser um valor intiero.',
            
            'value.required' => 'O campo valor é obrigatório.',
            'value.numeric'  => 'O valor deve ser um número válido.',
            'value.between'  => 'O valor deve estar entre 0 e 99.999.999,99.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status'  =>    false,
                'message' =>    'Erro de validação',
                'erros'   =>    $validator->errors()
            ], 404)
        );
    }
}
