<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->id();
            $table->date('f_bautizo_fic');
            $table->string('iniciacion_fic');
            $table->integer('comunion_i_fic');
            $table->integer('comunion_ii_fic');
            $table->integer('anio_biblico_fic');
            $table->integer('confirmacion_i_fic');
            $table->integer('confirmacion_ii_fic');
            $table->string('parentesco_representante_fic');
            $table->string('celular_representante_fic');
            $table->string('correo_representante_fic');
            $table->string('observaciones_fic');
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
        Schema::dropIfExists('fichas');
    }
}
