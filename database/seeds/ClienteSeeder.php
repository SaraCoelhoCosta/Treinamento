<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome'  =>  'Sara Coelho Costa',
            'nascimento'  =>  '2000-11-19',
            'sexo' => 'Feminino',
            'cpf' => '000.000.000-00',
            'telefone'  =>  '(73) 90000-0000',
            'logradouro'  =>  'Rua ABC',
            'numero'  =>  'S/N',
            'bairro'  =>  'Joaquim Romão',
            'cep'  =>  '45200-000',
            'estado'  =>  'Bahia',
            'cidade'  =>  'Jequié',
            'email' => '201911000@gmail.com',
            'created_at' =>  now()
        ] );
    }
}
