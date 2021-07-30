<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduto extends FormRequest
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
        'nomeProduto' => ['required'], 
        'precoProduto' => ['required'],
        'quantidade' => ['required'],
        'descricao' => ['required']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nomeProduto' => "Nome do Produto",
            'precoProduto' => "Preço",
            'quantidade' => "Quantidade",
            'descricao' => "Descrição",
        ];
    }
}