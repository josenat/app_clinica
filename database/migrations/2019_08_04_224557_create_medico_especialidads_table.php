<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicoEspecialidadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_especialidads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_medico')->unsigned();
            $table->integer('id_especialidad')->unsigned();            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_medico')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('id_especialidad')->references('id')->on('especialidads')->onDelete('cascade'); 
                                     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medico_especialidads');
    }
}
