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
        Schema::create('evento_proyecto', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('proyecto_codProyecto');
            $table->unsignedBigInteger('evento_codigo');

            $table->foreign('proyecto_codProyecto')
            ->references('codProyecto')->on('proyectos')
            ->onDelete('cascade');

            $table->foreign('evento_codigo')
            ->references('codigo')->on('eventos')
            ->onDelete('cascade');


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
        Schema::dropIfExists('evento_proyecto');
    }
};
