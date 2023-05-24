<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinadors', function (Blueprint $table) {
            $table->string('identificacion')->primaryKey();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('genero');
            $table->string('foto')->nullable();
            $table->string('fecha_nacimiento');
            $table->string('programa_academico');
            $table->string('areas_conocimiento');
            $table->string('fecha_vinculacion');
            $table->string('acuerdo_nombramiento');
            //Releacion apuntando al modelo semillero
            $table->unsignedBigInteger('semillero_id');            
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
        Schema::dropIfExists('coordinadors');
    }
};
