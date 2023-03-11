<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personals_id')->unsigned();
            $table->string('tipo_descuento');
            $table->string('monto');
            $table->string('mes');
            $table->string('anio');
            $table->date('fecha_desc');
            $table->string('descripcion')->nullable();

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
        Schema::dropIfExists('descuentos');
    }
}
