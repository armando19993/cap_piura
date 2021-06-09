<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosExternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_externos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellido_parteno');
            $table->string('apellido_materno');
            $table->integer('dni');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('correo');
            $table->integer('ruc')->nullable();
            $table->string('celular');
            $table->string('direccion');
            $table->string('grado');
            $table->string('profesion');
            $table->integer('estado');
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
        Schema::dropIfExists('usuarios_externos');
    }
}
