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
            $table->string('cedula_per', 10)->nullable(true);
            $table->string('apellido_per')->nullable(true);
            $table->string('nombre_per')->nullable(true);
            $table->date('f_nacimiento_per')->nullable(true);
            $table->string('barrio_per')->nullable(true);
            $table->string('direccion_per')->nullable(true);
            $table->string('correo_per')->nullable(true);
            $table->string('contrasenia_per')->nullable(true);
            $table->string('tipo_representante_per')->enum(["Padre", "Madre", "Hermano/a", "Tío/a", "Primo/a", "Abuelo/a", "Otro"])->nullable(true);
            $table->string('telefono_representante_per')->nullable(true);
            $table->longText('observacion_per')->nullable(true);
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
