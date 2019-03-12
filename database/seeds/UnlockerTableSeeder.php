<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnlockerTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('unlockers')->insert([
            'enigma_id' => 1,
            'code' => 'Enigma start !'
        ]);

        DB::table('unlockers')->insert([
            'enigma_id' => 2,
            'code' => 'BDE-12'
        ]);

        DB::table('unlockers')->insert([
            'enigma_id' => 3,
            'code' => 'Vive les poneys !'
        ]);

        DB::table('unlockers')->insert([
            'enigma_id' => 5,
            'code' => 'Je suis un chamois'
        ]);

        DB::table('unlockers')->insert([
            'enigma_id' => 6,
            'code' => 'VOTEZ BDE DDOS !'
        ]);
    }
}
