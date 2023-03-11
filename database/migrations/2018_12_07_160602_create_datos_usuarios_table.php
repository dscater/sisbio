<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apep');
            $table->string('apem')->nullable();
            $table->string('ci');
            $table->string('ci_exp');
            $table->string('dir');
            $table->string('email')->nullable();
            $table->string('fono');
            $table->string('cel');
            $table->string('foto');
            $table->integer('cargos_id')->unsigned();
            $table->integer('users_id')->unsigned();

            $table->foreign('cargos_id')->references('id')->on('cargos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('datos_usuarios');
    }
}
