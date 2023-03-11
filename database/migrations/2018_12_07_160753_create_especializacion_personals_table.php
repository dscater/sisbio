<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecializacionPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especializacion_personals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personals_id')->unsigned();
            $table->string('institucion');
            $table->date('fech_ini');
            $table->date('fech_culmi');
            $table->string('nombre_curso');
            $table->integer('duracion')->nullable();
            $table->string('archivo')->nullable();
            $table->string('codigo_archivo')->nullable();
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
        Schema::dropIfExists('especializacion_personals');
    }
}
