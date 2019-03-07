<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnlockedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unlockeds', function (Blueprint $table) {
            $table->bigInteger('enigma_id')->unsigned()->primary();
            $table->timestamps();

            $table->foreign('enigma_id')
                ->references('id')->on('enigmas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unlockeds');
    }
}
