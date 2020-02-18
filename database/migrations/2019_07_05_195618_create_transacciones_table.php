<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id');

            $table->string('anio')->nullable();
            $table->string('mes')->nullable();
            $table->string('dia')->nullable();
            $table->string('numeroDoc')->nullable()->unique();
            $table->string('codigoPresupuesto')->nullable()->unique();
            $table->decimal('valortransaccion',8,2)->nullable();
            $table->string('valortransaccionLetras',200)->nullable();
            $table->decimal('valorBase',8,2)->nullable();
            $table->string('revelacion',200)->nullable();
            $table->string('detalle',50)->nullable();
            $table->string('plantilla')->nullable();
            $table->string('nombre_plantilla',50)->nullable();
            $table->bigInteger('totalDebito')->nullable();
            $table->bigInteger('totalCredito')->nullable();
            $table->bigInteger('diferencia')->nullable();
            $table->string('tipoPago',200)->nullable();


            $table->integer('tercero_id')->unsigned()->nullable();
            $table->integer('comprobante_id')->unsigned()->nullable();
            $table->integer('tipoPresupuesto_id')->unsigned()->nullable();


            $table->foreign('tercero_id')->references('id')->on('personas');
            $table->foreign('comprobante_id')->references('id')->on('comprobantes');
            $table->foreign('tipoPresupuesto_id')->references('id')->on('tipo_presupuestos');



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
        Schema::dropIfExists('transacciones');
    }
}
