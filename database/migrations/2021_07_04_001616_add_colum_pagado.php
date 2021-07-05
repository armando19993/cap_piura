<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumPagado extends Migration
{
    public function up()
    {
        Schema::table('certificado_habilidads', function (Blueprint $table) {
            $table->string('pagado');
        });

        Schema::table('transaccions', function (Blueprint $table) {
            $table->string('certificado_id')->nullable();
        });
    }

    public function down()
    {
        //
    }
}
