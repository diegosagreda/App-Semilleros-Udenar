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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('lugar');
            $table->string('tipo');
            $table->string('modalidad');
            $table->string('clasificacion');
            $table->string('observaciones');
            $table->string('foto')->nullable();;
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
        Schema::dropIfExists('eventos');
    }
};
