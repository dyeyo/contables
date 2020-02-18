<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasNaturalesTable extends Migration
{
    public function up()
    {
        Schema::create('personas_naturales', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('numeroDocumento')->unique()->nullable();
            $table->string('Subclase')->nullable();
            $table->string('designadoSupervisor')->nullable();
            $table->integer('TipocuentaBancaria')->nullable();
            $table->string('numeroCuenta',20)->nullable();
            $table->string('estadoCuenta')->nullable();
            $table->integer('tipoPersona')->nullable();

            // FOREING KEYS
            $table->integer('id_tipoDocumento')->nullable()->unsigned();
            $table->integer('id_clase')->nullable()->unsigned();
            $table->integer('id_actividadesCiiu')->nullable()->unsigned();
            $table->integer('descritores_id')->nullable()->unsigned();
            $table->integer('ciudad_id')->nullable()->unsigned();
            $table->integer('idDepartamento')->nullable()->unsigned();
            $table->integer('entidadBancaria_id')->unsigned()->nullable();
            $table->integer('dependencia_id')->unsigned()->nullable();

            $table->foreign('id_tipoDocumento')->references('id')->on('tipo_documentos');
            $table->foreign('id_clase')->references('id')->on('clase_personas');
            $table->foreign('descritores_id')->references('id')->on('ciiu_descriptores');
            $table->foreign('id_actividadesCiiu')->references('id')->on('ciiu_actividades');
            $table->foreign('idDepartamento')->references('id')->on('departamentos');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('entidadBancaria_id')->references('id')->on('entidad_bancarias');
            $table->foreign('dependencia_id')->references('id')->on('dependencias');


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas_naturales');
    }
}
