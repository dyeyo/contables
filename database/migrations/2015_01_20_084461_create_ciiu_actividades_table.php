<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiiuActividadesTable extends Migration
{
    public function up()
    {
        Schema::create('ciiu_actividades', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('codigo');
            $table->longText('descripcion');

            $table->integer('descritores_id')->unsigned();
            $table->foreign('descritores_id')->references('id')->on('ciiu_descriptores');

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('ciiu_actividades');
    }
}
