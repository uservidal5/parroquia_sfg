<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionParentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_parentals', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_parental_inf');
            $table->string('nombre_apellido_inf');
            $table->string('celular_inf');
            $table->integer('bautizo_inf');
            $table->integer('comunion_inf');
            $table->integer('confirmacion_inf');
            $table->integer('matrimonio_inf');
            $table->string('estado_civil_inf');
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
        Schema::dropIfExists('informacion_parentals');
    }
}
