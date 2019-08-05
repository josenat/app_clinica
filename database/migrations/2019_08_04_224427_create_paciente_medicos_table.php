<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePacienteMedicosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente')->unsigned();;
            $table->integer('id_medico')->unsigned();;
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_medico')->references('id')->on('medicos')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paciente__medicos');
    }
}
