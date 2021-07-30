<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['nome_cliente', 'nome_produto', 'preco_unitario','quantidade','preco_total'];

}
