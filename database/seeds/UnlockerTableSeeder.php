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
            'code' => 'Caramel'
        ]);

        DB::table('unlockers')->insert([
            'enigma_id' => 2,
            'code' => 'Vive les poneys !'
        ]);

        DB::table('unlockers')->insert([
            'enigma_id' => 3,
            'code' => 'Je suis un chamois'
        ]);
    }
}
