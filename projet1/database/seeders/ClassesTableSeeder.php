<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("classes")->insert([
              ["libelle"=>"Licence 1"],
              ["libelle"=>"Licence 2"],
              ["libelle"=>"Licence 3"],
              ["libelle"=>"Master 1"],
              ["libelle"=>"Master 2"],

            ]);
    }
}
