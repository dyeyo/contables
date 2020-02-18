<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptosCierresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos_cierres', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombreConcepto')->nullable();

            $table->integer('puc_id')->nullable()->unsigned();
            $table->integer('cierre_id')->nullable()->unsigned();

            $table->foreign('puc_id')->references('id')->on('pucs');
            $table->foreign('cierre_id')->references('id')->on('cierres');

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
        Schema::dropIfExists('conceptos_cierres');
    }
}
