<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaConsorciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_consorcios', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre1')->nullable();
            $table->string('nombre2')->nullable();
            $table->string('apellido')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('correo')->nullable();
            $table->string('pais')->default('COLOMBIA');
            $table->integer('responsableIVA')->nullable();
            $table->integer('regimenSimple')->nullable();
            $table->integer('anio')->nullable();
            $table->string('nit')->unique();
            $table->string('dv');
            $table->string('raz_social')->nullable();
            $table->string('nomComercial')->nullable();
            $table->integer('autoRetenedor')->nullable();
            $table->integer('TipocuentaBancaria')->nullable();
            $table->string('numeroCuenta',20)->nullable();
            $table->string('estadoCuenta')->nullable();

            // FOREING KEYS
            $table->integer('id_regimenTributario')->unsigned()->nullable();
            $table->integer('id_actividadesCiiu')->unsigned()->nullable();
            $table->integer('ciudad_id')->unsigned()->nullable();
            $table->integer('idDepartamento')->unsigned()->nullable();
            $table->integer('descritores_id')->unsigned()->nullable();
            $table->integer('entidadBancaria_id')->unsigned()->nullable();


            $table->foreign('id_regimenTributario')->references('id')->on('regimen_tributarios');
            $table->foreign('id_actividadesCiiu')->references('id')->on('ciiu_actividades');
            $table->foreign('idDepartamento')->references('id')->on('departamentos');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('entidadBancaria_id')->references('id')->on('entidad_bancarias');
            $table->foreign('descritores_id')->references('id')->on('ciiu_descriptores');

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
        Schema::dropIfExists('empresa_consorcios');
    }
}
