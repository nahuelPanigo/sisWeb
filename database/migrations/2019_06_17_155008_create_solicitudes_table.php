<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->boolean('view');
        });

    schema::table('solicitudes',function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });
    }
    

    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
