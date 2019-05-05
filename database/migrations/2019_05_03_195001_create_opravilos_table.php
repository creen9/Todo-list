<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpravilosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opravilos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->string('oseba');
            $table->text('opis');
            $table->date('datum_zakljucka');
            $table->boolean('je_zakljucen')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opravilos');
    }
}
