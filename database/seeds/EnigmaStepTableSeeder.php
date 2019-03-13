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

        /* Discover your BDE */

        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 1,
            'name' => '1. La première personne',
            'content' => '!!components.steps.discover_bde.thomas',
            'answer_pattern' => '/^thomas$/i'
        ]);

        // Ses cheveux sont frisés, mais peu volumineux
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 2,
            'name' => '2. Un deuxième membre',
            'content' => '!!components.steps.discover_bde.nils',
            'answer_pattern' => '/^nils$/i'
        ]);

        // Ses cheveux ressemblent aux miens
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 3,
            'name' => '3. Jamais deux sans trois',
            'content' => '!!components.steps.discover_bde.antoine',
            'answer_pattern' => '/^antoine$/i'
        ]);

        // C'est l'autre roux, sans le chapeau
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 4,
            'name' => '4. N\'y allons pas par quatre chemins',
            'content' => '!!components.steps.discover_bde.dimitri',
            'answer_pattern' => '/^dimitri$/i'
        ]);

        // TODO: Décrire Fanny
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 5,
            'name' => '5. Les cinq doigts de la main',
            'content' => '!!components.steps.discover_bde.fanny',
            'answer_pattern' => '/^fanny$/i'
        ]);

        // TODO: Décrire Marine
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 6,
            'name' => '6. Un tiers du diable',
            'content' => '!!components.steps.discover_bde.marine',
            'answer_pattern' => '/^marine$/i'
        ]);

        // TODO: Décrire Lucas
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 7,
            'name' => '7. Le septième art',
            'content' => '!!components.steps.discover_bde.lucas',
            'answer_pattern' => '/^lucas$/i'
        ]);

        // TODO: Décrire Dorian
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 8,
            'name' => '8. L\'infini debout',
            'content' => '!!components.steps.discover_bde.dorian',
            'answer_pattern' => '/^dorian$/i'
        ]);

        // Ses cheveux changent de couleur aussi souvent que son chat change d'humeur
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 9,
            'name' => '9. Les neufs vies',
            'content' => '!!components.steps.discover_bde.anne',
            'answer_pattern' => '/^anne$/i'
        ]);

        // TODO: Décrire Noah
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 10,
            'name' => '10. Dix doigts',
            'content' => '!!components.steps.discover_bde.noah',
            'answer_pattern' => '/^noah$/i'
        ]);

        // TODO: Décrire Romain
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 11,
            'name' => '11. Les commandements',
            'content' => '!!components.steps.discover_bde.romain',
            'answer_pattern' => '/^romain$/i'
        ]);

        // Ses cheveux ont une couleur qui rappelle un écran désagréable
        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 12,
            'name' => '12. Une année à passer',
            'content' => '!!components.steps.discover_bde.gael',
            'answer_pattern' => '/^bde-12$/i'
        ]);



        /* BDE message */

        DB::table('enigma_steps')->insert([
            'enigma_id' => 2,
            'step' => 1,
            'name' => 'Premier message',
            'content' => '!!components.steps.ascii',
            'answer_pattern' => '/^Petits dejs tous les matins !$/i'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 2,
            'step' => 2,
            'name' => 'Un message plus compliqué',
            'content' => '!!components.steps.caesar',
            'answer_pattern' => '/^SOIREE JEUDI AU METROPOLITAIN !$/i'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 2,
            'step' => 3,
            'name' => 'Le dernier message',
            'content' => '!!components.steps.ascii-caesar',
            'answer_pattern' => '/^VOTEZ BDE DDOS !$/i'
        ]);



        /* Lost coordinates */

        DB::table('enigma_steps')->insert([
            'enigma_id' => 3,
            'step' => 1,
            'name' => 'Inspection préliminaire',
            'content' => '!!components.steps.coordinates-1',
            'answer_pattern' => '/^b(?:ase)?\s*64$/i' // base64
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 3,
            'step' => 2,
            'name' => 'Recherche',
            'content' => '!!components.steps.coordinates-2',
            'answer_pattern' => '/^45.188972[0-9]*\s*,?\s*5.724629[0-9]*$/' // lat,lng
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 3,
            'step' => 3,
            'name' => 'Conclusion',
            'content' => 'Il semblerait que vous ayez réussi ! Quel est cet endroit ?',
            'answer_pattern' => '/^v(?:ictor)?\s*h(?:ugo)?$/i' // victor hugo
        ]);



        /* Keygen */

        DB::table('enigma_steps')->insert([
            'enigma_id' => 4,
            'step' => 1,
            'name' => 'Tout en douceur',
            'content' => '!!components.steps.keygen-cmp',
            'answer_pattern' => '/^je_suis_une_banane$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 4,
            'step' => 2,
            'name' => 'Changeons un peu',
            'content' => '!!components.steps.keygen-length',
            'answer_pattern' => '/^.{10}$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 4,
            'step' => 3,
            'name' => 'Plus de branchements ?',
            'content' => '!!components.steps.keygen-simple',
            'answer_pattern' => '/^votez_ddos_plz$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 4,
            'step' => 4,
            'name' => 'Devenons sérieux',
            'content' => '!!components.steps.keygen-complex',
            'answer_pattern' => '/^5zEAvD$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 4,
            'step' => 5,
            'name' => 'Un chiffrage ?',
            'content' => '!!components.steps.keygen-xor',
            'answer_pattern' => '/^t_est_une_belle_personne_timothee$/'
        ]);


        /* Keygen bonus */

        DB::table('enigma_steps')->insert([
            'enigma_id' => 5,
            'step' => 1,
            'name' => 'Le bonus',
            'content' => '!!components.steps.keygen-wtf',
            'answer_pattern' => '/^MQrkjdEQerb1dkIwx$/'
        ]);



        /* 6 questions */

        DB::table('enigma_steps')->insert([
            'enigma_id' => 6,
            'step' => 1,
            'name' => 'Historique',
            'content' => '!!components.steps.questions.c',
            'answer_pattern' => '/^b$/i'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 6,
            'step' => 2,
            'name' => 'Raie-bu',
            'content' => '!!components.steps.questions.rebus',
            'answer_pattern' => '/^h[oô]pital$/i'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 6,
            'step' => 3,
            'name' => 'Une nouvelle langue ?',
            'content' => '!!components.steps.questions.html',
            'answer_pattern' => '/^css$/i'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 6,
            'step' => 4,
            'name' => 'Question de vocabulaire',
            'content' => '!!components.steps.questions.voca',
            'answer_pattern' => '/^(?:un|le)?\s*p[eé]tale$/i'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 6,
            'step' => 5,
            'name' => 'Un peu de littérature',
            'content' => '!!components.steps.questions.hugo',
            'answer_pattern' => '/^(?:victor)?\s*hugo$/i'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 6,
            'step' => 6,
            'name' => 'En musique',
            'content' => '!!components.steps.questions.musique',
            'answer_pattern' => '/^(?:lampe)?\s*torche$/i'
        ]);



        /* Seen from the sky */

        DB::table('enigma_steps')->insert([
            'enigma_id' => 7,
            'step' => 1,
            'name' => 'Un symbole d\'amour',
            'content' => '!!components.steps.textgps-satan',
            'answer_pattern' => '/^satan$/i'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id',
            'step' => 2,
            'name' => 'On voit grand',
            'content' => '!!components.steps.textgps-ddos',
            'answer_pattern' => '/^ddos$/i'
        ]);
    }
}
