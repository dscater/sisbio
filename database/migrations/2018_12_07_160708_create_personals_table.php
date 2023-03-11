<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ci');
            $table->string('ci_exp');
            $table->string('name');
            $table->string('apep');
            $table->string('apem')->nullable();
            $table->date('fech_nac');
            $table->string('genero');
            $table->string('est_civil');
            $table->string('nacionalidad');
            $table->string('profesion');
            $table->string('grado_academico');
            $table->string('lugar_nac');
            $table->string('domicilio');
            $table->string('fono')->nullable();
            $table->string('cel');
            $table->string('email')->nullable();
            $table->string('foto');
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
        Schema::dropIfExists('personals');
    }
}
