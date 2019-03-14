<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnlockAllEnigmasSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('unlocked_enigmas')->insertUsing(
            ['enigma_id', 'user_id'],
            DB::table('enigmas')
                ->selectRaw('id, 1')
        );

        DB::insert('INSERT INTO progression_enigmas (enigma_step_id, user_id) ' .
            'SELECT enigma_steps.id, users.id FROM users, enigma_steps');
    }
}
