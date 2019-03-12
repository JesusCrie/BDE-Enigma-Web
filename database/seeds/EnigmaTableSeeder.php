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
            'description' => 'Nos services d\'informations ont réussi à intercepter un message indiquant l\'emplacement d\'un criminel très recherché. Malheureusement, nous ne savons pas comment exploiter ce message.',
            'difficulty' => 2
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Keygen',
            'description' => 'On a trouvé une petite pile d\'exécutables verrouillés par un mot de passe, pouvez-vous les cracker ?',
            'difficulty' => 5
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Keygen (Bonus)',
            'description' => 'Et bien si vous êtes arrivé là c\'est que vous n\'avez probablement pas de vie. Un dernier pour la route ?',
            'difficulty' => 5
        ]);
    }
}
