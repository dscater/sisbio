<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_emp');
            $table->string('nit');
            $table->string('nro_autorizacion');
            $table->string('nro_empleador');
            $table->string('name');
            $table->string('alias')->nullable();
            $table->string('pais');
            $table->string('dpto');
            $table->string('ciudad');
            $table->string('zona');
            $table->string('avenida');
            $table->string('calle');
            $table->string('nro_residencia');
            $table->string('email')->nullable();
            $table->string('fono');
            $table->string('cel');
            $table->string('fax')->nullable();
            $table->string('casilla')->nullable();
            $table->string('web')->nullable();
            $table->string('logo');
            $table->string('actividad_economica');
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
        Schema::dropIfExists('empresas');
    }
}
