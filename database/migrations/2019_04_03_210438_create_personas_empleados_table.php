<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_empleados', function (Blueprint $table) {
            $table->increments('id');

            $table->string('numeroDocumento')->unique();
            //$table->string('foto',500)->nullable();
            $table->string('gradoEmpleo')->nullable();
            $table->string('designadoSupervisor')->nullable();
            $table->string('fec_nacimiento')->nullable();
            $table->string('fec_vinculacion')->nullable();
            $table->string('ordenadorGasto')->nullable();
            $table->string('actoAdministrativo')->nullable();
            $table->string('fechaExpedicion')->nullable();
            $table->string('numeroActo',20)->nullable();
            $table->date('fechaInicioAutorizacion')->nullable();
            $table->date('fechaFinAutorizacion')->nullable();
            $table->date('fechaRevocatoria')->nullable();
            $table->string('genero')->nullable();
            $table->integer('codigoPresupuestoDesde')->nullable();
            $table->integer('codigoPresupuestoHasta')->nullable();
            //$table->string('ambitosBienesServicios')->nullable();
            $table->string('todoAbmitos')->nullable();
            $table->string('cuantiaHasta')->nullable();
            $table->string('estado')->nullable();
            $table->string('numeroCuenta',20)->nullable();
            $table->string('tipoPersona')->nullable();
            $table->string('TipocuentaBancaria')->nullable();
            $table->string('estadoCuenta')->nullable();


            $table->integer('tipoDocumento_id')->unsigned()->nullable();
            $table->integer('tipoVinculacion_id')->unsigned()->nullable();
            $table->integer('ciudad_id')->unsigned()->nullable();
            $table->integer('depatamento_id')->unsigned()->nullable();
            $table->integer('nivelEmpleo_id')->unsigned()->nullable();
            $table->integer('codigoEmpleo_id')->unsigned()->nullable();
            $table->integer('unidadEjecutara_id')->unsigned()->nullable();
            $table->integer('dependencia_id')->unsigned()->nullable();
            $table->integer('empresa_id')->unsigned()->nullable();
            $table->integer('id_ambitoBienesyServicios')->unsigned()->nullable();
            $table->integer('entidadBancaria_id')->unsigned()->nullable();



            $table->foreign('tipoDocumento_id')->references('id')->on('tipo_documentos');
            $table->foreign('tipoVinculacion_id')->references('id')->on('tipo_vinculacions');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('depatamento_id')->references('id')->on('departamentos');
            $table->foreign('nivelEmpleo_id')->references('id')->on('nivel_empleos');
            $table->foreign('codigoEmpleo_id')->references('id')->on('codigo_empleos');
            $table->foreign('unidadEjecutara_id')->references('id')->on('unidad_ejecutaras');
            $table->foreign('dependencia_id')->references('id')->on('dependencias');
            $table->foreign('id_ambitoBienesyServicios')->references('id')->on('ambitosy_bienes');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('entidadBancaria_id')->references('id')->on('entidad_bancarias');






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
        Schema::dropIfExists('personas_empleados');
    }
}
