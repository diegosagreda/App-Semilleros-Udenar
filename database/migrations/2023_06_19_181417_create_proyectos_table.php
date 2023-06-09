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
            $table->char('estProyecto', 45);
            $table->char('fecha_inicioPro', 45);
            $table->char('fecha_finPro', 45);
            $table->char('PropProyecto', 45);
            $table->char('Proyecto_final', 45);
            $table->unsignedBigInteger('semillero_id'); // Columna de clave foránea
            
            $table->foreign('semillero_id')->references('id')->on('semilleros');

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
