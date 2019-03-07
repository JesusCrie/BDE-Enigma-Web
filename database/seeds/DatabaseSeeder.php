<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);

        $this->call(EnigmaTableSeeder::class);
        $this->call(EnigmaStepTableSeeder::class);

        $this->call(UnlockedEnigmaTableSeeder::class);
    }
}
