<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadoHabilidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificado_habilidads', function (Blueprint $table) {
            $table->id();
            $table->integer('reg_cap');
            $table->string('nombres_apellidos');
            $table->string('codigo_serie');
            $table->date('vigencia_fecha');
            $table->string('link_validacion');
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
        Schema::dropIfExists('certificado_habilidads');
    }
}
