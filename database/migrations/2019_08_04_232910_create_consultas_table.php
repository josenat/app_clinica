<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente_med')->unsigned();
            $table->integer('id_enfermedad')->unsigned();
            $table->text('motivo');
            $table->text('tratamiento');            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_paciente_med')->references('id')->on('paciente_medicos')->onDelete('cascade'); 
            $table->foreign('id_enfermedad')->references('id')->on('enfermedads')->onDelete('cascade');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consultas');
    }
}
