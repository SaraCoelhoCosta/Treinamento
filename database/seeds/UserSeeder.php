<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'  =>  'Sara',
            'email'  =>  'admin@admin.com',
            'password'  =>  bcrypt('123456'),
            'created_at' =>  now()
        ] );
    }
}
