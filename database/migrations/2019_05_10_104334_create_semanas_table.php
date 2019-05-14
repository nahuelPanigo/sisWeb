<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semanas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->timestamps();
            $table->unsignedBigInteger('propiedad_id');
        });
    

    Schema::table('semanas', function($table) {
       $table->foreign('propiedad_id')->references('id')->on('propiedades');
   });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('semanas', function (Blueprint $table) {
            Schema::drop('semanas');
        });
    }
}
