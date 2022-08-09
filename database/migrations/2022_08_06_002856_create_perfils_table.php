<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->string('cedula_per', 10);
            $table->string('apellido_per');
            $table->string('nombre_per');
            $table->date('f_nacimiento_per');
            $table->string('barrio_per')->nullable(true);
            $table->string('direccion_per')->nullable(true);
            $table->string('correo_per')->nullable(true);
            $table->string('contrasenia_per')->nullable(true);
            $table->integer('estado_per')->default(1);
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
        Schema::dropIfExists('perfils');
    }
}
