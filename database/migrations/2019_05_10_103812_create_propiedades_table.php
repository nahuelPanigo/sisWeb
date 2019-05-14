<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
                 $table->bigIncrements('id');
            $table->string('name',20);
            $table->string('description',100)->nullable();
            $table->timestamps();
            $table->string('locate',50);
                    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propiedades', function (Blueprint $table) {
                Schema::drop('propiedades');
        });
    }
}
