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
        Schema::create('semilleros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo');
            $table->string('logo');
            $table->string('descripcion');
            $table->string('mision');
            $table->string('vision');
            $table->string('valores');
            $table->string('objetivos');
            $table->string('lineas_investigacion');
            $table->string('presentacion');
            $table->string('fecha_creacion');
            $table->string('numero_resolucion');
            $table->string('arhivo_resolucion');
            

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
        Schema::dropIfExists('semilleros');
    }
};
