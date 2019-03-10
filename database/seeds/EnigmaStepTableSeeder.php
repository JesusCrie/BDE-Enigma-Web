<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnigmaStepTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        /* Lost coordinates */

        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 1,
            'name' => 'Inspection préliminaire',
            'content' => '!!components.steps.1-1',
            'answer_pattern' => '/^b(?:ase)?\s*64$/i' // base64
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 2,
            'name' => 'Recherche',
            'content' => '!!components.steps.1-2',
            'answer_pattern' => '/^45.188972[0-9]*\s*,?\s*5.724629[0-9]*$/' // coordinates
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 3,
            'name' => 'Conclusion',
            'content' => 'Il semblerait que vous ayait réussi à localiser le fugitif, où est-il ?',
            'answer_pattern' => '/^v(?:ictor)?\s*h(?:ugo)?$/i' // victor hugo
        ]);
    }
}
