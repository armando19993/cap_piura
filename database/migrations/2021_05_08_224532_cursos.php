<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('titulo');
            $table->date('fecha_inicio');
            $table->string('hora');
            $table->string('tipo');
            $table->text('descripcion');
            $table->string('costo');
            $table->string('ubicacion');
            $table->integer('cupos');
            $table->string('whatsapp');
            $table->integer('categoria_id');
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
