<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personals_id')->unsigned();
            $table->date('fecha');
            $table->time('ingreso_maniana')->nullable();
            $table->time('salida_maniana')->nullable();
            $table->time('ingreso_tarde')->nullable();
            $table->time('salida_tarde')->nullable();
            $table->enum('estado',['ASISTIÓ','FALTA','PERMISO','VACACIONES']);
            $table->string('observacion',255)->nullable();

            $table->foreign('personals_id')->references('id')->on('personals')
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
        Schema::dropIfExists('asistencias');
    }
}
