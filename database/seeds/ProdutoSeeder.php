<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome'  =>  'Notebook Lenovo ideapad330',
            'preco'  =>  2229.99,
            'quantidade' =>  5,
            'descricao' => '1TB HD 8GB RAM Processador intel i5-8250U',
            'created_at' =>  now()
        ] );
    }
}