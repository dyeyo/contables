<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasJuridicasTable extends Migration
{
    public function up()
    {
        Schema::create('personas_juridicas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nit')->unique();
            $table->string('dv');
           // $table->string('raz_social')->nullable();
            $table->string('nomComercial')->nullable();
            $table->string('autoRetenedor')->nullable();
            $table->integer('TipocuentaBancaria')->nullable();
            $table->string('numeroCuenta',20)->nullable();
            $table->string('estadoCuenta')->nullable();
            $table->string('banco')->nullable();

            // FOREING KEYS
            $table->integer('id_regimenTributario')->unsigned()->nullable();
            $table->integer('id_actividadesCiiu')->unsigned()->nullable();
            $table->integer('ciudad_id')->unsigned()->nullable();
            $table->integer('idDepartamento')->unsigned()->nullable();
            $table->integer('descritores_id')->unsigned()->nullable();
            $table->integer('entidadBancaria_id')->unsigned()->nullable();
            $table->integer('dependencia_id')->unsigned()->nullable();


            $table->foreign('id_regimenTributario')->references('id')->on('regimen_tributarios');
            $table->foreign('id_actividadesCiiu')->references('id')->on('ciiu_actividades');
            $table->foreign('idDepartamento')->references('id')->on('departamentos');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('entidadBancaria_id')->references('id')->on('entidad_bancarias');
            $table->foreign('descritores_id')->references('id')->on('ciiu_descriptores');
            $table->foreign('dependencia_id')->references('id')->on('dependencias');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas_juridicas');
    }
}
