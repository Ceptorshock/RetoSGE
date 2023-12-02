<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BD::table('comments')->insert([
            "text"=>"Prueba",
            "used_time"=>5,
            "user_id"=>1,
            "incident_id"=>1
        ]);
    }
}