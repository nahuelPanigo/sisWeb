<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAdministratorsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administratorsUser', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userName');
            $table->string('password');
            $table->string('mail')->unique();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administratorsUser', function (Blueprint $table) {
            //
        });
    }
}
