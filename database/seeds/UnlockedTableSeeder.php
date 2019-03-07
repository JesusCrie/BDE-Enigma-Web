<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnlockedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('unlockeds')->insert([
            'enigma_id' => 1
        ]);
    }
}
