<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidad_bancarias', function (Blueprint $table) {
            $table->increments('id');


            $table->string('CodigoSuperbancaria');
            $table->longText('DenominacionSocialEntidad');
            $table->longText('DenominacionAbreviadaEntidad');
            $table->string('nit');

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
        Schema::dropIfExists('entidad_bancarias');
    }
}
