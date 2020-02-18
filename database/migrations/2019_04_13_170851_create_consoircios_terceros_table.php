<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsoirciosTercerosTable extends Migration
{
    public function up()
    {
        Schema::create('consoircios_terceros', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('persona_id')->unsigned()->nullable();
            $table->integer('empresa_consorcios_id')->unsigned()->nullable();
            $table->integer('porcentaje');

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('empresa_consorcios_id')->references('id')->on('empresa_consorcios')->onDelete('cascade');

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
        Schema::dropIfExists('consoircios_terceros');
    }
}
