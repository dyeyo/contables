@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Transacciones</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{route('transaccion.index')}}">Transacciones</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Transaccion {{$trasacciones->numero_doc}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="container">
                        @if (Session::has('messageMalo'))
                            <div class="alert alert-danger">{{ Session::get('messageMalo') }}</div>
                        @endif
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="{{ route('transaccion.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="excel" class="">
                                <button class="btn btn-success" style="float: right;">Importar datos</button>
                                <a href="{{route('transaccion.export',$trasacciones->id)}}" style="margin-right: 8px;" class="btn btn-success  float-right">
                                    <i class="fa fa-download"></i>
                                </a>
                            </form>
                        </div>
                        &nbsp
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mes31" disabled="disabled" value="01" id="enero">ENERO</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mesBisiesto" disabled="disabled" value="02" id="febrero">FEBRERO</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mes31" disabled="disabled" value="03" id="marzo">MARZO</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mes31" disabled="disabled" value="04" id="abril">ABRIL</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mes30" disabled="disabled" value="05" id="mayo">MAYO</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mes31" disabled="disabled" value="06" id="junio">JUNIO</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mes30" disabled="disabled" value="07" id="julio">JULIO</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mes31" disabled="disabled" value="08" id="agosto">AGOS</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mes31" disabled="disabled" value="09" id="septiembre">SEPTI</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm btn-block mes30" disabled="disabled" value="10" id="octubre">OCTUB</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm mes31" disabled="disabled" value="11" id="noviembre">NOVIE</button>
                        </div>
                        <div class="col-sm-4 col-md-1">
                            <button class="btn btn-primary btn-sm mes30" disabled="disabled" value="12" id="diciembre">DICIEM</button>
                        </div>
                    </div>
                    <form class="user"  action="{{route('transaccionEditar.update',$trasacciones->id)}}" method="post" id="puc"  name="puc">
                        {{csrf_field()}}
                        {{ method_field('put') }}
                        <div class="card-body">
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Año</label>
                                    <input readonly="readonly" type="text"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year',$trasacciones->anio)}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Mes</label>
                                    <input  type="text"  class="form-control form-control-user" readonly="readonly" id="mes" name="mes" value="{{$trasacciones->mes}}">
                                    <input type="hidden" name="fecha_movimiento" id="fecha_movimiento" value="{{$trasacciones->fecha_movimiento}}">
                                    {{--<input type="hidden" id="est_transaccion_id" name="est_transaccion_id" value="4">--}}
                                </div>
                                <div class="col-md-2">
                                    <label for="">Día</label>
                                    <select  readonly="readonly" name= "dia" id="dia" class=" form-control custom-select" >
                                        <option readonly="readonly" {{ old('dia', $trasacciones->dia) == $trasacciones->dia ? 'selected' : '' }} value="{{$trasacciones->dia}}">{{$trasacciones->dia}}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Comprobantes</label>
                                    <select  readonly="readonly" onchange="tipoPresupuesto()" name= "comprobante_id" id="comprobante_id" class="form-control custom-select" >
                                        <option value="" >[Seleccione una Opción]</option>
                                        @foreach($comprobante as $item)
                                            <option {{ old('comprobante_id', $trasacciones->comprobante_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombreSoporte}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Tercero</label>
                                    <select  readonly="readonly" name="tercero_id" id="tercero_id" class=" form-control custom-select" >
                                        <option value="">[Seleccione una Opción]</option>
                                        @foreach($terceros as $item)
                                            <option {{ old('tercero_id', $trasacciones->tercero_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->natural()->pluck('numeroDocumento')->implode('')}} {{$item->empleado()->pluck('numeroDocumento')->implode('')}} {{$item->juridica()->pluck('nit')->implode('')}} {{$item->raz_social}} {{$item->nombre1}} {{$item->nombre2}} {{$item->apellido}} {{$item->apellido2}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tipo de Presupuestos</label>
                                    <select  readonly="readonly" name="tipoPresupuesto_id" id="tipoPresupuesto_id" class=" form-control custom-select" >
                                        @foreach($tipoPresupuestos as $item)
                                            <option {{ old('tipoPresupuesto_id', $trasacciones->tipoPresupuesto_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombrePresupuesto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">No Documento</label>
                                    <input readonly="readonly" type="text"  id="numero_doc" class="form-control form-control-user" name="numero_doc"  value="{{ old('numero_doc'). $trasacciones->numero_doc }}">
                                </div>
                                <div class="col-md-3">
                                    <button type="button" style="margin-top: 40px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        Número de documentos previos
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tipo de Pago</label>
                                    <select  readonly="readonly" name= "tipoPago" id="tipoPago" class="form-control custom-select" >
                                        <option {{ old('tipoPago', $trasacciones->tipoPago) == $trasacciones->tipoPago ? 'selected' : '[Seleccione una Opción]' }} value="{{$trasacciones->tipoPago}}">{{$trasacciones->tipoPago}}</option>
                                        <option value="Para Nómina" {{ old('tipoPago') }} > Para Nómina</option>
                                        <option value="Contribuciones Inherentes a la Nómina" {{ old('tipoPago') }} > Contribuciones Inherentes a la Nómina</option>
                                        <option value="Prestaciones Sociales" {{ old('tipoPago') }} > Prestaciones Sociales</option>
                                        <option value="Viáticos y Gastos de Transporte" {{ old('tipoPago') }} > Viáticos y Gastos de Transporte</option>
                                        <option value="Serviciode la Deuda " {{ old('tipoPago') }} > Servicio de la Deuda</option>
                                        <option value="Contratos de Prestación de Servicios"  {{ old('tipoPago') }} > Contratos de Prestación de Servicios</option>
                                        <option value="Consultorías"  {{ old('tipoPago') }} > Consultorías</option>
                                        <option value="Mantenimiento y/o Reparación"  {{ old('tipoPago') }} > Mantenimiento y/o Reparación</option>
                                        <option value="Obra Pública"  {{ old('tipoPago') }} > Obra Pública</option>
                                        <option value="Compra Ventas y/o Suministro"  {{ old('tipoPago') }} > Compra Ventas y/o Suministro</option>
                                        <option value="Concesión"  {{ old('tipoPago') }} > Concesión</option>
                                        <option value="Comodatos"  {{ old('tipoPago') }} > Comodatos</option>
                                        <option value="Arrendamientos"  {{ old('tipoPago') }} > Arrendamientos</option>
                                        <option value="Seguros"  {{ old('tipoPago') }} > Seguros</option>
                                        <option value="Convenios" {{ old('tipoPago') }} > Convenios</option>
                                        <option value="Emprestitos" {{ old('tipoPago') }} > Emprestitos</option>
                                        <option value="Otros" {{ old('tipoPago') }} > Otros.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Revelaciones</label>
                                    <textarea readonly="readonly" name="revelacion" id="revelacion" class="form-control form-control-user" cols="1"  rows="1" style="resize: none;">{{$trasacciones->revelacion}}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Detalle</label>
                                    <textarea readonly="readonly" name="detalle" id="detalle" class="form-control form-control-user" cols="1"  rows="1" style="resize: none;">{{$trasacciones->detalle}}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col-md-3">
                                    <label for="">Valor de Comprobante</label>
                                    <input readonly="readonly" type="text"  class="form-control form-control-user valor_transaccionsinPunto"  id="valor_transaccionsinPunto"   onchange="totalSinIva()" value="{{$trasacciones->valor_transaccion}}"  name="valor_transaccion"  placeholder="valor de transaccion...">
                                    <input type="hidden"  class="form-control form-control-user"  id="codigo_presupuesto_letras" value="{{old('codigo_presupuesto_letras').$trasacciones->codigo_presupuesto_letras}}" name="codigo_presupuesto_letras">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Tarifa IVA</label>
                                    <input readonly="readonly" type="text"  class="form-control form-control-user valorBase" id="tarifa_iva"  onkeyup="formatTarifaIva(this)" onchange="totalSinIva()"  value="{{old('tarifa_iva'). $trasacciones->tarifa_iva}}" name="tarifa_iva"  placeholder="Tarifa IVA...">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Valor Base sin IVA</label>
                                    <input type="text"  readonly="readonly" class="form-control form-control-user" onkeyup="format(this)" onchange="format(this)"  id="valorBase" value="{{$trasacciones->valorBase}}" name="valorBase"  placeholder="Valor Base...">
                                    <input type="hidden"  class="form-control form-control-user"  value="{{$trasacciones->plantilla}}" id="plantilla" name="plantilla" >
                                </div>
                                <div class="col-md-3">
                                    <label for="">Valor IVA</label>
                                    <input type="text"  readonly="readonly" class="form-control form-control-user" id="valor_iva"  onkeyup="formatValorIva(this)" onchange="formatValorIva(this)"  value="{{$trasacciones->valor_iva}}" name="valor_iva"  placeholder="Valor IVA...">
                                </div>
                            </div>
                            &nbsp
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Código de Presupuesto</label>
                                    <input readonly="readonly" type="text"  class="form-control form-control-user"  value="{{$trasacciones->codigo_presupuesto}}" id="codigo_presupuesto" name="codigo_presupuesto"  placeholder="Codigo  Presupuesto...">
                                    @if ($errors->has('codigo_presupuesto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('codigo_presupuesto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <button type="button" style="margin-top: 40px;" class="btn btn-primary botonesDesRet btn-block" data-toggle="modal" data-target="#Revelaciones">
                                        Retenciones, Descuentos y Deducciones
                                    </button>
                                </div>
                            </div>
                            &nbsp
                            <h2>Plantilla Contable</h2>
                            <button style="margin-top: -43px;float: right;" type="button"  class="btn btn-primary agregarPlanBasico" id="agregarPlan"><i class="fa fa-plus"></i></button>
                            <div class="row"  id="numeroDocumentos" readonly="readonly" >
                                <div class="col-md-12" style="overflow:scroll; height: 330px;">
                                    <table id="TablaPro" class="table">
                                        <thead>
                                        <tr>
                                            <th>CODIGO GUIA</th>
                                            <th>CODIGO</th>
                                            <th>CENTRO DE COSTO</th>
                                            <th>TERCERO</th>
                                            <th>DEBITO</th>
                                            <th>CREDITO</th>
                                            <th>DOC REF</th>
                                            <th>NIIF</th>
                                            <th>NOTA</th>
                                        </tr>
                                        </thead>
                                        <tbody id="ProSelected">
                                        </tbody>
                                        <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Sumas Iguales:</b></td>
                                        <td><input readonly="readonly" type="text" style="width:150px;" class="form-control form-control-user" name="total_debito" id="total_debito" data-id="{{$trasacciones->total_debito}}" value="{{$trasacciones->total_debito}}"></td>
                                        <td><input readonly="readonly" type="text" style="width:150px;" class="form-control form-control-user" name="total_credito" id="total_credito" data-id="{{$trasacciones->total_credito}}" value="{{$trasacciones->total_credito}}"></td>
                                        <td><input readonly="readonly" type="text" style="width:150px;" class="form-control form-control-user" name="diferencia" id="direfencia" value="{{$trasacciones->diferencia}}"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-user btn-block editable" type="submit">Continuar Editando</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-success btn-user btn-block contabilizar" disabled="disabled" type="submit">CONTABILIZAR</button>
                                </div>
                            </div>
                        </div>
                        &nbsp
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                <div class="card-body">
                    <div class="py-3">
                        Plantilla Contable
                    </div>
                    <div class="" style="overflow:scroll;height:330px;">
                        <table id="TablaPro" class="table">
                            <thead>
                            <tr>
                                <th>CODIGO PUC</th>
                                <th>CENTRO DE COSTO</th>
                                <th>TERCERO</th>
                                <th>DEBITO</th>
                                <th>CREDITO</th>
                                <th>DOC REF</th>
                                <th>NOTA</th>
                            </tr>
                            </thead>
                            @foreach($plantillaRetenciones as $item)
                                <tbody>
                                <form class="user"  action="{{route('transaccion.updatePlantilla',$item->id)}}" method="post" id="puc"  name="puc">
                                    {{csrf_field()}}
                                    {{ method_field('put') }}
                                    <input  type="hidden" style="width: 124px;"  value="{{$item->total_debito}}" name="total_debito">
                                    <input  type="hidden" style="width: 124px;"  value="{{$item->total_credito}}" name="total_credito">
                                    <input  type="hidden" style="width: 124px;"  value="{{$item->diferencia}}" name="diferencia">
                                    <input  type="hidden" style="width: 124px;"  value="{{$item->codigoNIIIF}}" name="codigoNIIIF">
                                    <input  type="hidden" value="{{$item->valor_retenido}}" name="valor_retenido">
                                    <input  type="hidden" value="{{$item->retencion_descuento_id}}" name="retencion_descuento_id">
                                    <input  type="hidden" value="{{$item->transacciones_id}}" name="transacciones_id">
                                    <input  type="hidden" value="{{$item->debito}}" name="debitoTemporal">
                                    <input  type="hidden" value="{{$item->credito}}" name="creditoTemporal">
                                    <td>
                                        <select  style="width: 28pc;" onchange="niif()" name="puc_id" id="select2" class="select2 form-control custom-select">
                                            @foreach($puc as $items)
                                                {{ $style = $items->tipoCuenta_id == 2 ? '' :  'disabled="disabled"' }}
                                                <option  {{ $style }} {{ old('puc_id', $item->puc_id) == $items->id ? 'selected' : '' }} value="{{$items->id}}"> {{$items->codigo_cuenta }} {{$items->nombre_cuenta }} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select style="width:124px;" name="centro_costo_id" id="centro_costo_id" class="select2 form-control custom-select" >
                                            <option value="">[Seleccione una opcion]</option>
                                            @foreach($centroCosto as $centro)
                                                <option {{ old('tipoDocumento_id', $item->centro_costo_id) == $centro->id ? 'selected' : '' }} value="{{$centro->id}}">{{$centro->codigoCC}} - {{$centro->NombreCC}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input  style="width: 124px;" readonly="readonly" type="text" class="tercero_plantilla" value="{{$item->tercero_plantilla}}" name="tercero_plantilla"></td>
                                    <td><input  style="width: 124px;" type="text" class="debitoEditar" value="{{$item->debito}}" name="debito"></td>
                                    <td><input  style="width: 124px;" type="text" class="creditoEditar" value="{{$item->credito}}" name="credito"></td>
                                    <td><input  style="width: 124px;" type="text" name="docReferencia" value="{{$item->docReferencia}}"></td>
                                    <td><input  style="width: 124px;" type="text" value="{{$item->nota}}" name="nota"></td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i></button>
                                    </td>
                                </form>
                                <td>
                                    <form class="user"  action="{{route('transaccion.estadoPlantilla',$item->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{ method_field('put') }}
                                        <input  type="hidden" value="{{$item->total_debito}}" name="total_debito">
                                        <input  type="hidden" value="{{$item->total_credito}}" name="total_credito">
                                        <input  type="hidden" value="{{$item->diferencia}}" name="diferencia">
                                        <input  type="hidden" value="{{$item->debito}}" name="debito">
                                        <input  type="hidden" value="{{$item->credito}}" name="credito">
                                        <input  type="hidden" value="2" name="est_registro_id">
                                        <button type="submit" class="btn  btn-sm btn-danger" ><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Números de documentos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Número</th>
                            <th>Fecha de Creación</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Número</th>
                            <th>Fecha de Creación</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($numDocs as $item )
                            <tr>
                                <td>{{$item->numero_doc}}</td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Revelaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 245%;!important;margin-left: -300px;!important;">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Retenciones, Descuentos y Deducciones</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table tablaRetencion" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Tipo de Retencion</th>
                            <th>Concepto</th>
                            <th>Base Calculo</th>
                            <th>Tarifa</th>
                            <th>CALCULAR</th>
                            <th>Vr.Retenido</th>
                            <th>LLEVAR A PLANTILLA</th>

                        </tr>
                        </thead>
                        <tbody id="bodyt">
                        @foreach($retenciones as $item)
                            <tr>
                                <td>{{$item->tipoRetencion}}</td>
                                <td style="display:none;" class="mecanismo">{{$item->mecanismo}}</td>
                                <td style="display:none;"  id="nombreTercero">{{$item->raz_social}} {{$item->nombre1}} {{$item->nombre2}} {{$item->apellido}} {{$item->apellido2}} {{$item->numeroDocumento}} {{$item->nit}}</td>
                                <td style="display:none;"  id="montoMinimo">{{$item->monto_minimo}}  </td>
                                <td style="display:none;"  id="base_inical">{{$item->base_inical}}</td>
                                <td style="display:none;"  id="base_final">{{$item->base_final}}</td>
                                <td style="display:none;"  id="iva">{{$item->iva}}</td>
                                <td style="display:none;"  id="valor_fijo">{{$item->valor_fijo}}</td>
                                <td style="display:none;"  id="porcentajeRetencion">{{$item->porcentaje}}</td>
                                <td><input class="concepto " type="text" disabled="disabled" name="concepto" id="concepto" value="{{$item->concepto}}"/></td>
                                <td><input  style="width: 143px; " class="base baseFinal"  type="text" name="base" id="base"/></td>
                                @if ($item->porcentaje != null)
                                    <td><input readonly="readonly" type="number" style="text-align:right" name="porcentaje" id="porcentaje" class="porcentaje" value="{{$item->porcentaje}}"/></td>
                                @else
                                    <td><input readonly="readonly" type="number" style="text-align:right" name="porcentaje" id="porcentaje" class="valorFijo" value="{{$item->valor_fijo}}"/></td>
                                @endif
                                <td> <button class="btn btn-success calcularTotalModal" id="calcularTotalModal"><i class="fa fa-calculator"></i></button></td>
                                <td><input  style="width: 143px;text-align:right" readonly="readonly" type="text"  class="valorRetenido valorR" name="valorRetenido"  id="valorRetenido"></td>
                                <input type="hidden"  name="iva" id="iva" value="{{$item->iva}}"/></td>
                                <input type="hidden" class="retecionesDescuentos_id"  value="{{$item->id}}"/>
                                <input  type="hidden" name="codigocuenta" id="codigocuenta" class="codigocuenta" value="{{$item->codigo_cuenta}} - {{$item->nombre_cuenta}}"/>
                                <input  type="hidden" name="codigoNiff" id="codigoNiff" class="codigoNiff" value="{{$item->codigoNiff}}"/>
                                <td>
                                    <button class="btn btn-primary agregarPlan" disabled="disabled" id="agregarPlan"><i class="fa fa-save"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    <script>
        document.getElementById("valor_transaccion").addEventListener("keyup",function(e){
            document.getElementById("codigo_presupuesto_letras").value=NumeroALetras(this.value);
        });

        function Unidades(num){

            switch(num)
            {
                case 1: return "UN";

                case 2: return "DOS";

                case 3: return "TRES";

                case 4: return "CUATRO";

                case 5: return "CINCO";

                case 6: return "SEIS";

                case 7: return "SIETE";

                case 8: return "OCHO";

                case 9: return "NUEVE";
            }
            return "";
        }

        function Decenas(num){
            decena = Math.floor(num/10);

            unidad = num - (decena * 10);

            switch(decena)
            {
                case 1:
                    switch(unidad)
                    {
                        case 0: return "DIEZ";

                        case 1: return "ONCE";

                        case 2: return "DOCE";

                        case 3: return "TRECE";

                        case 4: return "CATORCE";

                        case 5: return "QUINCE";

                        default: return "DIECI" + Unidades(unidad);
                    }

                case 2:
                    switch(unidad)
                    {
                        case 0: return "VEINTE";
                        default: return "VEINTI" + Unidades(unidad);
                    }

                case 3: return DecenasY("TREINTA", unidad);

                case 4: return DecenasY("CUARENTA", unidad);

                case 5: return DecenasY("CINCUENTA", unidad);

                case 6: return DecenasY("SESENTA", unidad);

                case 7: return DecenasY("SETENTA", unidad);

                case 8: return DecenasY("OCHENTA", unidad);

                case 9: return DecenasY("NOVENTA", unidad);

                case 0: return Unidades(unidad);

            }

        }//Unidades()

        function DecenasY(strSin, numUnidades){

            if (numUnidades > 0)

                return strSin + " Y " + Unidades(numUnidades)

            return strSin;

        }//DecenasY()

        function Centenas(num){

            centenas = Math.floor(num / 100);

            decenas = num - (centenas * 100);

            switch(centenas)
            {
                case 1:

                    if (decenas > 0)

                        return "CIENTO " + Decenas(decenas);

                    return "CIEN";

                case 2: return "DOSCIENTOS " + Decenas(decenas);

                case 3: return "TRESCIENTOS " + Decenas(decenas);

                case 4: return "CUATROCIENTOS " + Decenas(decenas);

                case 5: return "QUINIENTOS " + Decenas(decenas);

                case 6: return "SEISCIENTOS " + Decenas(decenas);

                case 7: return "SETECIENTOS " + Decenas(decenas);

                case 8: return "OCHOCIENTOS " + Decenas(decenas);

                case 9: return "NOVECIENTOS " + Decenas(decenas);

            }

            return Decenas(decenas);

        }//Centenas()

        function Seccion(num, divisor, strSingular, strPlural){

            cientos = Math.floor(num / divisor)

            resto = num - (cientos * divisor)

            letras = "";

            if (cientos > 0)
                if (cientos > 1)
                    letras = Centenas(cientos) + " " + strPlural;
                else
                    letras = strSingular;

            if (resto > 0)

                letras += "";

            return letras;
        }//Seccion()

        function Miles(num){

            divisor = 1000;

            cientos = Math.floor(num / divisor)

            resto = num - (cientos * divisor)

            strMiles = Seccion(num, divisor, "MIL", "MIL");

            strCentenas = Centenas(resto);

            if(strMiles == "")

                return strCentenas;

            return strMiles + " " + strCentenas;

            //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);

        }//Miles()

        function Millones(num){

            divisor = 1000000;

            cientos = Math.floor(num / divisor)

            resto = num - (cientos * divisor)

            strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");

            strMiles = Miles(resto);

            if(strMillones == "")

                return strMiles;

            return strMillones + " " + strMiles;

        }//Millones()

        function NumeroALetras(num,pesos){

            var data = {

                numero: num,

                enteros: Math.floor(num),

                pesos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),

                letraspesos: "",

            };

            if(pesos == undefined || pesos==false) {

                data.letrasMonedaPlural="PESOS";

                data.letrasMonedaSingular="PESOS";

            }else{

                data.letrasMonedaPlural="PESOS";

                data.letrasMonedaSingular="PESOS";

            }

            if (data.pesos > 0)

                data.letraspesos = "CON " + NumeroALetras(data.pesos,true);

            if(data.enteros == 0)

                return "CERO " + data.letrasMonedaPlural + " " + data.letraspesos;

            if (data.enteros == 1)

                return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letraspesos;

            else

                return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letraspesos;

        }//NumeroALetras()
    </script>
    <script>
        $(document).ready(function(){
            $(".mecanismo").each(function(){
                var mecanismoValor=$(this).text();
                var thisRow = $(this).closest('tr');
                //var valorBase = thisRow.find('#valorBase').val();
                var valorBase = $('#valorBase').val();
                var valor_transaccionsinPunto = $('.valor_transaccionsinPunto').val();
                console.log(valorBase);
                if(mecanismoValor == '1') {
                    console.log('si' + '  '+valorBase);
                    thisRow.find(".baseFinal").val(valorBase);
                }else{
                    console.log('no' + '  '+valor_transaccionsinPunto);
                    thisRow.find(".baseFinal").val(valor_transaccionsinPunto);
                }
            });
        });

        function totalSinIva() {
            var valorComprobante = $('#valor_transaccionsinPunto').val();
            var tarifa_iva = $('#tarifa_iva').val();
            var valorSinIva= valorComprobante/((tarifa_iva/100)+1);
            var totalDosDecimales=valorSinIva.toFixed(0);
            var valorBase=valorComprobante-totalDosDecimales;
            $('#valor_iva').val(totalDosDecimales);
            $('#valorBase').val(valorBase);
        }
        function format(input){
            var num = input.value.replace(/\./g,'');
            if(!isNaN(num)){
                num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                num = num.split('').reverse().join('').replace(/^[\.]/,'');
                input.value = num;
            }

            else{ alert('Solo se permiten numeros');
                input.value = input.value.replace(/[^\d\.]*/g,'');
            }
        }
        function sum(){
            let totalDB = parseFloat($('#total_debito').data('id'));
            $('.debitos').each(function() {
                let value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    totalDB +=value;
                }
            });
            $('#total_debito').val(totalDB);
        }
        function sumC(){
            let totalDB = parseFloat($('#total_credito').data('id'));
            $('.credito').each(function() {
                let value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    totalDB += value;
                }
            });
            $('#total_credito').val(totalDB);
        }
        function restaDebitoCredito() {
            var debito = $('#total_debito').val();
            var credito= $('#total_credito').val();
            var direfencia= debito-credito;
            $('#direfencia').val(direfencia);
            var dif=$('#direfencia').val();
            if (dif!=0){
                $('.contabilizar').prop("disabled", true)
            }else{
                $('.contabilizar').prop("disabled", false)
            }
        }

        $('#dia').on('change', function() {
            var anio  =  $("#anio").val();
            var mes  =  $("#mes").val();
            var dia  =  $("#dia").val();
            var fecha_movimiento=  $("#fecha_movimiento").val(anio+'-'+mes+'-'+dia);
            console.log(fecha_movimiento)
        });
        $('.mesBisiesto').click(function () {
            var anio=$('#anio').val();
            if (((anio % 4 == 0) && (anio % 100 != 0 )) || (anio % 400 == 0)){
                $('#dia').empty();
                $('#dia').append('<option value="1" >1</option>' +
                    '<option value="2" >2</option>'+
                    '<option value="3" >3</option>'+
                    '<option value="4" >4</option>'+
                    '<option value="5" >5</option>'+
                    '<option value="6" >6</option>'+
                    '<option value="7" >7</option>'+
                    '<option value="8" >8</option>'+
                    '<option value="9" >9</option>'+
                    '<option value="10" >10</option>'+
                    '<option value="11" >11</option>'+
                    '<option value="12" >12</option>'+
                    '<option value="13" >13</option>'+
                    '<option value="14" >14</option>'+
                    '<option value="15" >15</option>'+
                    '<option value="16" >16</option>'+
                    '<option value="17" >17</option>'+
                    '<option value="18" >18</option>'+
                    '<option value="19" >19</option>'+
                    '<option value="20" >20</option>'+
                    '<option value="21" >21</option>'+
                    '<option value="22" >22</option>'+
                    '<option value="23" >23</option>'+
                    '<option value="24" >24</option>'+
                    '<option value="25" >25</option>'+
                    '<option value="26" >26</option>'+
                    '<option value="27" >27</option>'+
                    '<option value="28" >28</option>'+
                    '<option value="29" >29</option>')
            }else{
                $('#dia').empty();
                $('#dia').append('<option value="1" >1</option>' +
                    '<option value="2" >2</option>'+
                    '<option value="3" >3</option>'+
                    '<option value="4" >4</option>'+
                    '<option value="5" >5</option>'+
                    '<option value="6" >6</option>'+
                    '<option value="7" >7</option>'+
                    '<option value="8" >8</option>'+
                    '<option value="9" >9</option>'+
                    '<option value="10" >10</option>'+
                    '<option value="11" >11</option>'+
                    '<option value="12" >12</option>'+
                    '<option value="13" >13</option>'+
                    '<option value="14" >14</option>'+
                    '<option value="15" >15</option>'+
                    '<option value="16" >16</option>'+
                    '<option value="17" >17</option>'+
                    '<option value="18" >18</option>'+
                    '<option value="19" >19</option>'+
                    '<option value="20" >20</option>'+
                    '<option value="21" >21</option>'+
                    '<option value="22" >22</option>'+
                    '<option value="23" >23</option>'+
                    '<option value="24" >24</option>'+
                    '<option value="25" >25</option>'+
                    '<option value="26" >26</option>'+
                    '<option value="27" >27</option>'+
                    '<option value="28" >28</option>')
            }
        });
        $('.mes30').click(function(){
            $('#dia').empty();
            $('#dia').append('<option value="1" >1</option>' +
                '<option value="2" >2</option>'+
                '<option value="3" >3</option>'+
                '<option value="4" >4</option>'+
                '<option value="5" >5</option>'+
                '<option value="6" >6</option>'+
                '<option value="7" >7</option>'+
                '<option value="8" >8</option>'+
                '<option value="9" >9</option>'+
                '<option value="10" >10</option>'+
                '<option value="11" >11</option>'+
                '<option value="12" >12</option>'+
                '<option value="13" >13</option>'+
                '<option value="14" >14</option>'+
                '<option value="15" >15</option>'+
                '<option value="16" >16</option>'+
                '<option value="17" >17</option>'+
                '<option value="18" >18</option>'+
                '<option value="19" >19</option>'+
                '<option value="20" >20</option>'+
                '<option value="21" >21</option>'+
                '<option value="22" >22</option>'+
                '<option value="23" >23</option>'+
                '<option value="24" >24</option>'+
                '<option value="25" >25</option>'+
                '<option value="26" >26</option>'+
                '<option value="27" >27</option>'+
                '<option value="28" >28</option>'+
                '<option value="29" >29</option>'+
                '<option value="30" >30</option>'+
                '<option value="31" >31</option>');
        });
        $('.mes31').click(function(){
            $('#dia').empty();
            $('#dia').append('<option value="1" >1</option>' +
                '<option value="2" >2</option>'+
                '<option value="3" >3</option>'+
                '<option value="4" >4</option>'+
                '<option value="5" >5</option>'+
                '<option value="6" >6</option>'+
                '<option value="7" >7</option>'+
                '<option value="8" >8</option>'+
                '<option value="9" >9</option>'+
                '<option value="10" >10</option>'+
                '<option value="11" >11</option>'+
                '<option value="12" >12</option>'+
                '<option value="13" >13</option>'+
                '<option value="14" >14</option>'+
                '<option value="15" >15</option>'+
                '<option value="16" >16</option>'+
                '<option value="17" >17</option>'+
                '<option value="18" >18</option>'+
                '<option value="19" >19</option>'+
                '<option value="20" >20</option>'+
                '<option value="21" >21</option>'+
                '<option value="22" >22</option>'+
                '<option value="23" >23</option>'+
                '<option value="24" >24</option>'+
                '<option value="25" >25</option>'+
                '<option value="26" >26</option>'+
                '<option value="27" >27</option>'+
                '<option value="28" >28</option>'+
                '<option value="29" >29</option>'+
                '<option value="30" >30</option>');
        });
        $('.agregarPlan').click(function(){
            var base=  $(this).parents("tr").find("#base").val();
            var porcentaje  =  $(this).parents("tr").find("#porcentaje").val();
            console.log(porcentaje);
            var total=parseFloat(base*porcentaje)/100;
            $(this).parents("tr").find(".valorR").val(total.toFixed(2));
        });
        $(document).ready(function() {
            $('.select2').select2();
            $(document).on('change keyup','.base',function(){
                var tr= $(this).parent().parent();//primer parent td segundo tr
                var porcentaje=($(tr).find('#porcentaje').val());
                var base=($(tr).find('#base').val());
                if(isNaN(porcentaje)){
                    porcentaje=0;
                }
                if(isNaN(base)){
                    base=0;
                }
                var total=parseFloat(porcentaje*base)/100;
                $(tr).find('#valorRetenido').val(total.toFixed(2));
            });
            $(document).on('change keyup','.porcentaje',function(){
                var tr= $(this).parent().parent();//primer parent td segundo tr
                var porcentaje=($(tr).find('#porcentaje').val());
                var base=($(tr).find('#base').val());
                if(isNaN(porcentaje)){
                    porcentaje=0;
                }
                if(isNaN(base)){
                    base=0;
                }
                var total=parseFloat(porcentaje*base)/100;
                $(tr).find('#valorRetenido').val(total.toFixed(2));
            });
            $('.agregarPlan').click(function(){
                $('.select2').select2();
                var base=  parseFloat($(this).parents("tr").find("#base").val().replace('.',''));
                var porcentaje  =  $(this).parents("tr").find("#porcentaje").val();

                var codigoPUC =  $(this).parent().parent().find('.codigoCuenta').val();
                var retenido =  $(this).parent().parent().find('.valorRetenido').val();
                var codigoNiff =  $(this).parent().parent().find('.codigoNiff').val();
                var sel2 = $(this).parent().parent().find('.retecionesDescuentos_id').val();
                var fecha = $('#fecha_movimiento').val();
                var tercero =  $(this).parent().parent().find("#nombreTercero").text();
                console.log(fecha);

                var montoMinimo =  $(this).parent().parent().find("#montoMinimo").text();
                var base_inical =  $(this).parent().parent().find("#base_inical").text();
                var base_final =  $(this).parent().parent().find("#base_final").text();
                var iva =  $(this).parent().parent().find("#iva").text();
                var valor_fijo =  $(this).parent().parent().find("#valor_fijo").text();
                var porcentajeRetencion =  $(this).parent().parent().find("#porcentajeRetencion").text();
                var total=parseInt(base*porcentaje)/100;
                $(this).parents("tr").find(".valorR").val(total.toFixed(2));

                var disabledResults = $(".select2");
                disabledResults.select2();
                //Funcion Jquery
                $(".puc_id").select2({
                    placeholder: "",
                    ajax: {
                        url: '/puc/pucLoadAjax/',
                        type: 'GET',
                        dataType: 'json',
                        delay: 250,
                        //Parametros a enviar al controlador
                        data: function(params) {
                            return {
                                term: params.term
                            }
                        },
                        //Resultado que responde el controlador.
                        processResults: function(data, page) {
                            return {
                                results: data
                            }
                        }
                    },
                    language: {
                        noResults: function() {
                            return "No se encontraron resultados."
                        },
                        searching: function() {
                            return "Buscando..."
                        },
                        errorLoading: function() {
                            return 'Se presentó un error.';
                        },
                    }
                });

                $(function () {
                    $(".puc_id").change(function () {
                        var nFilas = $("#TablaPro tr").length;
                        if (nFilas < 4 ){
                            $('.enviar').prop("disabled", true)
                        }else{
                            $('.enviar').prop("disabled", false)
                        }
                    });
                });
                /**
                 * OPCION PORCENTAJE
                 */
                if (montoMinimo !='' && porcentajeRetencion != ''){
                    if (base >= montoMinimo){
                        $('.debitos').keyup(function(){
                            let inps = $('.debitos');
                            let disabled = false;
                            let total_debito=0;
                            for(i = 0; i < inps.length; i++) {
                                let valor=$(this).val();
                                total_debito += valor;
                                inp = inps[i].value;
                                if(inp > 0){
                                    disabled = true;
                                }
                            }
                            // Habilitar y deshabilitar el input
                            if(disabled == true){
                                $(this).parent().parent().find('.credito').css('display','none');
                                $(this).css('display','block')
                            }
                            else{
                                $(this).parent().parent().find('.credito').css('display','block');
                                $(this).css('display','none')
                            }
                            sum();
                            restaDebitoCredito();
                        });
                        $('.credito').keyup(function(){
                            let inps = $('.credito');
                            let disabled = false;
                            for(i = 0; i < inps.length; i++) {
                                inp = inps[i].value;
                                if(inp > 0){
                                    disabled = true;
                                }
                            }
                            // Habilitar y deshabilitar el boton #send
                            if(disabled == true){
                                $(this).parent().parent().find('.debitos').css('display','none');
                                $(this).css('display','block')
                            }
                            else{
                                $(this).parent().parent().find('.debitos').css('display','block');
                                $(this).css('display','none')
                            }
                            sumC();
                            restaDebitoCredito();
                        });

                        $('#ProSelected').append('<tr class="active">'+
                            '<input type="hidden" name="transacciones_id[]" />'+
                            '<input type="hidden" name="fecha_movimiento[]" value="'+fecha+'" />' +
                            '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+

                            '<input type="hidden"  class="form-control" style="width:100px;" name="valorRetenido[]" id="valorRetenido" value="'+retenido+'" />'+
                            '<td><span>'+codigoPUC+'</span> </td>'+
                            '<td>'+
                            '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc puc_id select2 selef">'+
                            '</select>'+
                            '<td/>'+
                            '<td> <select style="width:8pc;" name="centro_costo_id[]" id="centro_costo_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                            '    @foreach($centroCosto as $item)'+
                            '<option value="{{$item->id}}" {{ old('centro_costo_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                            '    @endforeach'+
                            '</select></td>' +
                            '<td><input readonly="readonly" name="tercero_plantilla[]" value="'+tercero+'" id="tercero_plantilla" class="form-control custom-select">'+
                            '<td ><input style="display: none" type="text" class="form-control debitos" style="width:100px;" name="debito[]" id="debito"/></td>'+
                            '<td><input  type="text"  class="form-control credito" style="width:100px;" name="credito[]" id="credito" value="'+retenido+'"/></td>'+
                            '<td><input  type="text" class="form-control" style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>'+
                            '<td><input  type="number" class="form-control" style="width:100px;" name="codigoNIIIF[]" id="codigoNIIIF"  value="'+codigoNiff+'"/></td>' +
                            '<td><input  type="text" class="form-control" style="width:100px;" name="nota[]" id="nota"/></td>'+
                            '<td><button type="button" class="btn btn-link btn-danger remove borrar"><i class="fa fa-times"></i></button></td>'+
                            '</tr>');
                    }else {
                        alert('Base mínima inferior a valor por pagar')
                    }
                }

                /**
                 * OPCION PORCETAJE Y RANGOS
                 */
                if (base_inical !='' && base_final !='' && porcentajeRetencion != ''){
                    if (base >= base_inical && base <= base_final){
                        $('.debitos').keyup(function(){
                            let inps = $('.debitos');
                            let disabled = false;
                            let total_debito=0;
                            for(i = 0; i < inps.length; i++) {
                                let valor=$(this).val();
                                total_debito += valor;
                                inp = inps[i].value;
                                if(inp > 0){
                                    disabled = true;
                                }
                            }
                            // Habilitar y deshabilitar el input
                            if(disabled == true){
                                $(this).parent().parent().find('.credito').css('display','none');
                                $(this).css('display','block')
                            }
                            else{
                                $(this).parent().parent().find('.credito').css('display','block');
                                $(this).css('display','none')
                            }
                            sum();
                            restaDebitoCredito();
                        });
                        $('.credito').keyup(function(){
                            let inps = $('.credito');
                            let disabled = false;
                            for(i = 0; i < inps.length; i++) {
                                inp = inps[i].value;
                                if(inp > 0){
                                    disabled = true;
                                }
                            }
                            // Habilitar y deshabilitar el boton #send
                            if(disabled == true){
                                $(this).parent().parent().find('.debitos').css('display','none');
                                $(this).css('display','block')
                            }
                            else{
                                $(this).parent().parent().find('.debitos').css('display','block');
                                $(this).css('display','none')
                            }
                            sumC();
                            restaDebitoCredito();
                        });

                        $('#ProSelected').append('<tr class="active">'+
                            '<input type="hidden" name="transacciones_id[]" />'+
                            '<input type="hidden" name="fecha_movimiento[]" value="'+fecha+'" />' +
                            '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+


                            '<input type="hidden"  class="form-control" style="width:100px;" name="valorRetenido[]" id="valorRetenido" value="'+retenido+'" />'+
                            '<td><span>'+codigoPUC+'</span> </td>'+
                            '<td>' +
                            '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc selef puc_id select2">'+
                            '</select>'+
                            '<td> <select style="width:8pc;" name="centro_costo_id[]" id="centro_costo_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                            '    @foreach($centroCosto as $item)'+
                            '<option value="{{$item->id}}" {{ old('centro_costo_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                            '    @endforeach'+
                            '</select></td>' +
                            '<td><input readonly="readonly" name="tercero_plantilla[]" value="'+tercero+'" id="tercero_plantilla" class="form-control custom-select">'+
                            '<td ><input style="display: none" type="text" class="form-control debitos" style="width:100px;" name="debito[]" id="debito"/></td>'+
                            '<td><input  type="text"  class="form-control credito" style="width:100px;" name="credito[]" id="credito" value="'+retenido+'"/></td>'+
                            '<td><input  type="text" class="form-control" style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>'+
                            '<td><input  type="number" class="form-control" style="width:100px;" name="codigoNIIIF[]" id="codigoNIIIF"  value="'+codigoNiff+'"/></td>' +
                            '<td><input  type="text" class="form-control" style="width:100px;" name="nota[]" id="nota"/></td>'+
                            '<td><button type="button" class="btn btn-link btn-danger remove borrar"><i class="fa fa-times"></i></button></td>'+
                            '</tr>');
                    }else {
                        alert('Base mínima debe estar en el rango de las bases a valor por pagar')
                    }
                }

                /**
                 * OPCION VALOR FIJO
                 */
                if (valor_fijo !='' && montoMinimo !='' ){
                    if (base >= montoMinimo ){
                        $('.debitos').keyup(function(){
                            let inps = $('.debitos');
                            let disabled = false;
                            let total_debito=0;
                            for(i = 0; i < inps.length; i++) {
                                let valor=$(this).val();
                                total_debito += valor;
                                inp = inps[i].value;
                                if(inp > 0){
                                    disabled = true;
                                }
                            }
                            // Habilitar y deshabilitar el input
                            if(disabled == true){
                                $(this).parent().parent().find('.credito').css('display','none');
                                $(this).css('display','block')
                            }
                            else{
                                $(this).parent().parent().find('.credito').css('display','block');
                                $(this).css('display','none')
                            }
                            sum();
                            restaDebitoCredito();
                        });
                        $('.credito').keyup(function(){
                            let inps = $('.credito');
                            let disabled = false;
                            for(i = 0; i < inps.length; i++) {
                                inp = inps[i].value;
                                if(inp > 0){
                                    disabled = true;
                                }
                            }
                            // Habilitar y deshabilitar el boton #send
                            if(disabled == true){
                                $(this).parent().parent().find('.debitos').css('display','none');
                                $(this).css('display','block')
                            }
                            else{
                                $(this).parent().parent().find('.debitos').css('display','block');
                                $(this).css('display','none')
                            }
                            sumC();
                            restaDebitoCredito();
                        });

                        $('#ProSelected').append('<tr class="active">'+
                            '<input type="hidden" name="transacciones_id[]" />'+
                            '<input type="hidden" name="fecha_movimiento[]" value="'+fecha+'" />' +
                            '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+


                            '<input type="hidden"  class="form-control" style="width:100px;" name="valorRetenido[]" id="valorRetenido" value="'+retenido+'" />'+
                            '<td><span>'+codigoPUC+'</span> </td>'+
                            '<td>' +
                            '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc selef puc_id select2">'+
                            '</select>'+
                            '<td> <select style="width:8pc;" name="centro_costo_id[]" id="centro_costo_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                            '    @foreach($centroCosto as $item)'+
                            '<option value="{{$item->id}}" {{ old('centro_costo_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                            '    @endforeach'+
                            '</select></td>' +
                            '<td><input readonly="readonly" name="tercero_plantilla[]" value="'+tercero+'" id="tercero_plantilla" class="form-control custom-select">'+
                            '<td ><input style="display: none" type="text" class="form-control debitos" style="width:100px;" name="debito[]" id="debito"/></td>'+
                            '<td><input  type="text"  class="form-control credito" style="width:100px;" name="credito[]" id="credito" value="'+retenido+'"/></td>'+
                            '<td><input  type="text" class="form-control" style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>'+
                            '<td><input  type="number" class="form-control" style="width:100px;" name="codigoNIIIF[]" id="codigoNIIIF"  value="'+codigoNiff+'"/></td>' +
                            '<td><input  type="text" class="form-control" style="width:100px;" name="nota[]" id="nota"/></td>'+
                            '<td><button type="button" class="btn btn-link btn-danger remove borrar"><i class="fa fa-times"></i></button></td>'+
                            '</tr>');
                    }else {
                        alert('Base mínima inferior a valor por pagar')
                    }
                }

                /**
                 * OPCION VALOR FIJO Y RANGOS
                 */
                if (base_inical !='' && base_final !='' && valor_fijo != ''){
                    if (base >= base_inical && base <= base_final){
                        $('.debitos').keyup(function(){
                            let inps = $('.debitos');
                            let disabled = false;
                            let total_debito=0;
                            for(i = 0; i < inps.length; i++) {
                                let valor=$(this).val();
                                total_debito += valor;
                                inp = inps[i].value;
                                if(inp > 0){
                                    disabled = true;
                                }
                            }
                            // Habilitar y deshabilitar el input
                            if(disabled == true){
                                $(this).parent().parent().find('.credito').css('display','none');
                                $(this).css('display','block')
                            }
                            else{
                                $(this).parent().parent().find('.credito').css('display','block');
                                $(this).css('display','none')
                            }
                            sum();
                            restaDebitoCredito();
                        });
                        $('.credito').keyup(function(){
                            let inps = $('.credito');
                            let disabled = false;
                            for(i = 0; i < inps.length; i++) {
                                inp = inps[i].value;
                                if(inp > 0){
                                    disabled = true;
                                }
                            }
                            // Habilitar y deshabilitar el boton #send
                            if(disabled == true){
                                $(this).parent().parent().find('.debitos').css('display','none');
                                $(this).css('display','block')
                            }
                            else{
                                $(this).parent().parent().find('.debitos').css('display','block');
                                $(this).css('display','none')
                            }
                            sumC();
                            restaDebitoCredito();
                        });

                        $('#ProSelected').append('<tr class="active">'+
                            '<input type="hidden" name="transacciones_id[]" />'+
                            '<input type="hidden" name="fecha_movimiento[]" value="'+fecha+'" />' +
                            '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+


                            '<input type="hidden"  class="form-control" style="width:100px;" name="valorRetenido[]" id="valorRetenido" value="'+retenido+'" />'+
                            '<td><span>'+codigoPUC+'</span> </td>'+
                            '<td>' +
                            '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc selef puc_id select2">'+
                            '</select>'+
                            '<td> <select style="width:8pc;" name="centro_costo_id[]" id="centro_costo_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                            '    @foreach($centroCosto as $item)'+
                            '<option value="{{$item->id}}" {{ old('centro_costo_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                            '    @endforeach'+
                            '</select></td>' +
                            '<td><input readonly="readonly" name="tercero_plantilla[]" value="'+tercero+'" id="tercero_plantilla" class="form-control custom-select">'+
                            '<td ><input style="display: none" type="text" class="form-control debitos" style="width:100px;" name="debito[]" id="debito"/></td>'+
                            '<td><input  type="text"  class="form-control credito" style="width:100px;" name="credito[]" id="credito" value="'+retenido+'"/></td>'+
                            '<td><input  type="text" class="form-control" style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>'+
                            '<td><input  type="number" class="form-control" style="width:100px;" name="codigoNIIIF[]" id="codigoNIIIF"  value="'+codigoNiff+'"/></td>' +
                            '<td><input  type="text" class="form-control" style="width:100px;" name="nota[]" id="nota"/></td>'+
                            '<td><button type="button" class="btn btn-link btn-danger remove borrar"><i class="fa fa-times"></i></button></td>'+
                            '</tr>');
                    }else {
                        alert('Base mínima debe estar en el rango de las bases a valor por pagar')
                    }
                }

                $(function () {
                    $(document).on('click', '.borrar', function (event) {
                        var debito =  $(this).parent().parent().find('.debitos').val();
                        var credito =  $(this).parent().parent().find('.credito').val();
                        var total_debito =$('#total_debito').val();
                        var total_credito =$(this).parent().parent().find('#total_credito').val();
                        var direfencia =$(this).parent().parent().find('#direfencia').val();
                        var restaDebito=debito-total_debito;
                        var restaCredito=debito-total_credito;
                        $('#total_debito').val(restaDebito);
                        $('#total_credito').val(restaCredito);
                        event.preventDefault();
                        $(this).closest('tr').remove();
                    });
                });

            });
            $('.agregarPlanBasico').click(function () {
                var codigoPUC =  $(this).parent().parent().find('.codigoCuenta').val();
                var base =  $(this).parent().parent().find('.baseFinal').val();
                var retenido =  $(this).parent().parent().find('.valorRetenido').val();
                var tercero = $('select[name="tercero_id"] option:selected').text().trim();
                console.log(tercero);
                var codigoNiff =  $(this).parent().parent().find('.codigoNiff').val();
                var sel2 = $(this).parent().parent().find('.retecionesDescuentos_id').val();
                var sel3 = $(this).parent().parent().find('.transacciones_id').val();
                var fecha = $('#fecha_movimiento').val();
                //alert(fecha)
                $('#ProSelected').append('<tr class="active">'+
                    '<input type="hidden" name="transacciones_id[]" data-id="'+sel3+'" />' +
                    '<input type="hidden" name="fecha_movimiento[]" value="'+fecha+'" />' +
                    '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+
                    '<input  type="hidden" class="form-control " style="width:100px;" name="codigoPUC[]" id="codigoPUC"/>' +
                    '<td><span></span> </td>'+
                    '<td>' +
                    '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc puc_id select2 selef">'+
                    '</select>'+
                    '</td>'+
                    '<td> ' +
                    '<select style="width:8pc;" name="centro_costo_id[]" id="centro_costo_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                    '    @foreach($centroCosto as $item)'+
                    '<option value="{{$item->id}}" {{ old('centro_costo_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                    '    @endforeach'+
                    '</select></td>' +
                    '<td><input  type="text" readonly="readonly" class="form-control" value="'+tercero+'"  style="width:100px;" name="tercero_plantilla[]" id="tercero_plantilla"/></td>' +
                    '<td><input  type="text" class="form-control debitos" style="width:100px;"  name="debito[]" id="debito"/></td>' +
                    '<td><input  type="text"  class="form-control credito" style="width:100px;"  name="credito[]" id="credito"/></td>' +
                    '<td><input  type="text" class="form-control " style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>' +
                    '<td><select style="width:100px;" name= "codigoNIIIF[]" id="codigoNIIIF" class="codigoNIIIFD select2 form-control custom-select" >' +
                    '   @foreach($niif as $item)'+
                    '       <option value="{{$item->codigoNIIIF}}" {{ old('codigoNIIIF') == $item->codigoNIIIF ? 'selected' : '' }} >{{$item->codigoNiff}}</option>'+
                    '   @endforeach'+
                    '</select>'+
                    '</td>' +
                    '<td><input  type="text" class="form-control" style="width:100px;" name="nota[]" id="nota"/></td>'+
                    '<td style="display: none"><input  type="number"  class="form-control" style="width:100px;" name="valorRetenido[]" id="valorRetenido"/></td>' +
                    '<td><button type="button" class="btn btn-link btn-danger remove borrar"><i class="fa fa-times"></i></button></td>'+
                    '</tr>');
                var disabledResults = $(".select2");
                disabledResults.select2();
                //Funcion Jquery
                $(".puc_id").select2({
                    placeholder: "",
                    ajax: {
                        url: '/puc/pucLoadAjax/',
                        type: 'GET',
                        dataType: 'json',
                        delay: 250,
                        //Parametros a enviar al controlador
                        data: function(params) {
                            return {
                                term: params.term
                            }
                        },
                        //Resultado que responde el controlador.
                        processResults: function(data, page) {
                            return {
                                results: data
                            }
                        }
                    },
                    language: {
                        noResults: function() {
                            return "No se encontraron resultados."
                        },
                        searching: function() {
                            return "Buscando..."
                        },
                        errorLoading: function() {
                            return 'Se presentó un error.';
                        },
                    }
                });

                $(function () {
                    $(".puc_id").change(function () {
                        var nFilas = $("#TablaPro tr").length;
                        if (nFilas < 4 ){
                            $('.enviar').prop("disabled", true)
                        }else{
                            $('.enviar').prop("disabled", false)
                        }
                    });
                });
                $('.debitos').keyup(function(){
                    let inps = $('.debitos');
                    let disabled = false;
                    let total_debito=0;
                    for(i = 0; i < inps.length; i++) {
                        let valor=$(this).val();
                        total_debito += valor;
                        inp = inps[i].value;
                        if(inp > 0){
                            disabled = true;
                        }
                    }
                    // Habilitar y deshabilitar el input
                    if(disabled == true){
                        $(this).parent().parent().find('.credito').css('display','none');
                        $(this).css('display','block')
                    }
                    else{
                        $(this).parent().parent().find('.credito').css('display','block');
                        $(this).css('display','none')
                    }
                    sum();
                    restaDebitoCredito();
                });
                $('.credito').keyup(function(){
                    let inps = $('.credito');
                    let disabled = false;
                    for(i = 0; i < inps.length; i++) {
                        inp = inps[i].value;
                        if(inp > 0){
                            disabled = true;
                        }
                    }
                    // Habilitar y deshabilitar el boton #send
                    if(disabled == true){
                        $(this).parent().parent().find('.debitos').css('display','none');
                        $(this).css('display','block')
                    }
                    else{
                        $(this).parent().parent().find('.debitos').css('display','block');
                        $(this).css('display','none')
                    }
                    sumC();
                    restaDebitoCredito();
                });
            });
            $(function () {
                $(document).on('click', '.borrar', function (event) {
                    var nFilas = $("#TablaPro tr").length-1;
                    if (nFilas < 4 ){
                        $('.enviar').prop("disabled", true)
                    }else{
                        $('.enviar').prop("disabled", false)
                    }
                    event.preventDefault();
                    $(this).closest('tr').remove();
                });
            });
            $(document).on('change keyup','.puc_id',function(){
                var id= $(".puc_id").val();
                $.ajax({
                    type: 'GET',
                    url: '/puc/loadPucPrueba/'+id,
                    dataType: 'json',
                    success: function (data) {
                        data.forEach(element=>{
                            if (element.tipoCuenta_id===1){
                                alert('Esta cuenta es de tipo SUPERIOR por facor selecione otra')
                                $('.agregarPlanBasico').attr('disabled',true)
                            }else{
                                $('.agregarPlanBasico').attr('disabled',false)
                            }
                        });
                        //console.log(data);
                    },error:function(){
                        console.log(data);
                    }
                });
                //console.log($("#puc_id").val())
            });
        });
    </script>
    <script>
        $(function() {
            $('.editable').click(function(){
                $('#puc').attr('action', '{{route('transaccion.editTransaccionNoContabilizada',$trasacciones->id)}}');
            });
            $( "#puc" ).validate({
                rules: {
                    anio:{
                        required: true,
                    },
                    mes:{
                        required: true,
                    },
                    dia:{
                        required: true,
                    },
                    tercero_id:{
                        required: true,
                    },
                    comprobante_id:{
                        required: true,
                    },
                    tipoPresupuesto_id:{
                        required: true,
                    },
                    numero_doc:{
                        required: true,
                    },
                    tipoPago:{
                        required: true,
                    },
                    detalle:{
                        required: true,
                    },
                    codigoPresupuesto:{
                        required:true,
                        digits:true,
                    },
                    valor_transaccion:{
                        required:true,
                        //digits:true,
                    },
                    valorBase:{
                        required:true,
                        //digits:true,
                    }
                },
                messages: {
                    anio:{
                        required: "Este campo es Obligatorio",
                    },
                    tipoPago:{
                        required: "Este campo es Obligatorio",
                    },
                    mes:{
                        required: "Este campo es Obligatorio",
                    },
                    dia:{
                        required: "Este campo es Obligatorio",
                    },
                    tercero_id:{
                        required: "Este campo es Obligatorio",
                    },
                    codigoPresupuesto:{
                        digits: "Este campo solo recive digitos",
                        required: "Este campo es Obligatorio",
                    },
                    numero_doc:{
                        required: "Este campo es Obligatorio",
                    },
                    comprobante_id:{
                        required: "Este campo es Obligatorio",
                    },
                    tipoPresupuesto_id:{
                        required: "Este campo es Obligatorio",
                    },
                    valor_transaccion:{
                        required: "Este campo es Obligatorio",
                        //digits: "Este campo solo recive digitos",
                    },
                    valorBase:{
                        required: "Este campo es Obligatorio",
                        //digits: "Este campo solo recive digitos",
                    },
                    detalle: {
                        required: "Este campo es Obligatorio",
                    }
                },
                /*submitHandler: function(form) {
                    var plantilla=$('#plantilla').val();
                    var anio=$('#anio').val();
                    var mes=$('#mes').val();
                    var dia=$('#dia').val();
                    var fecha_movimiento=$('#fecha_movimiento').val();
                    var comprobante_id=$('#comprobante_id').val();
                    var tercero_id=$('#tercero_id').val();
                    var tipoPresupuesto_id=$('#tipoPresupuesto_id').val();
                    var numero_doc=$('#numero_doc').val();
                    var tipoPago=$('#tipoPago').val();
                    var detalle=$('#detalle').val();
                    var revelacion=$('#revelacion').val();
                    var valor_transaccionsinPunto=$('#valor_transaccionsinPunto').val();
                    var tarifa_iva=$('#tarifa_iva').val();
                    var valorBase=$('#valorBase').val();
                    var valor_iva=$('#valor_iva').val();
                    var codigo_presupuesto=$('#codigo_presupuesto').val();
                    var route= "";
                    $.ajax({
                        url:route,
                        type:'POST',
                        headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        dataType:'json',
                        data:{
                            plantilla:plantilla,
                            anio:anio,
                            mes:mes,
                            dia:dia,
                            comprobante_id:comprobante_id,
                            tercero_id:tercero_id,
                            tipoPresupuesto_id:tipoPresupuesto_id,
                            numero_doc:numero_doc,
                            fecha_movimiento:fecha_movimiento,
                            tipoPago:tipoPago,
                            detalle:detalle,
                            revelacion:revelacion,
                            valor_transaccionsinPunto:valor_transaccionsinPunto,
                            tarifa_iva:tarifa_iva,
                            valorBase:valorBase,
                            valor_iva:valor_iva,
                            codigo_presupuesto:codigo_presupuesto,
                        },
                        success: function() {
                            $('#plantilla').attr('readonly',true);
                            $('#anio').attr('readonly',true);
                            $('#mes').attr('readonly',true);
                            $('#dia').attr('readonly',true);
                            $('#fecha_movimiento').attr('readonly',true);
                            $('#comprobante_id').attr('readonly',true);
                            $('#tercero_id').attr('readonly',true);
                            $('#tipoPresupuesto_id').attr('readonly',true);
                            $('#numero_doc').attr('readonly',true);
                            $('#tipoPago').attr('readonly',true);
                            $('#detalle').attr('readonly',true);
                            $('#revelacion').attr('readonly',true);
                            $('#valor_transaccionsinPunto').attr('readonly',true);
                            $('#tarifa_iva').attr('readonly',true);
                            $('#valorBase').attr('readonly',true);
                            $('#valor_iva').attr('readonly',true);
                            $('#codigo_presupuesto').attr('readonly',true);
                            $("div").removeClass('plantilla');
                        }
                    });
                },*/
            });
        });
        $('#enero').on("click", function(){
            $('#mes').val("01");
        });
        $('#febrero').on("click", function(){
            $('#mes').val("02");
        });
        $('#marzo').on("click", function(){
            $('#mes').val("03");
        });
        $('#abril').on("click", function(){
            $('#mes').val("04");
        });
        $('#mayo').on("click", function(){
            $('#mes').val("05");
        });
        $('#junio').on("click", function(){
            $('#mes').val("06");
        });
        $('#julio').on("click", function(){
            $('#mes').val("07");
        });
        $('#agosto').on("click", function(){
            $('#mes').val("08");
        });
        $('#septiembre').on("click", function(){
            $('#mes').val("09");
        });
        $('#octubre').on("click", function(){
            $('#mes').val("10");
        });
        $('#noviembre').on("click", function(){
            $('#mes').val("11");
        });
        $('#diciembre').on("click", function(){
            $('#mes').val("12");
        });
    </script>
@endsection