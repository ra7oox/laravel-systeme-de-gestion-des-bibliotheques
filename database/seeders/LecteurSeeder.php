<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lecteurs')->insert([
            "nom"=>"laravel",
            "prenom"=>"testtesttest",
            "email"=>"said@gmail.com",
            "adress"=>"kflmkdsmksdf",
        ]);
    }
}
