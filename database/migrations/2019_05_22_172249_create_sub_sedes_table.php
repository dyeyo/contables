<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sedes', function (Blueprint $table) {
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
            $table->integer('sede_id')->unsigned()->nullable();

            $table->foreign('tercero_id')->references('id')->on('personas');
            $table->foreign('puc_id')->references('id')->on('pucs');
            $table->foreign('sede_id')->references('id')->on('sedes');

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
        Schema::dropIfExists('sub_sedes');
    }
}
