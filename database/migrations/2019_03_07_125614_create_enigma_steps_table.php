<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnigmaStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enigma_steps', function (Blueprint $table) {
            $table->bigInteger('enigma_id')->unsigned();
            $table->integer('step');
            $table->string('name');
            $table->text('content')->nullable();
            $table->string('answer_pattern');

            $table->primary(['enigma_id', 'step']);
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
        Schema::dropIfExists('enigma_steps');
    }
}
