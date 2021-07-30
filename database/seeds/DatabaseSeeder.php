<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ClienteSeeder::class);
         $this->call(ProdutoSeeder::class);
         $this->call(VendaSeeder::class);
         $this->call(UserSeeder::class);
    }
}
