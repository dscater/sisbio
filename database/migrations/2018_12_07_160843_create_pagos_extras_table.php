<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personals_id')->unsigned();
            $table->string('tipo_pago');
            $table->string('monto');
            $table->string('mes');
            $table->string('anio');
            $table->date('fech_pago');
            $table->string('descripcion',255)->nullable();

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
        Schema::dropIfExists('pagos_extras');
    }
}
