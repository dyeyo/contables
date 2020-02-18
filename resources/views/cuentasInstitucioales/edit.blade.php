@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Cuentas Institucionales</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('cuentasInstitucionales.index')}}">Cuentas Institucionales</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Cuenta Institucional {{$puc->codigo_cuenta}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>CUENTA INSTUTUCIONAL <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                    <form class="user"  action="{{route('cuentasInstitucionales.update',$puc->id)}}" method="post" id="terceros" enctype="multipart/form-data" name="terceros">
                        {{ method_field('put') }}
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="container">
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div style="display: none" class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Código Cuenta</label>
                                            <input type="text" disabled="disabled" onchange="claseCuenta()"  class="form-control form-control-user" id="" name="codigo_cuenta"  value="{{old('codigo_cuenta',$puc->codigo_cuenta)}}" placeholder="Codigo...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cuenta Superior</label>
                                            <input type="text"  disabled="disabled" class="form-control form-control-user" id="" name="codigo_superior"  value="{{old('codigo_superior',$puc->codigo_superior)}}" placeholder="Cuenta dependiente...">
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none" class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nombre de Cuenta</label>
                                            <input type="text"  disabled="disabled" class="form-control form-control-user" id="" name="nombre_cuenta"  value="{{old('nombre_cuenta',$puc->nombre_cuenta)}}" placeholder="Nombre de Cuenta...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tipo de Cuenta</label>
                                            <select  disabled="disabled" onChange="tipoCuentas()" name= "tipoCuenta" id="tipoCuenta" class="form-control ">
                                                <option value="{{$puc->tipoCuenta}}">{{$puc->tipoCuenta}}</option>
                                                <option value="Superior">Superior</option>
                                                <option value="Detalle">Detalle</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none" class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="Formato ">Formato DIAN Exógena</label>
                                            <select   disabled="disabled" name= "formatoDian_id" id="formatoDian_id" class="form-control" onchange="dian()">
                                                <option value="8">[Seleccione un Formato]</option>
                                                @foreach($formato as $item)
                                                    <option {{ old('formatoDian_id', $puc->formatoDian_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="Formato ">Concépto Formato DIAN Exógena</label>
                                            <select   disabled="disabled" name= "conceptoDian_id" id="conceptoDian_id" class="select2 form-control ">
                                                <option value="101">[Seleccione un Formato]</option>
                                                @foreach($concepto as $item)
                                                    <option {{ old('conceptoDian_id', $puc->conceptoDian_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->codigo.' '.$item->concepto}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none" class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Correriente / No Corrientes</label>
                                            <select disabled="disabled" name= "CuentaCoNC" id="CuentaCoNC" class="form-control ">
                                                <option value="{{$puc->CuentaCoNC}}">{{$puc->CuentaCoNC}}</option>
                                                <option value="Corriente">Corriente</option>
                                                <option value="No Corriente">No Corriente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Naturaleza</label>
                                            <input type="text" name="natiraleza" id="naturaleza" class="form-control form-control-user" value="{{$puc->natiraleza}}" readonly="readonly">
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
                                                    <input id="opciones_privilegios_id" name="opciones_privilegios_id" type="radio" value="{{$item->id}}">
                                                    <label for="radio">{{$item->nombrePrivilegio}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Seleccione una</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Cuentac" name="cuentaCobrar" type="checkbox" value="1" {{ $puc->cuentaCobrar== 'cuentaCobrar' ? 'checked' : '' }} {{ old('cuentaCobrar')=="cuentaCobrar" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentac" >Cuenta por Cobrar</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Cuentap" name="cuentaPagar" type="checkbox" value="1" {{ $puc->cuentaPagar== 'cuentaPagar' ? 'checked' : '' }} {{ old('cuentaPagar')=="cuentaPagar" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentap" >Cuenta por Pagar</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Refiere" name="refiereFlujo" type="checkbox" value="1" {{ $puc->refiereFlujo== 'refiereFlujo' ? 'checked' : '' }} {{ old('refiereFlujo')=="refiereFlujo" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Refiere" >Refiere Flujo de Efectivo</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="farmacia" name="exigeTerceros" type="checkbox" value="1" {{ $puc->exigeTerceros== 'exigeTerceros' ? 'checked' : '' }} {{ old('exigeTerceros')=="exigeTerceros" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="farmacia" >Exige Terceros</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="exige" name="exigeCentroCostos" type="checkbox" value="1" {{ $puc->exigeCentroCostos== 'exigeCentroCostos' ? 'checked' : '' }} {{ old('exigeCentroCostos')=="exigeCentroCostos" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exige" >Exige Centro de Costos</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Maneja" name="manejaReferencias" type="checkbox" value="1" {{ $puc->manejaReferencias== 'manejaReferencias' ? 'checked' : '' }} {{ old('manejaReferencias')=="manejaReferencias" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Maneja" >Maneja Referencias</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Activa" name="activa" type="checkbox" value="1" {{ $puc->activa== 'activa' ? 'checked' : '' }} {{ old('activa')=="activa" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Activa" >Activa</label>
                                        </div>
                                    </div>
                                @else
                                    <div style="display: none" class="row" id="checks">
                                        <div class="col-md-6">
                                            <label for="">Seleccione una</label>
                                            <br>
                                            @foreach($privilegios as $item)
                                                <div class="checkbox checkbox-success m-l-10">
                                                    <input disabled="disabled" id="opcionesPrivilegios_id" name="opcionesPrivilegios_id" type="radio" value="{{$item->id}}" @if($puc->opcionesPrivilegios_id == null && $item->opcionesPrivilegios_id) checked @endif>
                                                    <label for="radio">{{$item->nombre}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Seleccione una</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Cuentac" name="cuentaCobrar" type="checkbox" value="1" {{ $puc->cuentaCobrar== 1 ? 'checked' : '' }} {{ old('cuentaCobrar')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentac" >Cuenta por Cobrar</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Cuentap" name="cuentaPagar" type="checkbox" value="1" {{ $puc->cuentaPagar== 1 ? 'checked' : '' }} {{ old('cuentaPagar')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentap" >Cuenta por Pagar</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Refiere" name="refiereFlujo" type="checkbox" value="1" {{ $puc->refiereFlujo== 1 ? 'checked' : '' }} {{ old('refiereFlujo')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Refiere" >Refiere Flujo de Efectivo</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="exigeTerceros" name="exigeTerceros" type="checkbox" value="1" {{ $puc->exigeTerceros== 1 ? 'checked' : '' }} {{ old('exigeTerceros')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exigeTerceros" >Exige Terceros</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="exige" name="exigeCentroCostos" type="checkbox" value="1" {{ $puc->exigeCentroCostos== 1 ? 'checked' : '' }} {{ old('exigeCentroCostos')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exige" >Exige Centro de Costos</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Maneja" name="manejaReferencias" type="checkbox" value="1" {{ $puc->manejaReferencias== 1 ? 'checked' : '' }} {{ old('manejaReferencias')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Maneja" >Maneja Referencias</label>
                                            <br>
                                            <input disabled="disabled" class="checked" id="Activa" name="activa" type="checkbox" value="1" {{ $puc->activa== 1 ? 'checked' : '' }} {{ old('activa')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Activa" >Activa</label>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 col-lg-12">
                                        <label for="">Persona juridicas (BANCOS)</label>
                                        <select  name="persona_id" id="persona_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="">[Seleccione una opción]</option>
                                            @foreach($personaJuridica as $item)
                                                <option {{ old('persona_id', $puc->persona_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nit}} {{$item->nomComercial}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <label for="">Código Interno</label>
                                        <input type="text"  class="form-control form-control-user" id="codigoInterno" name="codigoInterno"  value="{{ old('codigoInterno'). $puc->numeroCuenta }}" placeholder="Código Interno...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Código Sucursal</label>
                                        <input type="text"  class="form-control form-control-user" id="codigoSucursal" name="codigoSucursal"  value="{{ old('codigoSucursal'). $puc->numeroCuenta }}" placeholder="Código Sucursal...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <label for="">Número de Cuenta</label>
                                        <input type="text"  class="form-control form-control-user" id="numeroCuenta" name="numeroCuenta"  value="{{ old('numeroCuenta'). $puc->numeroCuenta }}" placeholder="NUMERO DE CUENTA...">
                                        {{--<button type="button" class="btn btn-primary mb-2" id="calcular" onclick="calcular()">Calcular Dígito de Verificación</button>--}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Tipo de Cuenta Bancaria</label>
                                        <select name="tipoCuentaBancaria" id="tipoCuentaBancaria"  class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                            <option value="{{$puc->tipoCuentaBancaria}}">{{$puc->tipoCuentaBancaria}}</option>
                                            <option value="Cuenta Corriente">Cuenta Corriente</option>
                                            <option value="Cuenta de Ahorros">Cuenta de Ahorros</option>
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
                                                <input type="radio"  id="situacionFondos" name="situacionFondos" checked="checked"  value="Con Situación de Fondos" {{ old('situacionFondos')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>Con Situación de Fondos</label>
                                            <label class="radio-inline">
                                                <input type="radio" style="padding: 8px;" id="situacionFondos" name="situacionFondos"  value="Sin Situación de Fondos" {{ old('situacionFondos')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>Sin Situación de Fondos</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Uso de Cuenta Bancaria CGN</label>
                                        <select name="usocuentaBancaria" id="usocuentaBancaria"  class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                            <option value="{{$puc->usocuentaBancaria}}">{{$puc->usocuentaBancaria}}</option>
                                            <option value="Pagadora y Recaudadora">Pagadora y Recaudadora</option>
                                            <option value="Pagadora">Pagadora</option>
                                            <option value="Recaudadora">Recaudadora</option>
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label for="">Descripción</label>
                                            <textarea name="descripcion" id="descripcion" class="form-control " style="resize:none">{{$puc->descripcion}} </textarea>
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="direccions">
                                    <div class="col-md-6">
                                        <label for="">Posición Clasificador Presupuestal de Gastos</label>
                                        <input type="text"  class="form-control form-control-user" value="{{old('posicionClasificadorPresupuestalGastos'). $puc->posicionClasificadorPresupuestalGastos}}" id="posicionClasificadorPresupuestalGastos" name="posicionClasificadorPresupuestalGastos"  placeholder="Posición Clasificador Presupuestal de gastos...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Posición Clasificador Presupuestal de Ingresos</label>
                                        <input type="text"  class="form-control form-control-user" value="{{old('posicionClasificadorPresupuestalIngresos'). $puc->posicionClasificadorPresupuestalIngresos}}" id="posicionClasificadorPresupuestalIngresos" name="posicionClasificadorPresupuestalIngresos"  placeholder="Posición Clasificador Presupuestal de Ingresos...">
                                    </div>
                                </div>
                                @foreach($empresa as $e)
                                    @if ($e->marco_normativo =='EMPRESA PUBLICA' || $e->marco_normativo=='ENTIDADES DEL GOBIERNO' )
                                        &nbsp
                                            @if($puc->cuentaMaestraSalud==1)
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label for="">CUENTA MAESTRA SALUD</label>
                                                    <br>
                                                    <label class="radio-inline">
                                                        <input type="radio"  id="cuentaMaestraSalud" name="cuentaMaestraSalud"  value="1" {{ $puc->cuentaMaestraSalud== '1' ? 'checked' : '' }} onchange="mostrar()">SI</label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  id="cuentaMaestraSalud" name="cuentaMaestraSalud" value="2" {{ $puc->cuentaMaestraSalud== '2' ? 'checked' : '' }} onchange="noMostrar()">NO</label>
                                                </div>
                                            </div>
                                                <div style="width: 100%;">
                                                <div class="row" id="">
                                                    <div class="col-md-6 col-lg-6">
                                                        <label for="">Fuente de financiación SIA</label>
                                                        <select  name= "fuentefinanciacionSIA_id" id="fuentefinanciacionSIA_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                            <option value="12">[Seleccione una opción]</option>
                                                            @foreach($fuentes as $item)
                                                                <option {{ old('fuentefinanciacionSIA_id', $puc->fuentefinanciacionSIA_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->abreviatura.' '.$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <label for="">Código Entidad Financiera  SIA</label>
                                                        <select  name= "codigoEntidadFinancieraSIA_id" id="codigoEntidadFinancieraSIA_id" class="select2 form-control custom-select"  style="width: 100%; height:36px;">
                                                            <option value="29" >[Seleccione una opción]</option>
                                                            @foreach($codigoEntidad as $item)
                                                                <option {{ old('codigoEntidadFinancieraSIA_id', $puc->codigoEntidadFinancieraSIA_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->abreviatura.' '.$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                &nbsp
                                                <div class="row" id="">
                                                    <div class="col-md-6 col-lg-6">
                                                        <label for="">Fut excedentes de Liquidez</label>
                                                        <select  name= "futExcedentesLiquidez_id" id="futExcedentesLiquidez_id" class="select2 form-control custom-select"  style="width: 100%; height:36px;">
                                                            <option value="1">[Seleccione una opción]</option>
                                                            @foreach($fut as $item)
                                                                <option {{ old('futExcedentesLiquidez_id', $puc->futExcedentesLiquidez_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->abreviatura.' '.$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6" id="infoCuentas">
                                                        <label for="">Cuenta Maestra</label>
                                                        <select  name= "cuentaMaestra_id" id="cuentaMaestra_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                            <option value="8">[Seleccione una opción]</option>
                                                            @foreach($pucMaestra as $item)
                                                                <option {{ old('cuentaMaestra_id', $puc->cuentaMaestra_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->abreviatura.' '.$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                &nbsp
                                            </div>
                                            @else
                                            <div class="row"  id="nombre1s">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label for="">CUENTA MAESTRA SALUD</label>
                                                        <br>
                                                        <label class="radio-inline">
                                                            <input type="radio"  id="cuentaMaestraSalud" name="cuentaMaestraSalud"  value="1" {{ $puc->cuentaMaestraSalud== '1' ? 'checked' : '' }} onchange="mostrar()">SI</label>
                                                        <label class="radio-inline">
                                                            <input type="radio"  id="cuentaMaestraSalud" name="cuentaMaestraSalud" value="2" {{ $puc->cuentaMaestraSalud== '2' ? 'checked' : '' }} onchange="noMostrar()">NO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            &nbsp
                                            <div style="width: 100%;">
                                                <div class="row" id="">
                                                    <div class="col-md-6 col-lg-6">
                                                        <label for="">Fuente de financiación SIA</label>
                                                        <select  name= "fuentefinanciacionSIA_id" id="fuentefinanciacionSIA_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                            <option value="12">[Seleccione una opción]</option>
                                                            @foreach($fuentes as $item)
                                                                <option {{ old('fuentefinanciacionSIA_id', $puc->fuentefinanciacionSIA_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <label for="">Código Entidad Financiera  SIA</label>
                                                        <select  name= "codigoEntidadFinancieraSIA_id" id="codigoEntidadFinancieraSIA_id" class="select2 form-control custom-select"  style="width: 100%; height:36px;">
                                                            <option value="29" >[Seleccione una opción]</option>
                                                            @foreach($codigoEntidad as $item)
                                                                <option {{ old('codigoEntidadFinancieraSIA_id', $puc->codigoEntidadFinancieraSIA_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->concepto}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                &nbsp
                                                <div class="row" id="">
                                                    <div class="col-md-6 col-lg-6">
                                                        <label for="">Fut excedentes de Liquidez</label>
                                                        <select  name= "futExcedentesLiquidez_id" id="futExcedentesLiquidez_id" class="select2 form-control custom-select"  style="width: 100%; height:36px;">
                                                            <option value="1">[Seleccione una opción]</option>
                                                            @foreach($fut as $item)
                                                                <option {{ old('futExcedentesLiquidez_id', $puc->futExcedentesLiquidez_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->conceptoLiquidez}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div style="display: none" id="infoCuentas" class="col-md-6 col-lg-6">
                                                        <label for="">Cuenta Maestra</label>
                                                        <select  name= "cuentaMaestra_id" id="cuentaMaestra_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                            <option value="8">[Seleccione una opción]</option>
                                                            @foreach($pucMaestra as $item)
                                                                <option {{ old('cuentaMaestra_id', $puc->cuentaMaestra_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->conceptoCuentaMaestra}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                &nbsp
                                            </div>
                                            @endif
                                    @endif
                                @endforeach
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                                </div>
                            </div>
                    </form>
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
                descripcion:{
                    maxlength:50,
                },
                posicionClasificadorPresupuestalGastos:{
                    required: true,
                    digits:true,
                },
                posicionClasificadorPresupuestalIngresos:{
                    required: true,
                    digits:true,
                },
                codigoInterno:{
                    digits: true,
                    maxlength:20,
                },
                codigoSucursal:{
                    digits: true,
                    maxlength:20,
                },
                numeroCuenta:{
                    digits: true,
                    maxlength:20,
                },
            },
            messages: {
                numeroCuenta: {
                    maxlength:"El limite es de 20 números",
                    digits:"Este campo solo revise digitos",
                },
                codigoInterno: {
                    maxlength:"El limite es de 20 números",
                    digits:"Este campo solo revise digitos",
                },
                codigoSucursal: {
                    maxlength:"El limite es de 20 números",
                    digits:"Este campo solo revise digitos",
                },
                descripcion: {
                    maxlength:"El limite es de 50 caracteres",
                },
                posicionClasificadorPresupuestalGastos:{
                    digits:"ESte campo debe ser numerico"
                },
                posicionClasificadorPresupuestalIngreso:{
                    digits:"ESte campo debe ser numerico"
                }
            }
        });

    });
</script>
<script !src="">
    function mostrar(){
        document.getElementById('infoCuentas').style.display ='block';

    }
    function noMostrar() {
        document.getElementById('infoCuentas').style.display = 'none';
    }
</script>