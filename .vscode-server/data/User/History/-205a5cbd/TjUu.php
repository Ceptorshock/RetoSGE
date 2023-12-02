<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('priorities')->insert(
            ["name"=>"Muy Urgente",
             "order" => 1   ],
            ["name"=>"Urgente",
             "order" => 2],
            ["name"=>"Normal",
              "order" => 3]
        );
    }
}
