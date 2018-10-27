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
            $table->integer('1_da');
            $table->integer('2_da');
            $table->integer('5_da');
            $table->integer('10_da');
            $table->integer('20_da');
            $table->integer('50_da');
            $table->integer('100_da');
            $table->integer('200_da');
            $table->integer('500_da');
            $table->integer('1000_da');
            $table->integer('2000_da');
            $table->integer('id_user');
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
