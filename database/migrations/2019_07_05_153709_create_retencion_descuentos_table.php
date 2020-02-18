<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetencionDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retencion_descuentos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('anio')->nullable();
            $table->string('concepto', 200)->nullable();
            $table->decimal('porcentaje')->nullable();
            $table->decimal('base',8,4)->nullable();
            $table->decimal('montoMinimo',8,4)->nullable();
            $table->decimal('iva')->nullable();
            $table->decimal('consumo')->nullable();
            $table->string('automatico')->nullable();
            $table->string('tipoRetencion', 200)->nullable();
            $table->string('activo')->nullable();
            $table->string('RetoDes')->nullable();

            $table->integer('codigo_id')->unsigned()->nullable();
            $table->integer('puc_id')->unsigned()->nullable();
            $table->integer('empresa_id')->unsigned()->nullable();

            $table->foreign('codigo_id')->references('id')->on('codigo_conceptos');
            $table->foreign('puc_id')->references('id')->on('pucs');
            $table->foreign('empresa_id')->references('id')->on('empresas');

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
        Schema::dropIfExists('retencion_descuentos');
    }
}
