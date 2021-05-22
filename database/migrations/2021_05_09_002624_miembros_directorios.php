<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MiembrosDirectorios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros_directorios', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nombre');
            $table->string('cargo');
            $table->string('telefono');
            $table->string('correo');
            $table->integer('dependencia_id');
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
        //
    }
}
