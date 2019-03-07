<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressionEnigmaTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('progression_enigmas')->insert([
            'enigma_step_id' => 1,
            'user_id' => 1
        ]);
    }
}
