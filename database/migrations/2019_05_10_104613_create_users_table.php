<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('secondName');
            $table->string('userName');
            $table->string('password');
            $table->string('creditCard');
            $table->integer('creditCardNumber');
            $table->integer('dni');
            $table->integer('creditCardCode');
            $table->date('birthDay');
            $table->date('creditCardDate');
            $table->string('mail')->unique();
            $table->string('userType');
            $table->timestamps();
        });

        schema::table('users',function($table){
            $table->boolean('deleted');
            $table->integer('creditsThisYear');
            $table->integer('creditsNextYear');
        });
    }
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::drop('users');
        });
    }
}
