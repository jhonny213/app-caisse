<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChekesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chekes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('agence_id')->unsigned();
            $table->foreign('agence_id')->references('id')->on('agences');

            $table->integer('achat_id')->unsigned();
            $table->foreign('achat_id')->references('id')->on('achats');

            $table->integer('numero');
            $table->integer('date');

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
        Schema::dropIfExists('chekes');
    }
}
