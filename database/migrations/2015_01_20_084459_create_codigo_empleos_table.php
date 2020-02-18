<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodigoEmpleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_empleos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('codigo');
            $table->string('nombreEmpleo');

            $table->integer('id_nivelEmpleo')->unsigned();
            $table->foreign('id_nivelEmpleo')->references('id')->on('nivel_empleos');
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
        Schema::dropIfExists('codigo_empleos');
    }
}
