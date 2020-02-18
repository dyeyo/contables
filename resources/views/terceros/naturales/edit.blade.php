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
                    <strong>Editar Persona Natural N°{{$personaNatural->natural->numeroDocumento}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
            <div class="ibox-title">
                <h5>PERSONAS NATURALES <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
            </div>
            @if ($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-warning">{{ Session::get('message') }}</div>
            @endif
                <div class="card-body">
                    <form class="user"  action="{{route('personaNarutal.update',$personaNatural->id)}}" method="post" id="terceros" name="terceros">
                        {{ method_field('put') }}
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-body">
                                <input type="hidden"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year'),$personaNatural->anio}}" readonly="readonly">
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="id_tipoDocumento">Tipo de Documento</label>
                                            <select  name= "id_tipoDocumento" id="id_tipoDocumento" class="form-control ">
                                                @foreach($tipoDoc as $tipo)
                                                    <option {{ old('id_tipoDocumento', $personaNatural->natural->id_tipoDocumento) == $tipo->id ? 'selected' : '' }} value="{{$tipo->id}}">{{$tipo->nombreDocumento}}</option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="numeroDocumento">Número de Documento</label>
                                            <input type="text"  class="form-control form-control-user" value="{{$personaNatural->natural->numeroDocumento}}" id="numeroDocumento" name="numeroDocumento"  placeholder="Número de Documento...">
                                            {{--<input type="hidden"  id="tipoPersona" name="tipoPersona" value="2">--}}
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Nombre</label>
                                        <input type="text" value="{{old('nombre1',$personaNatural->nombre1)}}"  class="form-control form-control-user" id="nombre1" name="nombre1"  placeholder="Primer Nombre...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Nombre</label>
                                        <input type="text" value="{{old('nombre2', $personaNatural->nombre2) }}" class="form-control form-control-user" id="nombre2" name="nombre2"  placeholder="Segundo Nombre...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="apellido1s">
                                    <div class="col-md-6">
                                        <label for="">Primer Apellido</label>
                                        <input type="text" value="{{old('apellido',$personaNatural->apellido)}}"  class="form-control form-control-user" id="apellido1" name="apellido"  placeholder="Primer Apellido...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Apellido</label>
                                        <input type="text" value="{{old('apellido2',$personaNatural->apellido2)}}"  class="form-control form-control-user" id="apellido2" name="apellido2"  placeholder="Segundo Apellido...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="direccions">
                                    <div class="col-md-6">
                                        <label for="">Dirección</label>
                                        <input type="text" value="{{old('direccion',$personaNatural->direccion)}}"  class="form-control form-control-user" id="direccion" name="direccion"  placeholder="Direccion...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Teléfono</label>
                                        <input type="text" value="{{old('telefono',$personaNatural->telefono)}}"  class="form-control form-control-user" id="telefono" name="telefono"  placeholder="Numero de Telefono...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="celulars">
                                    <div class="col-md-6">
                                        <label for="">Celular</label>
                                        <input type="text" value="{{old('celular',$personaNatural->celular)}}"  class="form-control form-control-user" id="celular" name="celular"  placeholder="Celular...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Correo</label>
                                        <input type="text" value="{{old('correo',$personaNatural->correo)}}"  class="form-control form-control-user" id="correo" name="correo"  placeholder="Correo Electronico...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label for="">Responsable de IVA</label>
                                            <label class="radio-inline">
                                                <input type="radio"  id="responsableIVA" name="responsableIVA" value="SI"  {{ $personaNatural->responsableIVA== 'SI' ? 'checked' : '' }}>SI</label>
                                             <label class="radio-inline">
                                                 <input type="radio"  id="responsableIVA" name="responsableIVA" value="NO"  {{ $personaNatural->responsableIVA== 'NO' ? 'checked' : '' }}>NO</label>
                                         </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Régimen Simple</label>
                                            <label class="radio-inline">
                                                <input type="radio"  id="regimenSimple" name="regimenSimple" value="SI" {{ $personaNatural->regimenSimple== 'SI' ? 'checked' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="regimenSimple" name="regimenSimple" value="NO" {{ $personaNatural->regimenSimple== 'NO' ? 'checked' : '' }}>NO</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Designar Supervisor</label>
                                            <label class="radio-inline">
                                                <input type="radio"  id="designadoSupervisor" name="designadoSupervisor" value="SI"  {{ $personaNatural->natural->designadoSupervisor== 'SI' ? 'checked' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="designadoSupervisor" name="designadoSupervisor"  value="NO" {{ $personaNatural->natural->designadoSupervisor== 'NO' ? 'checked' : '' }}>NO</label>
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="departamento_ids">
                                    <div class="col-md-6">
                                        <label for="">Departamento</label>
                                        <select  name= "idDepartamento" id="idDepartamento" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                            <option value="">[Seleccione un Departamento]</option>
                                            @foreach($departamentos as $departamento)
                                                <option {{ old('idDepartamento', $personaNatural->natural->idDepartamento) == $departamento->id ? 'selected' : '' }} value="{{$departamento->id}}">{{$departamento->nameDepartamento}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Ciudad</label>
                                        <select  name= "ciudad_id" id="ciudad_id" class="select2 form-control custom-select" >
                                            <option value="">[Seleccione una ciudad]</option>
                                            @foreach($ciudades as $ciudad)
                                                <option {{ old('ciudad_id   ', $personaNatural->natural->ciudad_id) == $ciudad->id ? 'selected' : '' }} value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <input type="hidden" value="PN" name="pesonaNatural" id="pesonaNatural">
                                <input type="hidden" value="2" name="tipoPersona" id="tipoPersona">
                                <div class="row" id="idActividads">
                                    <div class="col-md-6">
                                        <label for="">Descriptores CIIU</label>
                                        <select  name= "descritores_id" id="descritores_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="codigoCiiu()">
                                            <option  value="">[Seleccione una Descripcion]</option>
                                            @foreach($descriptoresnCiiu as $descriptores)
                                                <option {{ old('descritores_id', $personaNatural->natural->descritores_id) == $descriptores->id ? 'selected' : '' }}  value="{{$descriptores->id}}">{{$descriptores->actividad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Actividades CIIU</label>
                                        <select  name= "id_actividadesCiiu" id="id_actividadesCiiu" class="select2 form-control custom-select" >
                                            <option value="">[Seleccione una Actividad]</option>
                                            @foreach($actividadesCiiu as $actividad)
                                                <option {{ old('id_actividadesCiiu', $personaNatural->natural->id_actividadesCiiu) == $actividad->id ? 'selected' : '' }}  value="{{$actividad->id}}">{{$actividad->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="id_clases">
                                    <div class="col-md-12">
                                        <label for="">Clase de Persona</label>
                                        <select onChange="ClaseId(this)" name= "id_clase" id="id_clase" class=" form-control custom-select" style="width: 100%; height:36px;" >
                                            @foreach($claseP as $clase)
                                                <option {{ old('id_clase', $personaNatural->natural->id_clase) == $clase->id ? 'selected' : '' }}  value="{{$clase->id}}">{{$clase->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="">
                                    <div class="col-md-6">
                                        <label for="">Dependencia</label>
                                        <select  name= "dependencia_id" id="dependencia_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                            {{--<option value="">[Seleccione una dependencia]</option>--}}
                                            @foreach($dependencias as $dep)
                                                <option {{ old('dependencia_id', $personaNatural->natural->dependencia_id) == $dep->id ? 'selected' : '' }}  value="{{$dep->id}}">{{$dep->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($personaNatural->natural->id_clase==2)
                                        <div class="col-md-6" id="Subclases">
                                            <label for="">Sub Clase</label>
                                            <select  name= "Subclase"  id="Subclase" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="{{$personaNatural->natural->Subclase}}">{{$personaNatural->natural->Subclase}}</option>
                                                <option value="2.02 MISIONAL">MISIONAL</option>
                                                <option value="2.04 DE APOYO">DE APOYO</option>
                                            </select>
                                        </div>
                                        @else
                                        <div class="col-md-6" id="Subclases" style="display:none;">
                                            <label for="">Sub Clase</label>
                                            <select  name= "Subclase"  id="Subclase" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="0">[Seleccione una SubClase]</option>
                                                <option value="2.02 MISIONAL">MISIONAL</option>
                                                <option value="2.04 DE APOYO">DE APOYO</option>
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                &nbsp
                                @if ($personaNatural->natural->entidadBancaria_id == '1')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Información Bancaria</label>
                                            <label class="radio-inline">
                                                <input type="radio"  id="SiInfo"  onclick="show1()" name="banco" value="1"  {{ old('banco')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="NoInfo" onclick="show2()" name="banco" checked value="2" {{ old('banco')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                        </div>
                                    </div>
                                    <div id="bancos" style="display:none;">
                                        <div class="row"  id="">
                                            <div class="col-md-12">
                                                <label for="">Información Bancaria</label>
                                                <select  name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="">[SELECCIONES UNA ENTIDAD]</option>
                                                    @foreach($entidadBancaria as $entidad)
                                                        <option {{ old('entidadBancaria_id', $personaNatural->natural->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}"> {{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row"  id="">
                                            <div class="col-md-6">
                                                <label for="">Número de Cuenta</label>
                                                <input type="text"  class="form-control form-control-user" value="{{$personaNatural->natural->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Estado de Cuenta</label>
                                                    <select  name= "estadoCuenta"  id="estadoCuenta" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                        <option value="{{$personaNatural->natural->estadoCuenta}}"  >{{$personaNatural->natural->estadoCuenta}}</option>
                                                        <option value="Inválida">Inválida</option>
                                                        <option value="Activa">Activa</option>
                                                        <option value="Cancelada">Cancelada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row"  id="">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tipo de Cuenta Bancaria</label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $personaNatural->natural->TipocuentaBancaria== '1' ? 'checked' : '' }}>Ahorros</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $personaNatural->natural->TipocuentaBancaria== '2' ? 'checked' : '' }}>Corriente</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div id="bancos" >
                                        <div class="row"  id="">
                                            <div class="col-md-12">
                                                <label for="">Información Bancaria</label>
                                                <select  name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    @foreach($entidadBancaria as $entidad)
                                                        <option {{ old('entidadBancaria_id', $personaNatural->natural->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}"> {{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row"  id="">
                                            <div class="col-md-6">
                                                <label for="">Número de Cuenta</label>
                                                <input type="text"  class="form-control form-control-user" value="{{$personaNatural->natural->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Estado de Cuenta</label>
                                                    <select  name= "estadoCuenta"  id="estadoCuenta" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                        <option value="{{$personaNatural->natural->estadoCuenta}}"  >{{$personaNatural->natural->estadoCuenta}}</option>
                                                        <option value="Activa">Activa</option>
                                                        <option value="Inválida">Inválida</option>
                                                        <option value="Cancelada">Cancelada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row"  id="">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tipo de Cuenta Bancaria</label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $personaNatural->natural->TipocuentaBancaria== '1' ? 'checked' : '' }}>Ahorros</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $personaNatural->natural->TipocuentaBancaria== '2' ? 'checked' : '' }}>Corriente</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                            &nbsp
                        </div>
                    </form>
                    @can('personaNarutal.destroy')
                    <form method="POST" id="deleteTipoDoc" action="{{route('personaNarutal.destroy',$personaNatural->id)}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger " style="width: 20%;margin-left: 80%;">ELIMINAR</button>
                    </form>
                    @endcan
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
            $('#id_clase').change(function(){
                if($('#id_clase').val() == 2) {
                    $('#Subclases').show();
                } else {
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
                responsableIVA:{
                    required:true,
                },
                regimenSimple:{
                    required:true,
                },
                autoRetenedor:{
                    required:true,
                },
                numeroCuenta:{
                    digits: true,
                    maxlength:20,
                },

            },
            messages: {
                id_tipoDocumento: {
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