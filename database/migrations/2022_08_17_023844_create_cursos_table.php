<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->integer("nivel_cur")->default(1);
            $table->enum("nombre_cur", ["Iniciación", "Comunión I", "Comunión II", "Año Bíblico", "Confirmación I", "Confirmación II"]);
            $table->boolean("disponibilidad_cur")->default(false);
            $table->date("fecha_inicio_cur");
            $table->string("responsable_cur")->nullable(true);
            $table->float("costo_cur", 8, 2)->nullable(true);
            $table->longText("comentario_cur")->nullable(true);
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
        Schema::dropIfExists('cursos');
    }
}
