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
            $table->string('apellido_inf')->nullable();
            $table->string('nombre_inf')->nullable();
            $table->string('celular_inf')->nullable();
            $table->integer('bautizo_inf')->default(0);
            $table->integer('comunion_inf')->default(0);
            $table->integer('confirmacion_inf')->default(0);
            $table->integer('matrimonio_inf')->default(0);
            $table->string('estado_civil_inf')->nullable();
            $table->integer('estado_inf')->default(1);
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
        Schema::dropIfExists('informacion_parentals');
    }
}
