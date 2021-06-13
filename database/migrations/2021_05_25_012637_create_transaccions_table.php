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
            $table->string('pago_concepto');
            $table->integer('estado');
            $table->integer('tipo_documento')->nullable();
            $table->string('documento')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha');
            $table->string('comentario')->nullable();
            $table->string('nro_documento_electronico')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('transaccions');
    }
}
