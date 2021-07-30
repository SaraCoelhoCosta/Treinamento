<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestCliente extends FormRequest
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

        $dados_gerais = array ('nomeCompleto' => ['required'],'sexo' => ['required'],'dataNascimento' => ['required'],
            'logradouro' => ['required'], 'numero' => ['required'], 'bairro' => ['required'], 'cep' => ['required'],
            'estado' => ['required'], 'cidade' => ['required']);
        $dados_unicos = array();

        if($this->method('PUT')) {
            $dados_unicos = array ('cpf' => ['required', 'cpf',Rule::unique('clientes','cpf')->ignore($this->route('cliente'))],
            'email' => ['required','email',Rule::unique('clientes','email')->ignore($this->route('cliente'))]);
          
        } else if($this->method('POST')) {
            $dados_unicos = array ('email' => ['required','email','unique:clientes'], 
            'cpf' => ['required','cpf','unique:clientes']);
        }

        return array_merge($dados_unicos,$dados_gerais);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nomeCompleto' => "Nome Completo",
            'cpf' => "CPF",
            'sexo' => "Sexo",
            'dataNascimento' => "Data de Nascimento",
            'logradouro' => "Logradouro",
            'numero' => "Número",
            'bairro' => "Bairro",
            'cep' => "CEP",
            'estado' => "Estado",
            'cidade' => "Cidade",
            'email' => "E-mail",
        ];
    }
}