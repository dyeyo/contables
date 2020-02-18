<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFUTExcedentesLiquidezsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_u_t_excedentes_liquidezs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('abreviatura');
            $table->string('conceptoLiquidez');

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
        Schema::dropIfExists('f_u_t_excedentes_liquidezs');
    }
}
