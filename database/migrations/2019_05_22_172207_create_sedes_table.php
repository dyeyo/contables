<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('codigoCC')->nullable();
            $table->integer('anio')->nullable();
            $table->string('NombreCC')->nullable();
            $table->string('NombreCorto')->nullable();
            $table->string('tipoCC')->nullable();
            $table->string('claseCC')->nullable();
            $table->decimal('prorrateo')->nullable();
            $table->string('nombreGrupoCC')->nullable();
            $table->date('vigenciaInicio')->nullable();
            $table->date('vigenciaFin')->nullable();

            $table->integer('tercero_id')->unsigned()->nullable();
            $table->integer('puc_id')->unsigned()->nullable();
            $table->integer('empresa_id')->unsigned()->nullable();

            $table->foreign('tercero_id')->references('id')->on('personas');
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
        Schema::dropIfExists('sedes');
    }
}
