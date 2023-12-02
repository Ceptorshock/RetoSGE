<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BD::table('incidents')->insert([
            "name"=>"Gorka",
            "email"=>"gorka.gabiname@elorrieta-errekamari.com",
            "password"=>"12345",
            "department_id"=>1
        ]);
    }
}
