<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'desc_produto' => 'required',
            'id_categoria' => 'required',
            'preco' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'desc_produto.required' => 'O campo descrição é obrigatório!',
            'id_categoria.required' => 'O campo categoria é obrigatório!',
            'preco.required' => 'O campo preço é obrigatório!',
        ];
    }
}
