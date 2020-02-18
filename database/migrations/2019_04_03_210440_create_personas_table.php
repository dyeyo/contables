<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('raz_social')->nullable();
            $table->integer('anio')->nullable();
            $table->string('nombre1')->nullable();
            $table->string('nombre2')->nullable();
            $table->string('apellido')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('foto',500)->nullable();
            $table->string('correo')->nullable();
            $table->string('pais')->default('COLOMBIA');
            $table->string('responsableIVA')->nullable();
            $table->string('regimenSimple')->nullable();
            $table->string('pesonaNatural')->nullable();
            $table->timestamps();

            // FOREING KEYS
            $table->integer('natural_id')->unsigned()->nullable();
            $table->integer('juridica_id')->unsigned()->nullable();
            $table->integer('empleado_id')->unsigned()->nullable();


            $table->foreign('natural_id')->references('id')->on('personas_naturales')->onDelete('cascade');
            $table->foreign('juridica_id')->references('id')->on('personas_juridicas')->onDelete('cascade');
            $table->foreign('empleado_id')->references('id')->on('personas_empleados')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
