<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BD::table('incidents')->insert([
            "text"=>"Prueba",
            "stimated_time"=>5,
            "user_id"=>1,
            "department_id"=>1,
            "category_id"=>1
        ]);
    }
}