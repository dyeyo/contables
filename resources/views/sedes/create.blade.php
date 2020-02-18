@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Centro de Costo</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('sede.index')}}">Centro de Costo</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Crear Centro de Costo</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>CENTRO DE COSTO <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                <div class="card-body">
                    <form class="user"  action="{{route('sede.store')}}" method="post" id="terceros" name="terceros">
                        {{csrf_field()}}
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
                        </div>
                        <div class="row"  id="tipoDocumentos">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="codigoCC">Código del Centro de Costo</label>
                                    <input type="text"  class="form-control form-control-user" value="{{old('codigoCC')}}" id="codigoCC" name="codigoCC"  placeholder="codigo CC...">
                                    <input type="hidden"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year')}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Nombre Grupo el Centro de Costo</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('nombreGrupoCC')}}" id="nombreGrupoCC" name="nombreGrupoCC"  placeholder="Nombre Grupo CC...">
                            </div>
                        </div>
                        &nbsp
                        <div class="row"  id="nombre1s">
                            <div class="col-md-6">
                                <label for="NombreCC">Nombre del Centro de Costo</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('NombreCC')}}" id="NombreCC" name="NombreCC"  placeholder="Nombre CC...">
                            </div>
                            <div class="col-md-6">
                                <label for="NombreCorto">Nombre Corto del Centro de Costo</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('NombreCorto')}}" id="NombreCorto" name="NombreCorto"  placeholder="Nombre Corto CC...">
                            </div>
                        </div>
                        &nbsp
                        <div class="row" >
                            <div class="col-md-6">
                                <label for="">Tercero Responsable</label>
                                <select  name= "tercero_id" id="tercero_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                    <option value="">[Seleccione un Tercero]</option>
                                    @foreach($personas as $item)
                                        <option value="{{$item->id}}" {{ old('tercero_id') == $item->id ? 'selected' : '' }} >{{$item->nombre1}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Aprobar Cuentas</label>
                                
                                <select  name="puc_id" id="puc_id" class="select2 form-control custom-select" ></select>

                               {{-- <select  name= "puc_id" id="puc_id" class="select2 form-control custom-select" >
                                    <option value="" >[Seleccione una Cuenta]</option>
                                    @foreach($puc as $item)
                                        {{ $style = $item->tipoCuenta_id == 2 ? '' :  'disabled="disabled"' }}
                                        <option   {{ $style }} value="{{$item->id}}" {{ old('puc_id') == $item->id ? 'selected' : '' }} >
                                            {{$item->codigocuenta}} - {{$item->nombreCuenta}}
                                        </option>
                                    @endforeach
                                </select>--}}
                            </div>
                        </div>
                        &nbsp
                        <div class="row"  id="id_clases">
                            <div class="col-md-6">
                                <label for="">Vigencia Inicio</label>
                                <input type="date"  class="form-control form-control-user" value="{{old('vigenciaInicio')}}" id="vigenciaInicio" name="vigenciaInicio"  placeholder="Nombre Grupo CC...">
                            </div>
                            <div class="col-md-6">
                                <label for="">Vigencia Final</label>
                                <input type="date"  class="form-control form-control-user" value="{{old('vigenciaFin')}}" id="vigenciaFin" name="vigenciaFin"  placeholder="Nombre Grupo CC...">
                            </div>
                        </div>
                        <input type="hidden" value="BASICO" name="claseCC" id="claseCC">
                        &nbsp
                        <div class="row" id="departamento_ids">
                            <div class="col-md-6">
                                <label for="">Prorrateo</label>
                                <input type="text" maxlength="3" min="0" max="100" title="El limite de este campo esta entre 1 a 100" class="form-control form-control-user" value="{{old('prorrateo')}}" id="prorrateo" name="prorrateo"  placeholder="0.00">
                            </div>
                        </div>
                        &nbsp
                        @foreach($empresa as $emp)
                            <input type="hidden" value="{{$emp->id}}" name="empresa_id" id="empresa_id">
                        @endforeach
                        <button class="btn btn-primary btn-user btn-block btnEnviar" type="submit">AGEGRAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        var disabledResults = $(".select2");
        disabledResults.select2();
        $(function() {
            $('#dependencia').hide();
            $('#Subclases').hide();
            $('#id_clase').change(function(){
                if($('#id_clase').val() == 2) {
                    $('#dependencia').show();
                    $('#Subclases').show();
                } else {
                    $('#dependencia').hide();
                    $('#Subclases').hide();
                }
            });
        });
        //Funcion Jquery
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
        var id= $("#puc_id").val();
        $.ajax({
            type: 'GET',
            url: '/puc/loadPucPrueba/'+id,
            dataType: 'json',
            success: function (data) {
                data.forEach(element=>{
                    if (element.tipoCuenta_id===1){
                        alert('Esta cuenta es de tipo SUPERIOR por facor selecione otra')
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
<script !src="">
    $(function() {
        $("#terceros").validate({
            rules: {
                codigoCC: {
                    digits: true,
                    required: true,
                },
                prorrateo:{
                    digits: true,
                    maxlength:20,
                },
                puc_id:{
                    required: true,
                }
            },
            messages: {
                codigoCC: {
                    digits: "Este campo solo resive numeros",
                    required: "Este campo es obligatorio",
                },
                prorrateo:{
                    digits:"Este campo solo revise digitos",
                },
                puc_id:{
                    required: "Este campo es obligatorio",
                }
            }
        });

    });
</script>
