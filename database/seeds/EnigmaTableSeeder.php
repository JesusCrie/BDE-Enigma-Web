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
        DB::table('enigmas')->insert([
            'name' => 'Test enigma',
            'description' => 'Some long description because its supposed to be the loooooong starting texte of the enigma with the storyline and shit',
            'owner' => 'Lucas MALANDRINO',
            'difficulty' => 5
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Text enigma with a long name',
            'description' => Str::random(120),
            'owner' => 'Thomas VINCENT',
            'difficulty' => 2
        ]);
    }
}
