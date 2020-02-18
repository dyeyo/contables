<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencias', function (Blueprint $table) {
            $table->increments('id');

            $table->string('codigo',20)->nullable();
            $table->integer('anio')->nullable();
            $table->string('nombre',50)->nullable();
            $table->integer('persona_id')->unsigned()->nullable();
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('dependencias');
    }
}
