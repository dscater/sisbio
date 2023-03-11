<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personals_id')->unsigned();
            $table->date('fech_ingreso');
            $table->date('fech_retiro');
            $table->string('forma_pago');
            $table->string('salario');

            $table->integer('unidad_areas_id')->unsigned();
            $table->integer('cargos_id')->unsigned();

            $table->string('tipo_contrato');
            $table->string('turno');
            $table->string('nit_personal');
            $table->string('nro_seguro');
            $table->string('nro_cuenta')->nullable();
            $table->string('nombre_banco',255)->nullable();
            $table->string('observacion',255)->nullable();
            $table->string('estado');

            $table->foreign('personals_id')->references('id')->on('personals')
                                            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('unidad_areas_id')->references('id')->on('unidad_areas')
                                              ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('cargos_id')->references('id')->on('cargos')
                                              ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('contratos');
    }
}
