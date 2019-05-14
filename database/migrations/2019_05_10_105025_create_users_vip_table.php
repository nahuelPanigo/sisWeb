<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersVipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersVip', function (Blueprint $table) {
              $table->unsignedBigInteger('id');  
        });

    

    Schema::table('usersVip', function($table) {
       $table->foreign('id')->references('id')->on('users');
   });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usersVip', function (Blueprint $table) {
            Schema::drop('usersVip');
        });
    }
}
