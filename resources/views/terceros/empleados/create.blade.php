
<style>
    .hide {
        display: none;
    }
</style>
@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Personas Empleados</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{route('personaEmpleado.index')}}">Personas Empleados</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Crear Persona Empleado </strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>PERSONAS EMPLEADOS <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                <div class="card-body">
                    <form class="user"  action="{{route('personaEmpleado.store')}}" method="post" id="terceros" enctype="multipart/form-data" name="terceros">
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
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
                            @if (Session::has('message'))
                                <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            @endif
                            <input type="hidden"  id="tipoPersona" name="tipoPersona" value="3">
                            <div class="card-body">
                                <input type="hidden"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year')}}" readonly="readonly">

                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="Tipo de Documento">Tipo de Documento</label>
                                            <select   name= "tipoDocumento_id" id="tipoDocumento_id" class="form-control ">
                                                <option value="">[Seleccione un Tipo de documento]</option>
                                                @foreach($tipoDoc as $tipo)
                                                    <option value="{{$tipo->id}}" {{ old('tipoDocumento_id') == $tipo->id ? 'selected' : '' }}>{{$tipo->nombreDocumento}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Número de Documento</label>
                                            <input type="text"  class="form-control form-control-user" id="numeroDocumento" name="numeroDocumento"  value="{{old('numeroDocumento')}}" placeholder="Número de Documento...">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Nombre</label>
                                        <input type="text"  class="form-control form-control-user" id="nombre1" name="nombre1"  value="{{old('nombre1')}}" placeholder="Primer Nombre...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Nombre</label>
                                        <input type="text"  class="form-control form-control-user" id="nombre2" name="nombre2"  value="{{old('nombre2')}}" placeholder="Segundo Nombre...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="apellido1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Apellido</label>
                                        <input type="text"  class="form-control form-control-user" id="apellido" name="apellido"  value="{{old('apellido')}}" placeholder="Primer Apellido...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Apellido</label>
                                        <input type="text"  class="form-control form-control-user" id="apellido2" name="apellido2"  value="{{old('apellido2')}}" placeholder="Segundo Apellido...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="direccions">
                                    <div class="col-md-6">
                                        <label for="">Dirección</label>
                                        <input type="text"  class="form-control form-control-user" id="direccion" name="direccion"  value="{{old('direccion')}}" placeholder="Dirección...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Teléfono</label>
                                        <input type="text"  class="form-control form-control-user" id="telefono" name="telefono"  value="{{old('telefono')}}" placeholder="Número de Telefono...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="celulars">
                                    <div class="col-md-6">
                                        <label for="">Celular</label>
                                        <input type="text"  class="form-control form-control-user" id="celular" name="celular"  value="{{old('celular')}}" placeholder="Celular...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Correo</label>
                                        <input type="text"  class="form-control form-control-user" id="correo" name="correo"  value="{{old('correo')}}" placeholder="Correo Electrónico...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="celulars">
                                    <div class="col-md-6">
                                        <label for="">Fecha de Nacimiento</label>
                                        <input type="date"  class="form-control form-control-user selectpicker" id="fec_nacimiento" value="{{old('fec_nacimiento')}}" name="fec_nacimiento">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Fecha de Vinculación</label>
                                        <input type="date"  class="form-control form-control-user selectpicker" id="fec_vinculacion" value="{{old('fec_vinculacion')}}" name="fec_vinculacion" >
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Género</label>
                                        <select name="genero" id="genero" class="form-control">
                                            <option  value="SELECCIONE UN GENERO">[SELECCIONE UN GENERO]</option>
                                            <option value="MASCULINO">MASCULINO</option>
                                            <option value="FEMENINO">FEMENINO</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cuss" >
                                            <label class="" for="customFile">Foto</label>
                                            <br>
                                            <input type="file" name="foto"  class="" id="">
                                            &nbsp   <br>
                                            <code>El campo Foto solo acepta formato jpg, jpeg, bmp, png.</code>

                                        </div>
                                        @foreach($empresa as $emp)
                                            <input type="hidden" value="{{$emp->id}}" name="empresa_id" id="empresa_id">
                                        @endforeach
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="departamento_ids">
                                    <div class="col-md-6">
                                        <label for="">Departamento</label>
                                        <select  name= "depatamento_id" id="idDepartamento" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                            <option value="34">[Seleccione un Departamento]</option>
                                            @foreach($departamentos as $departamento)
                                                <option value="{{$departamento->id}}" {{ old('depatamento_id') == $departamento->id ? 'selected' : '' }} >{{$departamento->nameDepartamento}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Ciudad</label>
                                        <select  name= "ciudad_id" id="ciudad_id" class="select2 form-control custom-select" >
                                            <option value="2">[Seleccione una Ciudad]</option>
                                            @foreach($ciudades as $ciu)
                                                <option value="{{$ciu->id}}" {{ old('ciudad_id') == $ciu->id ? 'selected' : '' }} >{{$ciu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="idActividads">
                                    <div class="col-md-6">
                                        <label for="">Tipo de Vinculación</label>
                                        <select  name= "tipoVinculacion_id" id="tipoVinculacion_id" class=" form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="">[Seleccione uno]</option>
                                            @foreach($tipoVinculacion as $tipoVincular)
                                                <option value="{{$tipoVincular->id}}"  {{ old('tipoVinculacion_id') == $tipoVincular->id ? 'selected' : '' }}>{{$tipoVincular->nombreVinculacion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Dependencia</label>
                                        <select  name= "dependencia_id" id="dependencia_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="999">[Seleccione una dependencia]</option>
                                            @foreach($dependencia as $dep)
                                                <option value="{{$dep->id}}"  {{ old('dependencia_id') == $dep->id ? 'selected' : '' }}>{{$dep->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                {{--EMPRESA--}}
                                @foreach($empresa as $e)
                                    @if ($e->marco_normativo =='EMPRESA PUBLICA' || $e->marco_normativo=='ENTIDADES DEL GOBIERNO' )
                                    <div class="row" id="departamento_ids">
                                        <div class="col-md-6">
                                            <label for="">Nivel de Empleo</label>
                                            <select  name= "nivelEmpleo_id" id="nivelEmpleo_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="nivelEmplo()">
                                                <option value="6">[Seleccione un Nivel de Empleo]</option>
                                                @foreach($nivelEmpleo as $nivel)
                                                    <option value="{{$nivel->id}}" {{ old('nivelEmpleo_id') == $nivel->id ? 'selected' : '' }} >{{$nivel->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Empleos</label>
                                            <select  name= "codigoEmpleo_id" id="codigoEmpleo_id" class="select2 form-control custom-select" >
                                                <option value="1" >[Seleccione un Empleo]</option>
                                                @foreach($codEmpleo as $cod)
                                                    <option value="{{$cod->id}}" {{ old('codigoEmpleo_id') == $cod->id ? 'selected' : '' }} >{{$cod->nombreEmpleo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row" id="nombre1_rls">
                                        <div class="col-md-6">
                                            <label for="">Grado de Empleo</label>
                                            <input type="text"  class="form-control form-control-user"  id="gradoEmpleo" name="gradoEmpleo"  value="EMPLEO" placeholder="GRADO DE EMPLEO...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Unidad a Ejecutora</label>
                                            <select  name= "unidadEjecutara_id" id="unidadEjecutara_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                                <option value="999">[Seleccione una Unidad]</option>
                                                @foreach($unidadEje as $unidad)
                                                    <option value="{{$unidad->id}}"  {{ old('id_unidadEjecutara') == $unidad->id ? 'selected' : '' }}>{{$unidad->nombreUnidad}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        &nbsp
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" >
                                                <label for="">Designar Supervisor</label>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="designadoSupervisor" checked="checked" name="designadoSupervisor"  value="SI" {{ old('designadoSupervisor')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="designadoSupervisor" name="designadoSupervisor" value="NO" {{ old('designadoSupervisor')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" >
                                                <label for="">Ordenadores del Gasto</label>
                                                <input type="radio" id="estadoSi" name="ordenadorGasto" value="SI"  {{ old('ordenadorGasto')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}  onclick="show2();" />
                                                SI
                                                <input type="radio" id="estadoNo" name="ordenadorGasto" value="NO" checked="checked"  {{ old('ordenadorGasto')=="NO" ? 'checked='.'"'.'checked'.'"' : ''}}  onclick="show1();" />
                                                NO
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Información Bancaria</label>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="SiInfo"  onclick="show1Bancos()" name="banco" value="1"  {{ old('banco')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="NoInfo" onclick="show2Bancos()" name="banco"  checked="checked"  value="2" {{ old('banco')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

                                &nbsp
                                <div class="hide" id="fueSi">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Acto Administativo</label>
                                            <select name="actoAdministrativo" id="actoAdministrativo" class="form-control "  {{ old('genero')}}>
                                                <option value="SELECCIONE UNA OPCIÓN">SELECCIONE UNA OPCIÓN</option>
                                                <option value="DECRETO">DECRETO</option>
                                                <option value="RESOLUCION">RESOLUCIÓN</option>
                                                <option value="ACTA">ACTA</option>
                                                <option value="OTRO">OTRO</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Fecha de Expedición</label>
                                            <input type="date"  class="form-control form-control-user"  value="{{old('fechaExpedicion')}}" id="fechaExpedicion" name="fechaExpedicion"  placeholder="Numero de Telefono...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="celulars">
                                        <div class="col-md-6">
                                            <label for="">Número Acto</label>
                                            <input type="text"  class="form-control form-control-user" value="{{old('numeroActo')}}" id="numeroActo" name="numeroActo"  placeholder="Núímero de Acto...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Fecha Inicio de Autorización</label>
                                            <input type="date"  class="form-control form-control-user" onchange="fechasAutoExpe()" value="{{old('fechaInicioAutorizacion')}}" id="fechaInicioAutorizacion" name="fechaInicioAutorizacion"  placeholder="Correo Electronico...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="apellido1s">
                                        <div class="col-md-6">
                                            <label for="">Fecha Fin Autorización</label>
                                            <input type="date"  class="form-control form-control-user" onchange="fechaInicioAuFinAu()" value="{{old('fechaFinAutorizacion')}}" id="fechaFinAutorizacion" name="fechaFinAutorizacion"  placeholder="Pagina WEB...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Fecha Revocatoria de Gasto</label>
                                            <input type="date"  class="form-control form-control-user" onchange="fechaRevocatorias()" value="{{old('fechaRevocatoria')}}" id="fechaRevocatoria" name="fechaRevocatoria"  placeholder="Vigencia cdp...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="direccions">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Estado</label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="estado" name="estado" value="1" {{ old('estado')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>ACTIVO</label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="estado" name="estado" value="2" {{ old('estado')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>INACTIVO</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Marque -SI- cuando existe un solo Ordenador del Gasto</label>
                                            <br>
                                            <label class="radio-inline">
                                                <input type="radio"  id="estadoSi" onclick="todos1()" name="todoAbmitos" value="1" {{ old('todoAbmitos')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="estadoNo" onclick="todos2()" name="todoAbmitos" value="2"  {{ old('todoAbmitos')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row" id="todos">
                                        <div class="col-md-4">
                                            <label for="">Código Presupuestal Desde</label>
                                            <input type="text"  class="form-control form-control-user" value="{{old('codigoPresupuestoDesde')}}" id="codigoPresupuestoDesde" name="codigoPresupuestoDesde"  placeholder="Código Presupuestal Desde...">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Código Presupuestal Hasta</label>
                                            <input type="text"  class="form-control form-control-user" value="{{old('codigoPresupuestoHasta')}}" id="codigoPresupuestoHasta" name="codigoPresupuestoHasta"  placeholder="Código Presupuestal Hasta...">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Cuantía Hasta</label>
                                            <input type="text" class="form-control form-control-user" value="{{old('cuantiaHasta')}}" id="cuantiaHasta" name="cuantiaHasta"  placeholder="Cuantía hasta...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Bienes y Servicios</label>
                                            <select  name= "id_ambitoBienesyServicios" id="id_ambitoBienesyServicios" class="form-control custom-select" style="width: 100%; height:36px;" >
                                                <option value="1">[Seleccione uno]</option>
                                                @foreach($ambitoServices as $services)
                                                    <option value="{{$services->id}}" {{ old('id_ambitoBienesyServicios') == $services->id ? 'selected' : '' }} >{{$services->nombreBien}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                &nbsp
                                <div id="bancos" style="display:none;">
                                    <div class="row"  id="">
                                        <div class="col-md-12">
                                            <label for="">Entidad Bancaria</label>
                                            <select  name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="1">[SELECCIONES UNA OPCIÓN]</option>
                                                @foreach($dependencia as $entidad)
                                                    <option value="{{$entidad->id}}" {{ old('entidadBancaria_id') == $entidad->id ? 'selected' : '' }}>{{$entidad->nombre}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Entidad Bancaria</label>
                                            <select  name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="1">[SELECCIONES UNA OPCIÓN]</option>
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
                                            <input type="text"  class="form-control form-control-user" value="{{old('numeroCuenta')}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Estado Actual</label>
                                                <select  name= "estadoCuenta"  id="estadoCuenta" class="select2 form-control-user custom-select" style="width: 100%; height:36px;">
                                                    <option value="{{old('estadoCuenta')}}">{{old('estadoCuenta')}}</option>
                                                    <option value="Registro previo">Registro previo </option>
                                                    <option value="Activa">Activa</option>
                                                    <option value="Inactiva">Inactiva</option>
                                                    <option value="Cancelada">Cancelada</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tipo Cuenta Bancaria</label>
                                                <label class="radio-">
                                                    <input type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"  {{ old('TipocuentaBancaria')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>Ahorros</label>
                                                <label class="radio-">
                                                    <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ old('TipocuentaBancaria')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>Corriente</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                            </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit">AGREGAR</button>
                            </div>
                            &nbsp
                    </form>
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
            $('.select2').select2();
            $('.selectpicker').selectpicker();

        });
    </script>
    <script>
        $(function() {
            $( "#terceros" ).validate({
                rules: {
                    tipoDocumento_id: {
                        required: true,
                    },
                    numeroDocumento : {
                        required: true,
                        digits: true,
                    },
                    nombre1: {
                        required: true,
                    },
                    apellido1: {
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
                    numeroCuenta:{
                        digits: true,
                        maxlength:20,
                    },
                },
                messages: {
                    tipoDocumento_id: {
                        required: "Este campo es Obligatorio",

                    },
                    numeroDocumento: {
                        required: "Este campo es Obligatorio",
                        digits:"Este campo solo revise digitos"

                    },
                    nombre1: {
                        required: "Este campo es Obligatorio",
                    },
                    apellido1: {
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
            document.getElementById('fueSi').style.display ='none';

        }
        function show2() {
            document.getElementById('fueSi').style.display = 'block';
        }

        function show1Bancos(){
            document.getElementById('bancos').style.display ='block';

        }
        function show2Bancos() {
            document.getElementById('bancos').style.display = 'none';
        }

        function todos1(){
            $('#codigoPresupuestoDesde').prop("disabled",true).val=0;
            $('#codigoPresupuestoHasta').prop("disabled",true).val=0;

        }
        function todos2() {
            $('#codigoPresupuestoDesde').prop("disabled",false);
            $('#codigoPresupuestoHasta').prop("disabled",false);
        }
        function fechasAutoExpe() {
            var fe=$('#fechaExpedicion').val();
            var fia=$('#fechaInicioAutorizacion').val();
            
            if (fia<fe){
                alert('Lo siento esta fecha debe ser superior a la Fecha de Expedición')
            }
        }
        function fechaInicioAuFinAu() {
            var fia=$('#fechaInicioAutorizacion').val();
            var ffa=$('#fechaFinAutorizacion').val();

            if (ffa<fia){
                alert('Lo siento esta fecha debe ser superior a la Fecha de Fecha de Inicio de Autorización')
            }
        }
        function fechaRevocatorias() {
            var fia=$('#fechaInicioAutorizacion').val();
            var ffa=$('#fechaFinAutorizacion').val();
            var frg=$('#fechaRevocatoria').val();

            //console.log(fia,ffa,frg)
            if (fia>frg && ffa<frg){
                alert('Lo siento esta fecha debe estar entre el rango de '+ fia + ' y '+ ffa)
            }
        }
    </script>
@endsection
