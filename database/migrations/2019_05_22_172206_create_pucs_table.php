<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pucs', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('codigoCuenta')->unique()->nullable();
            $table->integer('anio')->nullable();
            $table->bigInteger('codigoSuperior')->nullable();
            $table->string('nombreCuenta',990)->nullable();
            $table->string('naturalezaCuenta')->nullable();
            $table->string('CuentaCoNC')->nullable();
            $table->string('cuentaCobrar')->nullable();
            $table->integer('cuentaMaestraSalud')->nullable();
            $table->string('cuentaPagar')->nullable();
            $table->string('refiereFlujo')->nullable();
            $table->string('exigeTerceros')->nullable();
            $table->string('exigeCentroCostos')->nullable();
            $table->string('exigeBase')->nullable();
            $table->string('activa')->nullable();
            $table->bigInteger('numeroCuenta')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('tipoCuentaBancaria')->nullable();
            $table->string('situacionFondos')->nullable();
            $table->string('usocuentaBancaria')->nullable();
            $table->bigInteger('posicionClasificadorPresupuestalGastos')->nullable();
            $table->bigInteger('posicionClasificadorPresupuestalIngresos')->nullable();
            $table->bigInteger('codigoInterno')->nullable();
            $table->bigInteger('codigoSucursal')->nullable();
            $table->integer('porcentaje')->nullable();
            $table->integer('nivel')->nullable();


            $table->integer('fuentefinanciacionSIA_id')->nullable()->unsigned();
            $table->integer('codigoEntidadFinancieraSIA_id')->nullable()->unsigned();
            $table->integer('cuentaMaestra_id')->nullable()->unsigned();
            $table->integer('futExcedentesLiquidez_id')->nullable()->unsigned();
            $table->integer('empresa_id')->unsigned()->nullable();
            $table->integer('persona_id')->unsigned()->nullable();
            $table->integer('conceptoDian_id')->unsigned()->nullable();
            $table->integer('formatoDian_id')->unsigned()->nullable();
            $table->integer('opcionesPrivilegios_id')->unsigned()->nullable();
            $table->integer('tipoCuenta_id')->unsigned()->nullable();

            $table->foreign('conceptoDian_id')->references('id')->on('concepto_dian_exogenos')->onDelete('cascade');
            $table->foreign('formatoDian_id')->references('id')->on('formato_dian_exogenos')->onDelete('cascade');
            $table->foreign('opcionesPrivilegios_id')->references('id')->on('privilegios_p_u_cs')->onDelete('cascade');
            $table->foreign('persona_id')->references('id')->on('personas_juridicas')->onDelete('cascade');
            $table->foreign('fuentefinanciacionSIA_id')->references('id')->on('fuentes_financieras_s_i_as')->onDelete('cascade');
            $table->foreign('codigoEntidadFinancieraSIA_id')->references('id')->on('codigo_entidad_financieras_s_i_as')->onDelete('cascade');
            $table->foreign('cuentaMaestra_id')->references('id')->on('cuenta_maestas')->onDelete('cascade');
            $table->foreign('futExcedentesLiquidez_id')->references('id')->on('f_u_t_excedentes_liquidezs')->onDelete('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('tipoCuenta_id')->references('id')->on('tipo_cuentas')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pucs');
    }
}