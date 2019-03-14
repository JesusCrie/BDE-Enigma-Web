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
            'name' => 'Découverte du BDE',
            'description' => '!!components.enigma.bde-discover',
            'difficulty' => 1
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Un message du BDE',
            'description' => 'Votre BDE vous a envoyé plusieurs messages, mais pour que seule votre promo puisse le lire, il a été chiffré. Pourrez-vous le lire ?',
            'difficulty' => 2
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Vu du ciel',
            'description' => 'On reçois des messages qui ne font aucun sens. Vous pouvez y jeter un oeil ?',
            'difficulty' => 2
        ]);

        // line 767
        DB::table('enigmas')->insert([
            'name' => 'Coordonnées perdues',
            'description' => 'Nous avons intercepté un message aujourd\'hui, il semble contenir des informations interessantes. Malheureusement, nous ne savons pas comment exploiter ce message.',
            'difficulty' => 3
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Keygen',
            'description' => '!!components.enigma.keygen',
            'difficulty' => 5
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Keygen (Bonus)',
            'description' => 'Et bien si vous êtes arrivé là c\'est que vous n\'avez probablement pas de vie. Un dernier pour la route ?',
            'difficulty' => 5
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Énigmes',
            'description' => '!!components.enigma.enigma-simple',
            'difficulty' => 2
        ]);

        DB::table('enigmas')->insert([
            'name' => 'Alice et Bob',
            'description' => 'Est-ce que vous savez envoyer et recevoir des messages crypter ? Je vous rassure, tout est ecrit dans le manuel de gpg.',
            'difficulty' => 3
        ]);
    }
}
