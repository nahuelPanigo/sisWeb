<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubastasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subastas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('semana_id');
            $table->double('minPrice');
            $table->double('finalPrice');
            $table->unsignedBigInteger('user_idWinner')->nullable();
        });

        schema::table('subastas',function($table){
              $table->foreign('user_idWinner')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('semana_id')->references('id')->on('semanas')->onDelete('cascade');            
        });
        schema::table('subastas',function($table){
            $table->boolean('finish');
          });  

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subastas');
    }
}
