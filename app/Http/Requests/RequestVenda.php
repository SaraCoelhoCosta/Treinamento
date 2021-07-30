<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestVenda extends FormRequest
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
            'nomeCliente' => ['required'], 
            'nomeProduto' => ['required'], 
            'precoVenda' => ['required'], 
            'quantidadeVenda' => ['required']
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
            'nomeCliente' => "Nome da Cliente",
            'nomeProduto' => "Nome do Produto",
            'precoVenda' => "Preço",
            'quantidadeVenda' => "Quantidade",
        ];
    }
}
