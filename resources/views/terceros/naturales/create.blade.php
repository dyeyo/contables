@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Personas Naturales</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{route('personaNarutal.index')}}">Personas Naturales</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Crear Persona Natural </strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">IMPORTAR PERSONAS NATURA</h5>
                    <form action="{{ route('personaNarutal.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <input type="file" name="excel" class="">
                            <button class="btn btn-success" style="float: right;">Importar Datos</button>
                            <a href="{{route('personaNarutal.plantilla')}}" style="margin-right: 8px;" class="btn btn-primary  float-right">
                                <i class="fa fa-file-excel-o"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>PERSONAS NATURALES <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                <div class="card-body">
                    <form class="user"  action="{{route('personaNarutal.store')}}" method="post" id="terceros" name="terceros">
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
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-body">
                        <input type="hidden"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year')}}" readonly="readonly">
                        <div class="row"  id="tipoDocumentos">
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label for="id_tipoDocumento">Tipo de Documento</label>
                                    <select  name= "id_tipoDocumento" id="id_tipoDocumento" class="form-control ">
                                        <option value="">[Seleccione un Tipo de documento]</option>
                                        @foreach($tipoDoc as $tipo)
                                            <option value="{{$tipo->id}}" {{ old('id_tipoDocumento') == $tipo->id ? 'selected' : '' }}>{{$tipo->nombreDocumento}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numeroDocumento">Número de Documento</label>
                                    <input type="text"  class="form-control form-control-user" value="{{old('numeroDocumento')}}" id="numeroDocumento" name="numeroDocumento"  placeholder="Número de Documento...">
                                    <input type="hidden"  id="tipoPersona" name="tipoPersona" value="2">
                                </div>
                            </div>
                        </div>
                        &nbsp
                        <div class="row"  id="nombre1s">
                            <div class="col-md-6">
                                <label for="">Primer Nombre</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('nombre1')}}" id="nombre1" name="nombre1"  placeholder="Primer Nombre...">
                            </div>
                            <div class="col-md-6">
                                <label for="">Segundo Nombre</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('nombre2')}}" id="nombre2" name="nombre2"  placeholder="Segundo Nombre...">
                            </div>
                        </div>
                        &nbsp
                        <div class="row"  id="apellido1s">
                            <div class="col-md-6">
                                <label for="">Primer Apellido</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('apellido')}}" id="apellido1" name="apellido"  placeholder="Primer Apellido...">
                            </div>
                            <div class="col-md-6">
                                <label for="">Segundo Apellido</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('apellido2')}}" id="apellido2" name="apellido2"  placeholder="Segundo Apellido...">
                            </div>
                        </div>
                        &nbsp
                        <div class="row"  id="direccions">
                            <div class="col-md-6">
                                <label for="">Dirección</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('direccion')}}" id="direccion" name="direccion"  placeholder="Dirección...">
                            </div>
                            <div class="col-md-6">
                                <label for="">Teléfono</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('telefono')}}" id="telefono" name="telefono"  placeholder="Número de Teléfono...">
                            </div>
                        </div>
                        &nbsp
                        <div class="row"  id="celulars">
                            <div class="col-md-6">
                                <label for="">Celular</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('celular')}}" id="celular" name="celular"  placeholder="Celular...">
                            </div>
                            <div class="col-md-6">
                                <label for="">Correo</label>
                                <input type="text"  class="form-control form-control-user" value="{{old('correo')}}" id="correo" name="correo"  placeholder="Correo Electrónico...">
                            </div>
                        </div>
                        &nbsp
                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label for="">Responsable de IVA</label>
                                    <label class="radio-inline">
                                        <input type="radio"  id="responsableIVA" name="responsableIVA" checked="checked" value="SI" {{ old('responsableIVA')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                    <label class="radio-inline">
                                        <input type="radio" id="responsableIVA" name="responsableIVA" value="NO" {{ old('responsableIVA')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Régimen Simplificado</label>
                                    <label class="radio-inline">
                                        <input type="radio"  id="regimenSimple" name="regimenSimple" checked="checked" value="SI" {{ old('regimenSimple')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                    <label class="radio-inline">
                                        <input type="radio" id="regimenSimple" name="regimenSimple" value="NO" {{ old('regimenSimple')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Designar Supervisor</label>
                                    <label class="radio-inline">
                                        <input type="radio"  id="designadoSupervisor" checked="checked" name="designadoSupervisor" value="SI"  {{ old('designadoSupervisor')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                    <label class="radio-inline">
                                        <input type="radio" id="designadoSupervisor" name="designadoSupervisor"  value="NO" {{ old('designadoSupervisor')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                </div>
                            </div>
                        </div>
                        &nbsp
                        <div class="row" id="departamento_ids">
                            <div class="col-md-6">
                                <label for="">Departamento</label>
                                <select  name= "idDepartamento" id="idDepartamento" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                    <option value="34">[Seleccione un Departamento]</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{$departamento->id}}" {{ old('idDepartamento') == $departamento->id ? 'selected' : '' }} >{{$departamento->nameDepartamento}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Ciudad</label>
                                <select  name= "ciudad_id" id="ciudad_id" class="select2 form-control custom-select" >
                                    <option value="2">[Seleccione un Municipio]</option>
                                    @foreach($ciudad as $ciu)
                                        <option value="{{$ciu->id}}" {{ old('idCiudad') == $ciu->id ? 'selected' : '' }} >{{$ciu->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        &nbsp
                        <div class="row" id="idActividads">
                            <div class="col-md-6">
                                <label for="">Descriptores CIIU</label>
                                <select  name= "descritores_id" id="descritores_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="codigoCiiu()">
                                    <option value="5">[Seleccione uno]</option>
                                    @foreach($descriptoresnCiiu as $descriptores)
                                        <option value="{{$descriptores->id}}" {{ old('descritores_id') == $descriptores->id ? 'selected' : '' }}>{{$descriptores->actividad}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Actividades CIIU</label>
                                <select  name= "id_actividadesCiiu" id="id_actividadesCiiu" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                    <option value="481">[Seleccione una Actividad]</option>
                                    @foreach($actividadesCiiu as $actividad)
                                        <option value="{{$actividad->id}}"{{ old('id_actividadesCiiu') == $actividad->id ? 'selected' : '' }}>{{$actividad->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        &nbsp
                        <div class="row"  id="id_clases">
                            <div class="col-md-6">
                                <label for="">Clase de Persona</label>
                                <select  onChange="ClaseId(this)" name= "id_clase" id="id_clase" class=" form-control custom-select" style="width: 100%; height:36px;" onchange="codigoCiiu()">
                                    <option value="1">[Seleccione una opcion]</option>
                                    @foreach($claseP as $clase)
                                        <option value="{{$clase->id}}" {{ old('id_clase') == $clase->id ? 'selected' : '' }}>{{$clase->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" id="">
                                <label for="">Dependencia</label>
                                <select  name= "dependencia_id" id="dependencia_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                    <option value="" >[Seleccione una Opción]</option>
                                    @foreach($dependencias as $dep)
                                        <option value="{{$dep->id}}"  {{ old('dependencia_id') == $dep->id ? 'selected' : '' }}>{{$dep->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        &nbsp
                        <div class="row"  id="Subclases">
                            <div class="col-md-12">
                                <label for="">Sub Clase</label>
                                <select  name= "Subclase"  id="Subclase" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                    <option value="0">[Seleccione una SubClase]</option>
                                    <option value="2.02 MISIONAL">MISIONAL</option>
                                    <option value="2.04 DE APOYO">DE APOYO</option>
                                </select>
                            </div>
                        </div>
                        &nbsp
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Información Bancaria</label>
                                <label class="radio-inline">
                                    <input type="radio"  id="SiInfo"  onclick="show1()" name="banco" value="1"  {{ old('banco')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                <label class="radio-inline">
                                    <input type="radio" id="NoInfo" onclick="show2()" name="banco" checked value="2" {{ old('banco')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                            </div>
                        </div>
                        &nbsp
                        <div id="bancos" style="display:none;">
                            <div class="row"  id="">
                                <div class="col-md-12">
                                    <label for="">Entidad Bancaria</label>
                                    <select  name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                        <option value="1">[SELECCIONES UNA ENTIDAD]</option>
                                        @foreach($entidadBancaria as $entidad)
                                            <option value="{{$entidad->id}}" {{ old('entidadBancaria_id') == $entidad->id ? 'selected' : '' }}>{{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            &nbsp
                            <div class="row"  id="">
                                <div class="col-md-6">
                                    <label for="">Número de Cuenta</label>
                                    <label for="">Número de Cuenta</label>
                                    <input type="text"  class="form-control form-control-user" value="{{old('numeroCuenta')}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Estado Actual</label>
                                        <select  name= "estadoCuenta"  id="estadoCuenta" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="[Seleccione una opción]">[Seleccione una opción]</option>
                                            <option value="Registro previo">Registro previo </option>
                                            <option value="Activa">Activa</option>
                                            <option value="Inactiva">Inactiva</option>
                                            <option value="Cancelada">Cancelada</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row"  id="">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tipo Cuenta Bancaria</label>
                                        <label class="radio-">
                                            <input type="radio"  id="TipocuentaBancaria" name="TipocuentaBancaria" value="1"  {{ old('TipocuentaBancaria')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>Ahorros</label>
                                        <label class="radio-">
                                            <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ old('TipocuentaBancaria')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>Corriente</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-user btn-block" type="submit">AGEGRAR</button>
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
        $('.select2').select2();
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

    });
</script>
<script !src="">
    $(function() {
        $( "#terceros" ).validate({
            rules: {
                id_tipoDocumento: {
                    required: true,
                },
                numeroDocumento : {
                    required: true,
                },
                nombre: {
                    required: true,
                },
                numeroCuenta:{
                    digits: true,
                    maxlength:20,
                },
                apellido: {
                    required: true,
                },
                telefono: {
                    digits: true,
                },
                celular:{
                    digits: true,
                },
                correo:{
                    email: true,
                },
                designadoSupervisor:{
                    required:true,
                },
                responsableIVA:{
                    required:true,
                },
                regimenSimple:{
                    required:true,
                },
                autoRetenedor:{
                    required:true,
                },
            },
            messages: {
                id_tipoDocumento: {
                    required: "Este campo es Obligatorio",
                },
                numeroDocumento: {
                    required: "Este campo es Obligatorio",
                },
                nombre: {
                    required: "Este campo es Obligatorio",
                },
                apellido: {
                    required: "Este campo es Obligatorio",
                },
                telefono:{
                    digits:"Este campo solo revise digitos"
                },
                celular:{
                    digits:"Este campo solo revise digitos"
                },
                correo:{
                    email:"Este campo debe ser un correo electronico"
                },
                designadoSupervisor: {
                    required: "Debe marcar una de las opciones",
                },
                responsableIVA: {
                    required: "Debe marcar una de las opciones",
                },
                regimenSimple: {
                    required: "Debe marcar una de las opciones",
                },
                autoRetenedor: {
                    required: "Debe marcar una de las opciones",
                },
                numeroCuenta: {
                    digits:"Este campo solo revise digitos",
                    maxlength:"El limite es de 20 números"
                },

            }
        });

    });
</script>

<script !src="">
    function show1(){
        document.getElementById('bancos').style.display ='block';

    }
    function show2() {
        document.getElementById('bancos').style.display = 'none';
    }
</script>
<script>
    $(document).ready(function() {
        $(function() {
            $('#tipoPersona').change(function(){
                if($('#tipoPersona').val() == 1) {
                    $('#juridica').hide();
                    $('#naturales').show();

                } else {
                    $('#juridica').show();
                    $('#naturales').hide();

                }
            });
        });

    });
</script>