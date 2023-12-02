<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->create();
        DB::table('users')->insert([
            "name"=>"Gorka",
            "email"=>"asd@gmail.com",
            "password"=>Hash::make("12345678"),
            "department_id"=>1
        ]);
    }
}