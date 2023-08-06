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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id('codProyecto');
            $table->char('nomProyecto', 45);
            $table->char('tipoProyecto', 45);
            $table->char('estProyecto', 45)->default('Propuesta');
            $table->char('fecha_inicioPro', 45);
            $table->char('fecha_finPro', 45);
            $table->string('PropProyecto');
            $table->string('Proyecto_final');
            $table->string('nombre_archivo_original_propuesta');
            $table->string('nombre_archivo_original_proyecto_final');
            $table->string('numero_integrantes');
            $table->unsignedBigInteger('semillero_id'); // Columna de clave foránea
            
            $table->foreign('semillero_id')->references('id')->on('semilleros')->onDelete('cascade');

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
        Schema::dropIfExists('proyectos');
    }
};
