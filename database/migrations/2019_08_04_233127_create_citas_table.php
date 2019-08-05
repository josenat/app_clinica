<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente_med')->unsigned();;
            $table->dateTime('fecha_cita');
            $table->text('observacion');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_paciente_med')->references('id')->on('paciente_medicos')->onDelete('cascade');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('citas');
    }
}
