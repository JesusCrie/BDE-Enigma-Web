<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnlockedEnigmasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('unlocked_enigmas', function (Blueprint $table) {
            $table->bigInteger('enigma_id')->unsigned()->primary();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('enigma_id')
                ->references('id')->on('enigmas')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('unlocked_enigmas');
    }
}
