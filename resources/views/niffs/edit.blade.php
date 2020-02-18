@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Cuentas NIIF</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('niff.index')}}">Cuenta NIIF</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Cuenta NIIF {{$niif->codigoNiff}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>CUENTA NIIF <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                <div class="card-body">
                    <form class="user"  action="{{route('niff.update',$niif->id)}}" method="post" id="niff" name="niff">
                        {{ method_field('put') }}
                        {{csrf_field()}}
                        @if (Session::has('message'))
                            <div class="alert alert-warning">{{ Session::get('message') }}</div>
                        @endif
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
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Código Cuenta NIIF</label>
                                            <input type="text" onchange="claseCuenta()" class="form-control form-control-user" id="codigoNiff" name="codigoNiff"  value="{{old('codigoNiff',$niif->codigoNiff)}}" placeholder="Codigo NIIF...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nombre de Cuenta NIIF</label>
                                            <input type="text"  class="form-control" id="nombreNiff" name="nombreNiff"  value="{{old('nombreNiff',$niif->nombreNiff)}}" placeholder="Nombre NIIF..." >
                                        </div>
                                    </div>
                                </div>
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cuenta PUC</label>
                                            <select  name= "puc_id" id="puc_id" class="select2 form-control custom-select">
                                                <option {{ old('puc_id', $niif->puc_id) == $niif->id ? 'selected' : '' }} value=" {{$niif->puc_id}}"> {{$niif->puc->codigo_cuenta}} -{{$niif->puc->nombre_cuenta}}</option>
                                            </select>

                                        </div>
                                    </div>
                                    {{--@if ($niif->tipoCuenta_id==2)--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tipo de Cuenta</label>
                                                <select   onChange="tipoCuentas()"  name= "tipoCuenta_id" id="tipoCuenta" class="form-control ">
                                                    @foreach($tipoCuentas as $item)
                                                        <option {{ old('tipoCuenta_id', $niif->tipoCuenta_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    {{--@else
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tipo de Cuenta</label>
                                                <select disabled="disabled"  onChange="tipoCuentas()"  name= "tipoCuenta_id" id="tipoCuenta" class="form-control ">
                                                    @foreach($tipoCuentas as $item)
                                                        <option {{ old('tipoCuenta_id', $niif->tipoCuenta_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif--}}
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Naturaleza</label>
                                            <input type="text" name="naturalezaCuenta" id="naturaleza" class="form-control form-control-user" value="{{$niif->naturalezaCuenta}}" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nivel</label>
                                            <input type="text" name="nivel" id="nivel" value="{{$niif->nivel}}" class="form-control form-control-user" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Correriente / No Corriente</label>
                                            <select name= "CuentaCoNC" id="CuentaCoNC" class="form-control ">
                                                <option value="{{$niif->CuentaCoNC}}">{{$niif->CuentaCoNC}}</option>
                                                <option value="Corriente">Corriente</option>
                                                <option value="No Corriente">No Corriente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @if ($niif->tipoCuenta_id==2)
                                    <div class="row" id="checks">
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label for="Formato ">Formato DIAN Exógena</label>
                                                <select   name= "formatoDian_id" id="formatoDian_id" class="select2 form-control" onchange="dian()">
                                                    <option value="8">[Seleccione un Formato]</option>
                                                    @foreach($formato as $item)
                                                        <option {{ old('formatoDian_id', $niif->formatoDian_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombreFormatoDian}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label for="Formato ">Concépto Formato DIAN Exógena</label>
                                                <select   name= "conceptoDian_id" id="conceptoDian_id" class="select2 form-control ">
                                                    <option value="102">[Seleccione un Formato]</option>
                                                    @foreach($concepto as $item)
                                                        <option {{ old('conceptoDian_id', $niif->conceptoDian_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->codigo.' '.$item->concepto}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Privilegios</label>
                                            <br>
                                            <select name="opcionesPrivilegios_id" id="opcionesPrivilegios_id" class="form-control">
                                                <option value="">[Seleccione un privilegio]</option>
                                                @foreach($privilegios as $item)
                                                    <option {{ old('opcionesPrivilegios_id', $niif->opcionesPrivilegios_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombrePrivilegio}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Seleccione una</label>
                                            <br>
                                            <input class="checked" id="Cuentac" name="cuentaCobrar" type="checkbox" value="1" {{ $niif->cuentaCobrar== 1 ? 'checked' : '' }} {{ old('cuentaCobrar')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentac" >Cuenta por Cobrar</label>
                                            <br>
                                            <input class="checked" id="Cuentap" name="cuentaPagar" type="checkbox" value="1" {{ $niif->cuentaPagar== 1 ? 'checked' : '' }} {{ old('cuentaPagar')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentap" >Cuenta por Pagar</label>
                                            <br>
                                            <input class="checked" id="Refiere" name="refiereFlujo" type="checkbox" value="1" {{ $niif->refiereFlujo== 1 ? 'checked' : '' }} {{ old('refiereFlujo')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Refiere" >Refiere Flujo de Efectivo</label>
                                            <br>
                                            <input class="checked" id="exigeTerceros" name="exigeTerceros" type="checkbox" value="1" {{ $niif->exigeTerceros== 1 ? 'checked' : '' }} {{ old('exigeTerceros')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exigeTerceros" >Exige Terceros</label>
                                            <br>
                                            <input class="checked" id="exige" name="exigeCentroCostos" type="checkbox" value="1" {{ $niif->exigeCentroCostos== 1 ? 'checked' : '' }} {{ old('exigeCentroCostos')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exige" >Exige Centro de Costos</label>
                                            <br>
                                            <input class="checked" id="exigeBase" name="exigeBase" type="checkbox" value="1" {{ $niif->exigeBase== 1 ? 'checked' : '' }} {{ old('exigeBase')==1 ? 'checked='.'"'.'checked'.'"' : '' }} onchange="showPorcentaje()">
                                            <label for="Maneja" >Exige Base</label>
                                            <br>
                                            <input class="checked" id="Activa" name="activa" type="checkbox" value="1" {{ $niif->activa== 1 ? 'checked' : '' }} {{ old('activa')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Activa" >Activa</label>
                                            @if ($niif->exigeBase=="1")
                                                <div class="form-group" id="porcentaje" style="width:20%;">
                                                    <label for="">Porcentaje</label>
                                                    <input type="text" maxlength="3" min="0" max="100"
                                                           name="porcentaje" title="El limite de este campo esta entre 1 a 100"
                                                           id="porcentaje"
                                                           class="form-control form-control-user"
                                                           value="{{$niif->porcentaje}}"
                                                           placeholder="Porcentaje">
                                                </div>
                                            @else
                                                <div class="form-group" id="porcentaje" style="width:20%;display:none;">
                                                    <label for="">Porcentaje</label>
                                                    <input type="text" maxlength="3" min="0" max="100"
                                                           name="porcentaje" title="El limite de este campo esta entre 1 a 100"
                                                           id="porcentaje"
                                                           class="form-control form-control-user"
                                                           value="{{$niif->porcentaje}}"
                                                           placeholder="Porcentaje">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                <div class="row" id="checks" style="display: none">
                                    <div class="row" id="checks">
                                        <div class="col-md-6">
                                                <label for="Formato">Formato DIAN Exógena</label>
                                                <select   name= "formatoDian_id" id="formatoDian_id" class=" form-control" onchange="dian()">
                                                    <option value="8">[Seleccione un Formato]</option>
                                                    @foreach($formato as $item)
                                                        <option {{ old('formatoDian_id', $niif->formatoDian_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombreFormatoDian}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label for="Formato ">Concépto Formato DIAN Exógena</label>
                                                <select   name= "conceptoDian_id" id="conceptoDian_id" class="select2 form-control ">
                                                    <option value="102">[Seleccione un Formato]</option>
                                                    @foreach($concepto as $item)
                                                        <option {{ old('conceptoDian_id', $niif->conceptoDian_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->codigo.' '.$item->concepto}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Privilegios</label>
                                            <br>
                                            <select name="opcionesPrivilegios_id" id="opcionesPrivilegios_id" class="form-control">
                                                <option value="">[Seleccione un privilegio]</option>
                                                @foreach($privilegios as $item)
                                                    <option {{ old('opcionesPrivilegios_id', $niif->opcionesPrivilegios_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombrePrivilegio}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <label for="">Seleccione una</label>
                                            <br>
                                            <input class="checked" id="Cuentac" name="cuentaCobrar" type="checkbox" value="1" {{ $niif->cuentaCobrar== 1 ? 'checked' : '' }} {{ old('cuentaCobrar')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentac" >Cuenta por Cobrar</label>
                                            <br>
                                            <input class="checked" id="Cuentap" name="cuentaPagar" type="checkbox" value="1" {{ $niif->cuentaPagar== 1 ? 'checked' : '' }} {{ old('cuentaPagar')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Cuentap" >Cuenta por Pagar</label>
                                            <br>
                                            <input class="checked" id="Refiere" name="refiereFlujo" type="checkbox" value="1" {{ $niif->refiereFlujo== 1 ? 'checked' : '' }} {{ old('refiereFlujo')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Refiere" >Refiere Flujo de Efectivo</label>
                                            <br>
                                            <input class="checked" id="exigeTerceros" name="exigeTerceros" type="checkbox" value="1" {{ $niif->exigeTerceros== 1 ? 'checked' : '' }} {{ old('exigeTerceros')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exigeTerceros" >Exige Terceros</label>
                                            <br>
                                            <input class="checked" id="exige" name="exigeCentroCostos" type="checkbox" value="1" {{ $niif->exigeCentroCostos== 1 ? 'checked' : '' }} {{ old('exigeCentroCostos')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="exige" >Exige Centro de Costos</label>
                                            <br>
                                            <input class="checked" id="exigeBase" name="exigeBase" type="checkbox" value="1" {{ $niif->exigeBase== 1 ? 'checked' : '' }} {{ old('exigeBase')==1 ? 'checked='.'"'.'checked'.'"' : '' }} onchange="showPorcentaje()">
                                            <label for="Maneja" >Exige Base</label>
                                            <br>
                                            <input class="checked" id="Activa" name="activa" type="checkbox" value="1" {{ $niif->activa== 1 ? 'checked' : '' }} {{ old('activa')==1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                                            <label for="Activa" >Activa</label>
                                            @if ($niif->exigeBase=="1")
                                                <div class="form-group" id="porcentaje" style="width:20%;">
                                                    <label for="">Porcentaje</label>
                                                    <input type="text" maxlength="3" min="0" max="100"
                                                           name="porcentaje" title="El limite de este campo esta entre 1 a 100"
                                                           id="porcentaje"
                                                           class="form-control form-control-user"
                                                           value="{{$niif->porcentaje}}"
                                                           placeholder="Porcentaje">
                                                </div>
                                            @else
                                                <div class="form-group" id="porcentaje" style="width:20%;display:none;">
                                                    <label for="">Porcentaje</label>
                                                    <input type="text" maxlength="3" min="0" max="100"
                                                           name="porcentaje" title="El limite de este campo esta entre 1 a 100"
                                                           id="porcentaje"
                                                           class="form-control form-control-user"
                                                           value="{{$niif->porcentaje}}"
                                                           placeholder="Porcentaje">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                                &nbsp
                            </div>
                            &nbsp
                        </div>
                    </form>
                        @can('niff.destroy')
                            <form method="POST" id="deleteTipoDoc"
                                  action="{{route('niff.destroy',$niif->id)}}">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger " style="width: 20%;margin-left: 80%;">ELIMINAR</button>
                            </form>
                        @endcan

                </div>
            </div>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
    </script>
    <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            var disabledResults = $(".select2");
            disabledResults.select2();
            $("#puc_id").select2({
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

        });
        $(document).change(function(){
            var id= $("#puc_id").val()
            $.ajax({
                type: 'GET',
                url: '/puc/loadPucPrueba/'+id,
                dataType: 'json',
                success: function (data) {
                    data.forEach(element=>{
                        if (element.tipoCuenta_id===1){
                            alert('Esta cuenta es de tipo SUPERIOR por favor selecione otra')
                        }
                    });
                    //console.log(data);
                },error:function(){
                    console.log(data);
                }
            });
            //console.log($("#puc_id").val())
        });
    </script>
    <script>
        $(function() {
            $( "#niff" ).validate({
                rules: {
                    codigoNiff:{
                        required: true,
                        digits: true,
                        maxlength:20,
                        minLength:1,
                    },
                    nombreNiff:{
                        required: true,
                    },
                    puc_id:{
                        required: true,
                    },
                },
                messages: {
                    codigoNiff:{
                        required: "Este campo es Obligatorio",
                        digits:"Este campo solo revise digitos",
                        maxlength:"Este campo debe tener maximo 20 numeros",
                        minLength:"Este campo debe tener minimo 1 numeros",
                    },
                    nombreNiff:{
                        required: "Este campo es Obligatorio",
                    },
                    puc_id:{
                        required: "Este campo es Obligatorio",
                    }
                }
            });

        });
    </script>
    <script type="text/javascript">
        function showPorcentaje() {
            divPorcentaje = document.getElementById("porcentaje");
            check = document.getElementById("exigeBase");
            if (check.checked) {
                divPorcentaje.style.display='block';
            }
            else {
                divPorcentaje.style.display='none';
            }
        }
    </script>
    <script !src="">
        function tipoCuentas() {
            var tipo=$('#tipoCuenta').val();
            if (tipo==='1' ){
                $('#checks').hide();
                console.log(tipo)
            }
            else if(tipo==='2'){
                $('#checks').show(  );
                console.log(tipo)

            }
        }
        function claseCuenta() {
            var codigo= $('#codigoNiff').val().split('');
            var tamano=codigo.length;
            var pares =tamano%2;
            var primer=codigo[0];
            if (primer==='1' || primer==='5' || primer==='6' || primer==='7' || primer==='8'){
                //console.log('debito')
                primer=$('#naturaleza').val('Débito');
                primer=$('#naturaleza').val('Débito');
            }
            if (primer==='2' || primer==='3' || primer==='4' || primer==='9'){
                //console.log('Crédito')
                primer=$('#naturaleza').val('Crédito');
                primer=$('#naturaleza').val('Crédito');
            }
            if (tamano===1){
                $('#nivel').val('1')
            }
            if (tamano===2){
                $('#nivel').val('2')
            }
            if (tamano===4){
                $('#nivel').val('3')
            }
            if (tamano===6){
                $('#nivel').val('4')
            }
            if (tamano===8){
                $('#nivel').val('5')
            }
            if (tamano===10){$('#nivel').val('6')}
            if (tamano===12){$('#nivel').val('7')}
            if (tamano===14){$('#nivel').val('8')}
            if (tamano===16){$('#nivel').val('9')}
            if (tamano===18){$('#nivel').val('10')}
            if (tamano===20){$('#nivel').val('10')}
            if (pares!=0){var mal=$('#nivel').val('').style.background='red'}

        }
s
    </script>
@endsection
