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
            $table->date('f_bautizo_fic')->nullable(true);
            $table->string('iniciacion_fic')->default(0);
            $table->integer('comunion_i_fic')->default(0);
            $table->integer('comunion_ii_fic')->default(0);
            $table->integer('anio_biblico_fic')->default(0);
            $table->integer('confirmacion_i_fic')->default(0);
            $table->integer('confirmacion_ii_fic')->default(0);
            $table->string('parentesco_representante_fic')->nullable(true);
            $table->string('celular_representante_fic')->nullable(true);
            $table->string('correo_representante_fic')->nullable(true);
            $table->string('observaciones_fic')->nullable(true);
            // FK
            $table->unsignedBigInteger('perfil_id');
            $table->foreign('perfil_id')->references('id')->on('perfils')->onDelete('cascade');
            //            
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
