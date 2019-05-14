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
            $table->string('name',20);
            $table->string('secondName',20);
            $table->string('userName',40);
            $table->string('creditCard');
            $table->integer('creditCardNumber');
            $table->integer('creditCardCode');
            $table->date('creditCardDate');
            $table->string('mail')->unique();
            $table->string('userType');
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
        Schema::table('users', function (Blueprint $table) {
            Schema::drop('user');
            //
        });
    }
}
