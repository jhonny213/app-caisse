<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('agence_id')->unsigned();
            $table->foreign('agence_id')->references('id')->on('agences');

            $table->string('name');
            $table->string('reson_social')->nullable();
            $table->string('adresse')->nullable();
            $table->string('tel')->nullable();
            $table->string('site_web')->nullable();
            $table->string('email');
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('fournisseurs');
    }
}
