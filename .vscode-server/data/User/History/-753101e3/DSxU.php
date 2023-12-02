<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Category::factory()->count(5)->create();
        DB::table('categories')->insert(
            ["name"=>"Cadena de Produccion"]
        );
        DB::table('categories')->insert(
            ["name"=>"Cadena de Produccion"]
        );
        DB::table('categories')->insert(
            ["name"=>"Cadena de Produccion"]
        );
        ["name"=>"Recepcion"],
            ["name"=>"Programadores"]

            DB::table('categories')->insert([

                [
                    'name' => 'Cadena de Produccion',
                    'email' => 'admin@app.com',
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Agency',
                    'email' => 'agency@app.com',
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'End',
                    'email' => 'endcustomer@app.com',
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);
    }
}
