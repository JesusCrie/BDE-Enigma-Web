<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnlockersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unlockers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('enigma_id')->unsigned()->unique();
            $table->string('code')->unique();

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
        Schema::dropIfExists('unlockers');
    }
}
