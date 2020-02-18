<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodigoEntidadFinancierasSIAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_entidad_financieras_s_i_as', function (Blueprint $table) {
            $table->increments('id');

            $table->string('abreviatura');
            $table->string('concepto');

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
        Schema::dropIfExists('codigo_entidad_financieras_s_i_as');
    }
}
