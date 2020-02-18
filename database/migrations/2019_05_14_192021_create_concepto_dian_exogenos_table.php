<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptoDianExogenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepto_dian_exogenos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('codigo');
            $table->longText('concepto');

            $table->integer('formato_id')->unsigned();

            $table->foreign('formato_id')->references('id')->on('formato_dian_exogenos');


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
        Schema::dropIfExists('concepto_dian_exogenos');
    }
}
