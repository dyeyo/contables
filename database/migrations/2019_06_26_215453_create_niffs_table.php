<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNiffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niffs', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('codigoNiff')->nullable();
            $table->integer('anio')->nullable();
            $table->string('nombreNiff',500)->nullable();
            $table->string('naturalezaCuenta')->nullable();
            $table->string('CuentaCoNC')->nullable();
            $table->string('cuentaCobrar')->nullable();
            $table->string('cuentaPagar')->nullable();
            $table->string('refiereFlujo')->nullable();
            $table->string('exigeCentroCostos')->nullable();
            $table->string('exigeBase')->nullable();
            $table->string('exigeTerceros')->nullable();
            $table->string('activa')->nullable();
            $table->integer('porcentaje')->nullable();
            $table->integer('nivel')->nullable();


            $table->integer('puc_id')->unsigned()->nullable();
            $table->integer('conceptoDian_id')->nullable()->unsigned();
            $table->integer('formatoDian_id')->nullable()->unsigned();
            $table->integer('tipoCuenta_id')->unsigned()->nullable();
            $table->integer('opcionesPrivilegios_id')->unsigned()->nullable();

            $table->foreign('puc_id')->references('id')->on('pucs');
            $table->foreign('conceptoDian_id')->references('id')->on('concepto_dian_exogenos');
            $table->foreign('formatoDian_id')->references('id')->on('formato_dian_exogenos');
            $table->foreign('opcionesPrivilegios_id')->references('id')->on('privilegios_p_u_cs');
            $table->foreign('tipoCuenta_id')->references('id')->on('tipo_cuentas');


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
        Schema::dropIfExists('niffs');
    }
}
