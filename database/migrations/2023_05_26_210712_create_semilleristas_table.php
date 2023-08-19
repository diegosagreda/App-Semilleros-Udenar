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
        Schema::create('semilleristas', function (Blueprint $table) {
            $table->id('identificacion')->primaryKey();
            $table->string('nombre');
            $table->string('codigo');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('genero');
            $table->string('fecha_nacimiento');
            $table->string('semestre');
            $table->string('foto')->nullable();
            $table->string('reporte_matricula')->nullable();
            $table->string('programa_academico');
            $table->string('fecha_vinculacion')->nullable();
            $table->string('estado')->nullable();
            //Releacion apuntando al modelo semillero
            $table->unsignedBigInteger('semillero_id')->nullable();
            $table->foreign('semillero_id')
            ->references('id')->on('semilleros')
            ->onDelete('cascade');
            //Releacion apuntando al modelo usuario
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('semilleristas');
    }
};
