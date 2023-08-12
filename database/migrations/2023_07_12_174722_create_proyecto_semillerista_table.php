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
        Schema::create('proyecto_semillerista', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyecto_codProyecto');
            $table->unsignedBigInteger('semillerista_identificacion');

            $table->foreign('proyecto_codProyecto')
            ->references('codProyecto')->on('proyectos')
            ->onDelete('cascade');

            $table->foreign('semillerista_identificacion')
            ->references('identificacion')->on('semilleristas')
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
        Schema::dropIfExists('proyecto_semillerista');
    }
};
