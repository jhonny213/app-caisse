<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('fournisseur_id')->unsigned();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');

            $table->integer('fourniture_id')->unsigned();
            $table->foreign('fourniture_id')->references('id')->on('fournitures');

            $table->enum('machat', ['caisse','banque']);
            $table->decimal('prix');
            $table->integer('validation');
            $table->string('desc')->nullable();
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
        Schema::dropIfExists('achats');
    }
}
