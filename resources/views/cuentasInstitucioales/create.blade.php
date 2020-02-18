@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="user"  action="{{route('cuentasInstitucionales.store')}}" method="post" id="terceros" enctype="multipart/form-data" name="terceros">
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">CREACIÓN DE CUENTA INSTITUCIONAL</h6>
                            </div>
                            &nbsp
                            <div class="container">
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        <ull>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ull>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Código Cuenta</label>
                                            <input type="text" onchange="claseCuenta()"  class="form-control form-control-user" id="" name="codigoCuenta"  value="{{old('codigoCuenta',$puc->codigoCuenta)}}" placeholder="Codigo...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cuenta Superior</label>
                                            <input type="text"  class="form-control form-control-user" id="" name="codigoSuperior"  value="{{old('codigoSuperior',$puc->codigoSuperior)}}" placeholder="Cuenta dependiente...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nombre de Cuenta</label>
                                            <input type="text"  class="form-control form-control-user" id="" name="nombreCuenta"  value="{{old('nombreCuenta',$puc->nombreCuenta)}}" placeholder="Nombre de Cuenta...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tipo de Cuenta</label>
                                            <select  onChange="tipoCuentas()" name= "tipoCuenta" id="tipoCuenta" class="form-control ">
                                                <option value="{{$puc->tipoCuenta}}">{{$puc->tipoCuenta}}</option>
                                                <option value="Superior">Superior</option>
                                                <option value="Detalle">Detalle</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="Formato ">Formato DIAN Exógena</label>
                                            <select   name= "formatoDian_id" id="formatoDian_id" class="form-control" onchange="dian()">
                                                <option value="">[Seleccione un Formato]</option>
                                                @foreach($formato as $item)
                                                    <option {{ old('formatoDian_id', $puc->formatoDian_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="Formato ">Concépto Formato DIAN Exógena</label>
                                            <select   name= "conceptoDian_id" id="conceptoDian_id" class="select2 form-control ">
                                                <option value="">[Seleccione un Formato]</option>
                                                @foreach($concepto as $item)
                                                    <option {{ old('conceptoDian_id', $puc->conceptoDian_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->codigo.' '.$item->concepto}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Correriente / No Corriente</label>
                                            <select name= "CuentaCoNC" id="CuentaCoNC" class="form-control ">
                                                <option value="{{$puc->CuentaCoNC}}">{{$puc->CuentaCoNC}}</option>
                                                <option value="Corriente">Corriente</option>
                                                <option value="No Corriente">No Corriente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Naturaleza</label>
                                            <input type="text" name="naturalezaCuenta" id="naturaleza" class="form-control form-control-user" value="{{$puc->naturalezaCuenta}}" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                @if($puc->tipoCuenta!='Detalle')
                                    <div class="row" id="checks" style="display: none">
                                        <div class="col-md-6">
                                            <label for="">Seleccione una</label>
                                            <br>
                                            @foreach($privilegios as $item)
                                                <div class="checkbox checkbox-success m-l-10">
                                                    <input id="opcionesPrivilegios_id" name="opcionesPrivilegios_id" type="radio" value="{{$item->opcionesPrivilegios_id}}" @if($puc->opcionesPrivilegios_id == null && $item->opcionesPrivilegios_id) checked @endif>
                                                    <label for="radio">{{$item->nombre}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Seleccione una</label>
                                            <br>
                                            <input class="checked" id="Cuentac" name="cuentaCobrar" type="checkbox" value="1" {{ $puc->cuentaCobrar== 'cuentaCobrar' ? 'checked' : '' }} {{ old('cuentaCobrar')=="cuentaCobrar" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentac" >Cuenta por Cobrar</label>
                                            <br>
                                            <input class="checked" id="Cuentap" name="cuentaPagar" type="checkbox" value="1" {{ $puc->cuentaPagar== 'cuentaPagar' ? 'checked' : '' }} {{ old('cuentaPagar')=="cuentaPagar" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentap" >Cuenta por Pagar</label>
                                            <br>
                                            <input class="checked" id="Refiere" name="refiereFlujo" type="checkbox" value="1" {{ $puc->refiereFlujo== 'refiereFlujo' ? 'checked' : '' }} {{ old('refiereFlujo')=="refiereFlujo" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Refiere" >Refiere Flujo de Efectivo</label>
                                            <br>
                                            <input class="checked" id="farmacia" name="exigeTerceros" type="checkbox" value="1" {{ $puc->exigeTerceros== 'exigeTerceros' ? 'checked' : '' }} {{ old('exigeTerceros')=="exigeTerceros" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="farmacia" >Exige Terceros</label>
                                            <br>
                                            <input class="checked" id="exige" name="exigeCentroCostos" type="checkbox" value="1" {{ $puc->exigeCentroCostos== 'exigeCentroCostos' ? 'checked' : '' }} {{ old('exigeCentroCostos')=="exigeCentroCostos" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exige" >Exige Centro de Costos</label>
                                            <br>
                                            <input class="checked" id="Maneja" name="manejaReferencias" type="checkbox" value="1" {{ $puc->manejaReferencias== 'manejaReferencias' ? 'checked' : '' }} {{ old('manejaReferencias')=="manejaReferencias" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Maneja" >Maneja Referencias</label>
                                            <br>
                                            <input class="checked" id="Activa" name="activa" type="checkbox" value="1" {{ $puc->activa== 'activa' ? 'checked' : '' }} {{ old('activa')=="activa" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Activa" >Activa</label>
                                        </div>
                                    </div>
                                @else
                                    <div class="row" id="checks">
                                        <div class="col-md-6">
                                            <label for="">Seleccione una</label>
                                            <br>
                                            @foreach($privilegios as $item)
                                                <div class="checkbox checkbox-success m-l-10">
                                                    <input id="opcionesPrivilegios_id" name="opcionesPrivilegios_id" type="radio" value="{{$item->opcionesPrivilegios_id}}" @if($puc->opcionesPrivilegios_id == null && $item->opcionesPrivilegios_id) checked @endif>
                                                    <label for="radio">{{$item->nombre}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Seleccione una</label>
                                            <br>
                                            <input class="checked" id="Cuentac" name="cuentaCobrar" type="checkbox" value="1" {{ $puc->cuentaCobrar== 1 ? 'checked' : '' }} {{ old('cuentaCobrar')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentac" >Cuenta por Cobrar</label>
                                            <br>
                                            <input class="checked" id="Cuentap" name="cuentaPagar" type="checkbox" value="1" {{ $puc->cuentaPagar== 1 ? 'checked' : '' }} {{ old('cuentaPagar')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentap" >Cuenta por Pagar</label>
                                            <br>
                                            <input class="checked" id="Refiere" name="refiereFlujo" type="checkbox" value="1" {{ $puc->refiereFlujo== 1 ? 'checked' : '' }} {{ old('refiereFlujo')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Refiere" >Refiere Flujo de Efectivo</label>
                                            <br>
                                            <input class="checked" id="exigeTerceros" name="exigeTerceros" type="checkbox" value="1" {{ $puc->exigeTerceros== 1 ? 'checked' : '' }} {{ old('exigeTerceros')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exigeTerceros" >Exige Terceros</label>
                                            <br>
                                            <input class="checked" id="exige" name="exigeCentroCostos" type="checkbox" value="1" {{ $puc->exigeCentroCostos== 1 ? 'checked' : '' }} {{ old('exigeCentroCostos')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exige" >Exige Centro de Costos</label>
                                            <br>
                                            <input class="checked" id="Maneja" name="manejaReferencias" type="checkbox" value="1" {{ $puc->manejaReferencias== 1 ? 'checked' : '' }} {{ old('manejaReferencias')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Maneja" >Maneja Referencias</label>
                                            <br>
                                            <input class="checked" id="Activa" name="activa" type="checkbox" value="1" {{ $puc->activa== 1 ? 'checked' : '' }} {{ old('activa')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Activa" >Activa</label>
                                        </div>
                                    </div>
                                @endif
                                &nbsp
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <label for="">Persona juridica (BANCOS)</label>
                                        <select  name= "persona_id" id="persona_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="">[Seleccione una opción]</option>
                                            @foreach($personaJuridica as $item)
                                                <option value="{{$item->id}}" {{ old('persona_id') == $item->id ? 'selected' : '' }} >{{$item->nit.' - '.$item->raz_social}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <label for="">Código Interno</label>
                                        <input type="text"  class="form-control form-control-user" id="numeroCuenta" name="codigoInterno"  value="{{ old('codigoInterno') }}" placeholder="Código Interno...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Código Sucursal</label>
                                        <input type="text"  class="form-control form-control-user" id="numeroCuenta" name="codigoSucursal"  value="{{ old('codigoSucursal') }}" placeholder="Código Sucursal...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <label for="">Número de Cuenta</label>
                                        <input type="text"  class="form-control form-control-user" id="numeroCuenta" name="numeroCuenta"  value="{{ old('numeroCuenta') }}" placeholder="NUMERO DE CUENTA...">
                                        {{--<button type="button" class="btn btn-primary mb-2" id="calcular" onclick="calcular()">Calcular Dígito de Verificación</button>--}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">tipo de Cuenta Bancaria</label>
                                        <select name="tipoCuentaBancaria" id="tipoCuentaBancaria"  class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                            <option value="">[Seleccione una opción]</option>
                                            <option value="Cuenta de Ahorros">Cuenta de Ahorros</option>
                                            <option value="Cuenta Corriente">Cuenta Corriente</option>
                                            <option value="Cuenta de ahorro de trámite simplificado">Cuenta de ahorro de trámite simplificado</option>
                                            <option value="Depósitos electrónicos">Depósitos electrónicos</option>
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="">Situación de Fondos</label>
                                            <br>
                                            <label class="radio-inline">
                                                <input type="radio"  id="situacionFondos" name="situacionFondos" checked="checked" value="Con Situación de Fondos" {{ old('situacionFondos')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>Con Situación de Fondos</label>
                                            <label class="radio-inline">
                                                <input type="radio" style="padding: 8px;" id="situacionFondos" name="situacionFondos" value="Sin Situación de Fondos" {{ old('situacionFondos')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>Sin Situación de Fondos</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Uso de Cuenta Bancaria CGN</label>
                                        <select name="usocuentaBancaria" id="usocuentaBancaria"  class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                            <option value="">[Seleccione una opción]</option>
                                            <option value="Pagadora y Recaudadora">Pagadora y Recaudadora</option>
                                            <option value="Pagadora">Pagadora</option>
                                            <option value="Recaudadora">Recaudadora</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label for="">Descripción</label>
                                            <textarea name="descripcion" id="descripcion" class="form-control " style="resize:none"></textarea>
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="direccions">
                                    <div class="col-md-6">
                                        <label for="">Posición Clasificador Presupuestal de Gastos</label>
                                        <input type="text"  class="form-control form-control-user" value="{{old('posicionClasificadorPresupuestalGastos')}}" id="posicionClasificadorPresupuestalGastos" name="posicionClasificadorPresupuestalGastos"  placeholder="Posición Clasificador Presupuestal de gastos...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Posición Clasificador Presupuestal de Ingresos</label>
                                        <input type="text"  class="form-control form-control-user" value="{{old('posicionClasificadorPresupuestalIngresos')}}" id="posicionClasificadorPresupuestalIngresos" name="posicionClasificadorPresupuestalIngresos"  placeholder="Posición Clasificador Presupuestal de Ingresos...">
                                    </div>
                                </div>
                                @foreach($empresa as $e)
                                    @if ($e->marco_normativo =='EMPRESA PUBLICA' || $e->marco_normativo=='ENTIDADES DEL GOBIERNO' )
                                        &nbsp
                                        <div class="row"  id="nombre1s">

                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label for="">CUENTA MAESTRA SALUD</label>
                                                    <br>
                                                    <label class="radio-inline">
                                                        <input type="radio"  id="cuentaMaestraSalud" onclick="showCuenta1()" name="cuentaMaestraSalud"  value="1" {{ old('cuentaMaestraSalud')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="cuentaMaestraSalud" onclick="showCuenta2()" name="cuentaMaestraSalud" checked="checked" value="2" {{ old('cuentaMaestraSalud')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                                </div>
                                            </div>
                                            &nbsp
                                            <div style="width: 100%;">
                                                <div class="row" id="">
                                                    <div class="col-md-6 col-lg-6">
                                                        <label for="">Fuente de financiación SIA</label>
                                                        <select  name= "fuentefinanciacionSIA_id" id="fuentefinanciacionSIA_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                            <option value="">[Seleccione una opción]</option>
                                                            @foreach($fuentes as $item)
                                                                <option value="{{$item->id}}" {{ old('fuentefinanciacionSIA_id') == $item->id ? 'selected' : '' }} >{{$item->abreviatura.' '.$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <label for="">Código Entidad Financiera  SIA</label>
                                                        <select  name= "codigoEntidadFinancieraSIA_id" id="codigoEntidadFinancieraSIA_id" class="select2 form-control custom-select"  style="width: 100%; height:36px;">
                                                            <option value="" >[Seleccione una opción]</option>
                                                            @foreach($codigoEntidad as $item)
                                                                <option value="{{$item->id}}" {{ old('codigoEntidadFinancieraSIA_id') == $item->id ? 'selected' : '' }} >{{$item->abreviatura.' '.$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                &nbsp
                                                <div class="row" id="">
                                                    <div class="col-md-6 col-lg-6">
                                                        <label for="">Fut excedentes de Liquidez</label>
                                                        <select  name= "futExcedentesLiquidez_id" id="futExcedentesLiquidez_id" class="select2 form-control custom-select"  style="width: 100%; height:36px;">
                                                            <option value="" >[Seleccione una opción]</option>
                                                            @foreach($fut as $item)
                                                                <option value="{{$item->id}}" {{ old('futExcedentesLiquidez_id') == $item->id ? 'selected' : '' }} >{{$item->abreviatura.' '.$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div style="display:none;" id="infoCuentas" class="col-md-6 col-lg-6">
                                                        <label for="">Cuenta Maestra</label>
                                                        <select  name= "cuentaMaestra_id" id="cuentaMaestra_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                            <option value="">[Seleccione una opción]</option>
                                                            @foreach($cuentaMaestra as $item)
                                                                <option value="{{$item->id}}" {{ old('cuentaMaestra_id') == $item->id ? 'selected' : '' }} >{{$item->abreviatura.' '.$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                &nbsp
                                            </div>
                                            @endif
                                            @endforeach
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">AGREGAR</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>

<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.selectpicker').selectpicker();
    });
</script>

<script !src="">
    $(function() {
        $( "#terceros" ).validate({
            rules: {
                numeroCuenta:{
                    digits: true,
                    maxlength:20,
                },
                situacionFondos :{
                },
                descripcion:{
                    maxlength:50,
                },
                posicionClasificadorPresupuestalGastos:{
                    required: true,
                },
                posicionClasificadorPresupuestalIngresos:{
                    required: true,
                },
            },
            messages: {
                numeroCuenta: {
                    digits:"Este campo solo revise digitos",
                    maxlength:"El limite es de 20 números"
                },
                descripcion: {
                    maxlength:"El limite es de 50 caracteres",
                }
            }
        });

    });
</script>
<script !src="">
    function showCuenta1(){
        document.getElementById('cuentaMaestra_id').style.display ='block';

    }
    function showCuenta2() {
        document.getElementById('cuentaMaestra_id').style.display = 'none';
    }
</script>