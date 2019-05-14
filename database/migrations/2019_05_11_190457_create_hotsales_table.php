<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotsales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('price');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('semana_id');
            $table->timestamps();
        });
        Schema::table('hotsales', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('semana_id')->references('id')->on('semanas');
         });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotsales');
    }
}
