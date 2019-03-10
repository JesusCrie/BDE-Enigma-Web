<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnigmaTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // line 767
        DB::table('enigmas')->insert([
            'name' => 'Coordonnées perdues',
            'description' => 'Nos services d\'informations ont réussi à intercepter un message indiquant l\'emplacement d\'un criminel très recherché. Malheuresement, nous ne savons pas comment exploiter ce message.',
            'difficulty' => 2
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Enigma 2',
            'description' => 'bite lol',
            'difficulty' => 1
        ]);
    }
}
