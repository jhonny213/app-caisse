<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arretes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('agence_id')->unsigned();
            $table->foreign('agence_id')->references('id')->on('agences');

            $table->integer('1_da')->default(0)->nullable();
            $table->integer('2_da')->default(0)->nullable();
            $table->integer('5_da')->default(0)->nullable();
            $table->integer('10_da')->default(0)->nullable();
            $table->integer('20_da')->default(0)->nullable();
            $table->integer('50_da')->default(0)->nullable();
            $table->integer('100_da')->default(0)->nullable();
            $table->integer('200_da')->default(0)->nullable();
            $table->integer('500_da')->default(0)->nullable();
            $table->integer('1000_da')->default(0)->nullable();
            $table->integer('2000_da')->default(0)->nullable();
            $table->decimal('sold_caisse')->default(0);
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
        Schema::dropIfExists('arretes');
    }
}
