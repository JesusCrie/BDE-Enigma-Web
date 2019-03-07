<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnlockedEnigmaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('unlocked_enigmas')->insert([
            'enigma_id' => 1
        ]);
    }
}
