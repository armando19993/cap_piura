<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosColegiadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_colegiados', function (Blueprint $table) {
            $table->id();
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->integer('reg_cap');
            $table->date('fecha_incorporacion');
            $table->string('sexo');
            $table->string('estado_civil');
            $table->integer('dni');
            $table->string('ruc')->nullable();
            $table->integer('extranjeria')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->string('localidad');
            $table->string('referencia');
            $table->string('telefonos');
            $table->string('celular');
            $table->string('modalidad_trabajo');
            $table->string('cargo')->nullable();
            $table->string('empresa')->nullable();
            $table->string('ruc_empresa')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->string('localidad_empresa')->nullable();
            $table->string('referencia_empresa')->nullable();
            $table->string('telefonos_empresa')->nullable();
            $table->string('celular_empresa')->nullable();
            $table->string('correo');
            $table->string('correo_alternativa')->nullable();
            $table->string('vitalicio')->nullable();
            $table->string('universidad')->nullable();
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('usuarios_colegiados');
    }
}
