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

        /* Discover your BDE */
        // Starter
        DB::table('unlockers')->insert([
            'enigma_id' => 1,
            'code' => 'Enigma Start'
        ]);

        /* BDE message */
        DB::table('unlockers')->insert([
            'enigma_id' => 2,
            'code' => 'BDE-12'
        ]);

        /* Seen from the sky */
        // Starter
        DB::table('unlockers')->insert([
            'enigma_id' => 3,
            'code' => 'La-haut'
        ]);

        /* Lost coordinates */
        DB::table('unlockers')->insert([
            'enigma_id' => 4,
            'code' => 'Kaunas'
        ]);

        /* Keygen */
        // Starter
        DB::table('unlockers')->insert([
            'enigma_id' => 5,
            'code' => 'x86 > 64k'
        ]);

        /* Keygen bonus */
        DB::table('unlockers')->insert([
            'enigma_id' => 6,
            'code' => 'Timothee'
        ]);

        /* 6 questions */
        // Starter
        DB::table('unlockers')->insert([
            'enigma_id' => 7,
            'code' => 'VOTEZ BDE DDOS !'
        ]);

        /* Alice and Bob */
        // Starter
        DB::table('unlockers')->insert([
            'enigma_id' => 8,
            'code' => ''
        ]);
    }
}
