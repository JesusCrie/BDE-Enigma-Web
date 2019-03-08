<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnigmaTableUpdateSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('enigmas')->update([
            'owner_id' => 1
        ]);
    }
}
