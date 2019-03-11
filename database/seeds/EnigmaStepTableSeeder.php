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

        /* Keygen */

        DB::table('enigma_steps')->insert([
            'enigma_id' => 2,
            'step' => 1,
            'name' => 'Tout en douceur',
            'content' => '!!components.steps.keygen-cmp',
            'answer_pattern' => '/^je_suis_une_banane$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 2,
            'step' => 2,
            'name' => 'Changeons un peu',
            'content' => '!!components.steps.keygen-length',
            'answer_pattern' => '/^.{10}$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 2,
            'step' => 3,
            'name' => 'Plus de branchements ?',
            'content' => '!!components.steps.keygen-simple',
            'answer_pattern' => '/^votez_ddos_plz$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 2,
            'step' => 4,
            'name' => 'Devenons serieux',
            'content' => '!!components.steps.keygen-complex',
            'answer_pattern' => '/^5zEAvD$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 2,
            'step' => 5,
            'name' => 'Un chiffrage ?',
            'content' => '!!components.steps.keygen-xor',
            'answer_pattern' => '/^t_est_une_belle_personne_timothee$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 3,
            'step' => 1,
            'name' => 'Le bonus',
            'content' => '!!components.steps.keygen-wtf',
            'answer_pattern' => '/^MQrkjdEQerb1dkIwx$/'
        ]);
    }
}
