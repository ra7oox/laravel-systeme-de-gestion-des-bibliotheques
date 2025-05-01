<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('auteurs')->insert([
            "nom"=>"said",
            "prenom"=>"testtesttest",
            "nationalite"=>"maroc",
        ]);
    }
}
