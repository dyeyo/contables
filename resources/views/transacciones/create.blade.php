@extends('layouts.plantillaBase')
@section('contenido')
    <style>
        .plantilla{
            display: block;
        }
    </style>
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
                    <strong>Crear Transacciones</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                @if (Session::has('email'))
                    <div class="alert alert-danger">{{ Session::get('email') }}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                    @endif
                    &nbsp
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
                        <div class="row">
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mes31" value="01" id="enero">ENERO</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mesBisiesto" value="02" id="febrero">FEBRERO</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mes31" value="03" id="marzo">MARZO</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mes31" value="04" id="abril">ABRIL</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mes30" value="05" id="mayo">MAYO</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mes31" value="06" id="junio">JUNIO</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mes30" value="07" id="julio">JULIO</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mes31" value="08" id="agosto">AGOS</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mes31" value="09" id="septiembre">SEPTI</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block mes30" value="10" id="octubre">OCTUB</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm mes31" value="11" id="noviembre">NOVIE</button>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <button class="btn btn-primary btn-sm mes30" value="12" id="diciembre">DICIEM</button>
                            </div>
                        </div>
                    </div>
                    <form class="user"  action="{{route('transaccion.store')}}" method="post" id="puc"  name="puc">
                        {{csrf_field()}}
                        {{--<form class="user" id="puc" name="puc">
                        <meta name="csrf-token" content="{{ csrf_token() }}">--}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <br>
                                    <label for="">Definir como plantilla</label>
                                    <label class="radio-inline">
                                        <input type="radio"  id="plantilla"  name="plantilla"  onclick="show1()" value="SI" {{ old('plantilla')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                    <label class="radio-inline">
                                        <input type="radio" id="plantilla" checked="checked" name="plantilla" onclick="show2()" value="NO" {{ old('plantilla')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                </div>
                                <div class="col-md-6" id="nombre_plantilla" style="display: none">
                                    <label for="">Nombre de Plantilla</label>
                                    <input type="text"  class="form-control form-control-user"   name="nombre_plantilla"  value="{{old('nombre_plantilla')}}" >
                                </div>
                            </div>
                            &nbsp
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Año</label>
                                    <input type="text"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year')}}" readonly="readonly">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Mes</label>
                                    <input type="text"  class="form-control form-control-user" readonly="readonly" id="mes" name="mes" value="{{old('mes')}}" >
                                    <input type="hidden" id="fecha_movimiento" name="fecha_movimiento">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Día</label>
                                    <select  name= "dia" id="dia" class=" form-control custom-select" >
                                        <option value="{{old('dia')}}" >[Seleccione una dia]</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Soporte Contable</label>
                                    <select  onchange="tipoPresupuesto()" name= "comprobante_id" id="comprobante_id" class="select2 form-control custom-select" >
                                        <option value="" >[Seleccione una Opción]</option>
                                        @foreach($comprobante as $item)
                                            <option value="{{$item->id}}" {{ old('comprobante_id') == $item->id ? 'selected' : '' }} >{{$item->nombreSoporte}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Tercero</label>
                                    <select name="tercero_id" id="tercero_id" class="tercero select2 form-control custom-select" >
                                        <option value="">[Seleccione una Opción]</option>
                                        @foreach($terceros as $item)
                                            <option {{ old('tercero_id') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->natural()->pluck('numeroDocumento')->implode(' / ')}} {{$item->empleado()->pluck('numeroDocumento')->implode(' / ')}} {{$item->juridica()->pluck('nit')->implode(' / ')}} {{$item->raz_social}} {{$item->nombre1}} {{$item->nombre2}} {{$item->apellido}} {{$item->apellido2}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tipo de Presupuestos</label>
                                    <select  name="tipoPresupuesto_id" id="tipoPresupuesto_id" class=" form-control custom-select" >
                                        <option value="" >[Seleccione una Opción]</option>
                                        @foreach($tipoPresupuestos as $item)
                                            <option value="{{$item->id}}" {{ old('tipoPresupuesto_id') == $item->id ? 'selected' : '' }} >{{$item->tipoPresupuesto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">No Documento</label>
                                    @foreach($ultimonumero_doc as $item)
                                        <input type="text" id="numero_doc" class="form-control form-control-user" name="numero_doc"  value="{{$item->numero_doc+1}}">
                                    @endforeach
                                    @if ($errors->has('numero_doc'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numero_doc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <button type="button" style="margin-top: 40px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        Número de documentos previos
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tipo de Pago</label>
                                    <select  name="tipoPago" id="tipoPago" class="select2 form-control custom-select" >
                                        <option value="" >[Seleccione una Opción]</option>
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
                                    <label for="">Detalle</label>
                                    <textarea name="detalle" id="detalle" class="form-control form-control-user" cols="1"  rows="1" style="resize: none;">{{old('detalle')}}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Revelaciones</label>
                                    <textarea name="revelacion" id="revelacion" class="form-control form-control-user" cols="1"  rows="1" style="resize: none;">{{old('codigo_presupuesto')}}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Valor de Comprobante</label>
                                    <input type="text"  class="form-control form-control-user  valor_transaccionsinPunto" id="valor_transaccionsinPunto"    onchange="totalSinIva()"  value="{{old('valor_transaccion')}}" name="valor_transaccion"  placeholder="valor de transaccion...">
                                    <input type="hidden" id="codigo_presupuesto_letras" onkeyup="format(this)" onchange="format()" value="{{old('codigo_presupuesto_letras')}}" name="codigo_presupuesto_letras">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Tarifa IVA</label>
                                    <input type="text"  class="form-control form-control-user sinIva" id="tarifa_iva"  onkeyup="formatTarifaIva(this)" onchange="totalSinIva()"  value="{{old('tarifa_iva')}}" name="tarifa_iva"  placeholder="Tarifa IVA...">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Valor Base sin IVA</label>
                                    <input type="text"  readonly="readonly" class="form-control form-control-user valorBase" id="valorBase"  onkeyup="formatSinIva(this)"   value="{{old('valorBase')}}" name="valorBase"  placeholder="Valor Base...">
                                </div>

                                <div class="col-md-3">
                                    <label for="">Valor IVA</label>
                                    <input type="text"  readonly="readonly" class="form-control form-control-user" id="valor_iva"  onkeyup="formatValorIva(this)" onchange="formatValorIva(this)"  value="{{old('valor_iva')}}" name="valor_iva"  placeholder="Valor IVA...">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Código de Presupuesto</label>
                                    <input type="text"  class="form-control form-control-user"  id="codigo_presupuesto" value="{{old('codigo_presupuesto')}}" name="codigo_presupuesto"  placeholder="Codigo  Presupuesto...">
                                    @if ($errors->has('codigo_presupuesto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('codigo_presupuesto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{--<div class="col-md-6">
                                    <button type="button" disabled="disabled" style="margin-top: 40px;" class="btn btn-primary botonesDesRet btn-block" data-toggle="modal" data-target="#Revelaciones">
                                        Retenciones, Descuentos y Deducciones
                                    </button>
                                </div>--}}
                            </div>
                            &nbsp
                            <button class="btn btn-primary btn-user btn-block enviar" type="submit">GRABAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    <script>
        document.getElementById("valor_transaccionsinPunto").addEventListener("keyup",function(e){
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
                data.letrasMonedaSingular="PESOS"
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
        function show1(){
            document.getElementById('nombre_plantilla').style.display ='block';

        }
        function show2() {
            document.getElementById('nombre_plantilla').style.display = 'none';
        }

        $('#dia').on('change', function() {
            var anio  =  $("#anio").val();
            var mes  =  $("#mes").val();
            var dia  =  $("#dia").val();
            var fecha_movimiento=  $("#fecha_movimiento").val(anio+'-'+mes+'-'+dia);
            console.log(fecha_movimiento)
        });
        function sum(){
            let total = 0;
            $('.debitos').each(function() {
                let value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('#total_debito').val(total);
        }
        function sumC(){
            let totalC = 0;
            $('.credito').each(function() {
                let value = parseFloat($(this).val());
                //console.log('credito '+value);
                if (!isNaN(value)) {
                    totalC += value;
                }
            });
            $('#total_credito').val(totalC);
        }
        function restaDebitoCredito() {
            var debito = $('#total_debito').val();
            var credito= $('#total_credito').val();
            var direfencia= debito-credito;
            console.log(direfencia);
            $('#direfencia').val(direfencia);
            var dif=$('#direfencia').val();
            if (dif!=0){
                $('.enviar').prop("disabled", false)
            }else{
                $('.enviar').prop("disabled", true)
            }
        }
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

        $(document).ready(function() {
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

            $(document).on('change keyup', '#tarifa_iva', function(){
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

            $('.calcular').click(function(){
                var valorBase =$('.valorBase').val();
                var valor_comprobante = $('.valor_transaccionsinPunto').val();
                var mecanismoRetencion =  $(this).parent().parent().find(".mecanismo").text();
                if (mecanismoRetencion == 2) {
                    console.log(mecanismoRetencion);
                    $(this).parent().parent().find(".baseFinal").val(valor_comprobante);
                } else {
                    console.log(mecanismoRetencion);
                    $(this).parent().parent().find(".baseFinal").val(valorBase);
                }
            });

            $('.agregarPlan').click(function(){
                var base=  parseFloat($(this).parents("tr").find("#base").val().replace('.',''));
                var porcentaje  =  $(this).parents("tr").find("#porcentaje").val();

                var codigoPUC =  $(this).parent().parent().find('.codigoCuenta').val();
                var retenido =  $(this).parent().parent().find('.valorRetenido').val();
                var codigoNiff =  $(this).parent().parent().find('.codigoNiff').val();
                var sel2 = $(this).parent().parent().find('.retecionesDescuentos_id').val();
                var fecha = $('#fecha_movimiento').val();
                var tercero = $('select[name="tercero_id"] option:selected').text().trim();
                console.log(tercero);
                var montoMinimo =  $(this).parent().parent().find("#montoMinimo").text();
                var base_inical =  $(this).parent().parent().find("#base_inical").text();
                var base_final =  $(this).parent().parent().find("#base_final").text();
                var iva =  $(this).parent().parent().find("#iva").text();
                var valor_fijo =  $(this).parent().parent().find("#valor_fijo").text();
                var porcentajeRetencion =  $(this).parent().parent().find("#porcentajeRetencion").text();
                var total=parseInt(base*porcentaje)/100;
                $(this).parents("tr").find(".valorR").val(total.toFixed(2));

                var valorBase =$('.valorBase').val();
                var valor_comprobante = $('.valor_transaccionsinPunto').val();
                var mecanismoRetencion =  $(this).parent().parent().find(".mecanismo").text();

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
                            '<input type="hidden" name="fecha_movimiento[]" value="'+fecha+'" />'+
                            '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+
                            '<input type="hidden"  class="form-control" style="width:100px;" name="valorRetenido[]" id="valorRetenido" value="'+retenido+'" />'+
                            '<td><span>'+codigoPUC+'</span> </td>'+
                            '<td>' +
                            '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc selef puc_id select2">'+
                            '</select>'+
                            '<td><input  type="text" class="form-control" style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>'+
                            '<td> <select style="width:8pc;" name="centroCosto_id[]" id="centroCosto_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                            '<option value="1">[Seleccione un Opcion]</option>'+
                            '    @foreach($centroCosto as $item)'+
                            '<option value="{{$item->id}}" {{ old('centroCosto_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                            '    @endforeach'+
                            '</select></td>' +
                            '<td><input readonly="readonly" name="tercero_plantilla[]" value="'+tercero+'" id="tercero_plantilla" class="form-control custom-select">'+
                            '<td ><input style="display: none" type="text" class="form-control debitos" style="width:100px;" name="debito[]" id="debito"/></td>'+
                            '<td><input  type="text"  class="form-control credito" style="width:100px;" name="credito[]" id="credito" value="'+retenido+'"/></td>'+
                            '<td><input  type="number" class="form-control" style="width:100px;" name="base[]" id="base"  value="'+base+'"/></td>'+
                            '<td><input  type="number" class="form-control" style="width:100px;" name="codigoNIIIF[]" id="codigoNIIIF"  value="'+codigoNiff+'"/></td>' +
                            '<td><input  type="text" class="form-control" style="width:100px;" name="nota[]" id="nota"/></td>'+
                            '<td><button type="button" class="btn btn-link btn-danger remove borrar"><i class="fa fa-times"></i></button></td>'+
                            '</tr>'
                        );
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
                            '<input type="hidden" name="fecha_movimiento[]" value="'+fecha+'" />'+
                            '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+
                            '<input type="hidden"  class="form-control" style="width:100px;" name="valorRetenido[]" id="valorRetenido" value="'+retenido+'" />'+
                            '<td><span>'+codigoPUC+'</span> </td>'+
                            '<td>' +
                            '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc selef puc_id select2">'+
                            '</select>'+
                            '<td><input  type="text" class="form-control" style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>'+
                            '<td> <select style="width:8pc;" name="centroCosto_id[]" id="centroCosto_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                            '<option value="1">[Seleccione un Opcion]</option>'+
                            '    @foreach($centroCosto as $item)'+
                            '<option value="{{$item->id}}" {{ old('centroCosto_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                            '    @endforeach'+
                            '</select></td>' +
                            '<td><input readonly="readonly" name="tercero_plantilla[]" value="'+tercero+'" id="tercero_plantilla" class="form-control custom-select">'+
                            '<td ><input style="display: none" type="text" class="form-control debitos" style="width:100px;" name="debito[]" id="debito"/></td>'+
                            '<td><input  type="text"  class="form-control credito" style="width:100px;" name="credito[]" id="credito" value="'+retenido+'"/></td>'+
                            '<td><input  type="number" class="form-control" style="width:100px;" name="base[]" id="base"  value="'+base+'"/></td>'+
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
                            '<input type="hidden" name="fecha_movimiento[]" value="'+fecha+'" />'+
                            '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+
                            '<input type="hidden"  class="form-control" style="width:100px;" name="valorRetenido[]" id="valorRetenido" value="'+retenido+'" />'+
                            '<td><span>'+codigoPUC+'</span> </td>'+
                            '<td>' +
                            '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc selef puc_id select2">'+
                            '</select>'+
                            '<td><input  type="text" class="form-control" style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>'+
                            '<td> <select style="width:8pc;" name="centroCosto_id[]" id="centroCosto_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                            '<option value="1">[Seleccione un Opcion]</option>'+
                            '    @foreach($centroCosto as $item)'+
                            '<option value="{{$item->id}}" {{ old('centroCosto_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                            '    @endforeach'+
                            '</select></td>' +
                            '<td><input readonly="readonly" name="tercero_plantilla[]" value="'+tercero+'" id="tercero_plantilla" class="form-control custom-select">'+
                            '<td ><input style="display: none" type="text" class="form-control debitos" style="width:100px;" name="debito[]" id="debito"/></td>'+
                            '<td><input  type="text"  class="form-control credito" style="width:100px;" name="credito[]" id="credito" value="'+retenido+'"/></td>'+
                            '<td><input  type="number" class="form-control" style="width:100px;" name="base[]" id="base"  value="'+base+'"/></td>'+
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
                            '<input type="hidden" name="fecha_movimiento[]" value="'+fecha+'" />'+
                            '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+
                            '<input type="hidden"  class="form-control" style="width:100px;" name="valorRetenido[]" id="valorRetenido" value="'+retenido+'" />'+
                            '<td><span>'+codigoPUC+'</span> </td>'+
                            '<td>' +
                            '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc selef puc_id select2">'+
                            '</select>'+
                            '<td><input  type="text" class="form-control" style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>'+
                            '<td><select style="width:8pc;" name="centroCosto_id[]" id="centroCosto_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                            '<option value="1">[Seleccione un Opcion]</option>'+
                            '    @foreach($centroCosto as $item)'+
                            '<option value="{{$item->id}}" {{ old('centroCosto_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                            '    @endforeach'+
                            '</select></td>' +
                            '<td><input readonly="readonly" name="tercero_plantilla[]" value="'+tercero+'" id="tercero_plantilla" class="form-control custom-select">'+
                            '<td ><input style="display: none" type="text" class="form-control debitos" style="width:100px;" name="debito[]" id="debito"/></td>'+
                            '<td><input  type="text"  class="form-control credito" style="width:100px;" name="credito[]" id="credito" value="'+retenido+'"/></td>'+
                            '<td><input  type="number" class="form-control" style="width:100px;" name="base[]" id="base"  value="'+base+'"/></td>'+
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
                var id= $(".puc_id").val()
                $.ajax({
                    type: 'GET',
                    url: '/puc/loadPucPrueba/'+id,
                    dataType: 'json',
                    success: function (data) {
                        data.forEach(element=>{
                            if (element.tipoCuenta_id==1){
                                alert('Esta cuenta es de tipo SUPERIOR por facor selecione otra')
                            }
                        });
                        ////console.log(data);
                    },error:function(){
                        //console.log(data);
                    }
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
                var tipoPago = $('#tipoPago').val();
                var sel3 = $(this).parent().parent().find('.transacciones_id').val();
                var fecha = $('#fecha_movimiento').val();
                //alert(sel2)
                $('#ProSelected').append('<tr class="active">'+
                    '<input type="hidden" name="transacciones_id[]" data-id="'+sel3+'" />' +
                    // '<input type="hidden" name="tipoPago[]" value="'+tipoPago+'" />' +
                    '<input type="text" name="fecha_movimiento[]" value="'+fecha+'" />'+
                    '<input type="hidden" name="retecionesDescuentos_id[]"  data-id="'+sel2+'" />'+
                    '<input  type="hidden" class="form-control " style="width:100px;" name="codigoPUC[]" id="codigoPUC"/>' +
                    '<td></td>'+
                    '<td>' +
                    '<select style="width: 28pc;" onchange="niif()" name="puc_id[]" id="puc_id" class="selectPuc puc_id select2 selef">'+
                    '</select>'+
                    '</td>'+
                    '<td><input  type="text" class="form-control " style="width:100px;" name="docReferencia[]" id="docReferencia"/></td>' +
                    '<td> ' +
                    '<select style="width:8pc;" name="centroCosto_id[]" id="centroCosto_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">'+
                    '<option value="1">[Seleccione un Opcion]</option>'+
                    '    @foreach($centroCosto as $item)'+
                    '<option value="{{$item->id}}" {{ old('centroCosto_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCC}}-{{$item->NombreCC}}</option>'+
                    '    @endforeach'+
                    '</select></td>' +
                    '<td><input  type="text" readonly="readonly" class="form-control" value="'+tercero+'"  style="width:100px;" name="tercero_plantilla[]" id="tercero_plantilla"/></td>' +
                    '<td><input  type="text" class="form-control debitos" style="width:100px;"  name="debito[]" id="debito"/></td>' +
                    '<td><input  type="text"  class="form-control credito" style="width:100px;"  name="credito[]" id="credito"/></td>' +
                    '<td><input  type="number" class="form-control" style="width:100px;" name="base[]" id="base"/></td>' +
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
                var id= $(".puc_id").val()
                $.ajax({
                    type: 'GET',
                    url: '/puc/loadPucPrueba/'+id,
                    dataType: 'json',
                    success: function (data) {
                        data.forEach(element=>{
                            if (element.tipoCuenta_id==1){
                                alert('Esta cuenta es de tipo SUPERIOR por facor selecione otra')
                            }
                        });
                        ////console.log(data);
                    },error:function(){
                        //console.log(data);
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
        });
    </script>
    <script>

        function formatSinIva(){
            const number = document.querySelector('#valorBase');

            function formatNumber (n) {
                n = String(n).replace(/\D/g, "");
                return n == '' ? n : Number(n).toLocaleString();
            }
            number.addEventListener('keyup', (e) => {
                const element = e.target;
                const value = element.value;
                element.value = formatNumber(value);
            });
        }
        function formatTarifaIva(){
            const number = document.querySelector('#tarifa_iva');

            function formatNumber (n) {
                n = String(n).replace(/\D/g, "");
                return n == '' ? n : Number(n).toLocaleString();
            }
            number.addEventListener('keyup', (e) => {
                const element = e.target;
                const value = element.value;
                element.value = formatNumber(value);
            });
        }
        function formatValorIva(){
            const number = document.querySelector('#valor_iva');

            function formatNumber (n) {
                n = String(n).replace(/\D/g, "");
                return n == '' ? n : Number(n).toLocaleString();
            }
            number.addEventListener('keyup', (e) => {
                const element = e.target;
                const value = element.value;
                element.value = formatNumber(value);
            });
        }
        function totalSinIva() {
            var valorComprobante = $('#valor_transaccionsinPunto').val();
            var tarifa_iva = $('#tarifa_iva').val();
            var valorSinIva= valorComprobante/((tarifa_iva/100)+1);
            var totalDosDecimales=valorSinIva.toFixed(0);
            var valorBase=valorComprobante-totalDosDecimales;
            $('#valor_iva').val(totalDosDecimales);
            $('#valorBase').val(valorBase);
        }
        $(document).ready(function() {
            $('.select2').select2();});
    </script>
    <script>

        $(function() {

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
                    numeroDoc:{
                        required: true,
                    },
                    tipoPago:{
                        required: true,
                    },
                    detalle:{
                        required: true,
                    },
                    codigo_presupuesto:{
                        required:true,
                        digits:true,
                    },
                    valor_transaccion:{
                        //required:true,
                        //digits:true,
                    },
                    valorBase:{
                        //required:true,
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
                    codigo_presupuesto:{
                        digits: "Este campo solo recive digitos",
                        required: "Este campo es Obligatorio",
                    },
                    numeroDoc:{
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