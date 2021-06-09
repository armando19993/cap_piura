<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionsTable extends Migration
{
    public function up()
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->integer('reg_cap')->nullable();
            $table->integer('dni');
            $table->integer('monto');
            $table->integer('pago_concepto');
            $table->integer('estado');
            $table->integer('tipo_documento');
            $table->string('documento');
            $table->string('razon_social');
            $table->string('direccion');
            $table->date('fecha');
            $table->string('comentario');
            $table->string('nro_documento_electronico');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('transaccions');
    }
}
