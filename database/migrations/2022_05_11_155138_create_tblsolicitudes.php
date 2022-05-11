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
        Schema::create('tblsolicitudes', function (Blueprint $table) {
            $table->increments('id_Solicitudes');
            $table->integer('id_usuario')->unsigned();
            $table->string('nombre_solicitante');
            $table->string('paterno_solicitante');
            $table->string('materno_solicitante');
            $table->integer('activo')->default(1);
            $table->dateTime('fecha_solicitud');
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
        Schema::dropIfExists('tblsolicitudes');
    }
};
