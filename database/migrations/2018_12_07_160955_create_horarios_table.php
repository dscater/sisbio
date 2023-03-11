<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidad_areas_id')->unsigned();
            $table->time('ingreso_maniana');
            $table->time('salida_maniana');

            $table->time('ingreso_tarde');
            $table->time('salida_tarde');

            $table->string('observacion',255)->nullable();

            $table->foreign('unidad_areas_id')->references('id')->on('unidad_areas')
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
        Schema::dropIfExists('horarios');
    }
}
