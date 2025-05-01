<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emprunts')->insert([
            "titre"=>"laravel",
            "description"=>"testtesttest",
            "auteur_id"=>1,
        ]);
    }
}
