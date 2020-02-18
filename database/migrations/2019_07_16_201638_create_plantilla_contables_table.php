<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantillaContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantilla_contables', function (Blueprint $table) {
            $table->increments('id');


            $table->string('docReferencia',20)->nullable();
            $table->bigInteger('debito')->nullable();
            $table->bigInteger('credito')->nullable();
            $table->string('nota',200)->nullable();
            $table->string('codigoNIIIF',200)->nullable();
            $table->bigInteger('valorRetenido')->nullable();
            $table->string('base',20)->nullable();


            $table->integer('transacciones_id')->unsigned()->nullable();
            $table->integer('retecionesDescuentos_id')->unsigned()->nullable();
            $table->integer('puc_id')->unsigned()->nullable();
            $table->integer('centroCosto_id')->unsigned()->nullable();

            $table->foreign('transacciones_id')->references('id')->on('transacciones')->onDelete('cascade');;
            $table->foreign('retecionesDescuentos_id')->references('id')->on('retencion_descuentos');
            $table->foreign('puc_id')->references('id')->on('pucs');
            $table->foreign('centroCosto_id')->references('id')->on('sedes');



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
        Schema::dropIfExists('plantilla_contables');
    }
}
