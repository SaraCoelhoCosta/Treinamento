<?php

use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendas')->insert([
            'id_cliente' => 2,
            'id_produto' => 1,
            'quantidade' =>  1,
            'preco_unitario' =>  2229.99,
            'preco_total' =>  2229.99,
            'created_at' =>  now()
        ] );
    }
}
