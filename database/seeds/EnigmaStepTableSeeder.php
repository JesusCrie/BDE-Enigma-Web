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

        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 1,
            'name' => 'Step 1',
            'content' => 'Whats the result of 1+1 ?',
            'answer_pattern' => '/^2$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 2,
            'name' => 'Step 2',
            'content' => 'Whats the result of 2+2 ?',
            'answer_pattern' => '/^4$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 1,
            'step' => 3,
            'name' => 'Step 3',
            'content' => '!!components.steps.demo_step',
            'answer_pattern' => '/^8$/'
        ]);

        DB::table('enigma_steps')->insert([
            'enigma_id' => 2,
            'step' => 1,
            'name' => 'Hello there',
            'content' => 'Tell me something',
            'answer_pattern' => '/.*/'
        ]);
    }
}
