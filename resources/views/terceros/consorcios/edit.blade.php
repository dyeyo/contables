@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Consorcios y Uniones Temporales</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{route('consorciados.index')}}">Consorcios y Uniones Temporales</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Consorcio N°{{$consorcio->nit}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>CONSORCIOS Y UNIONES TEMPORALES <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                <div class="card-body">
                    <form class="user" onkeypress="return anular(event)" action="{{route('consorciados.update',$consorcio->id)}}" autocomplete="off" method="post" id="terceros" name="terceros">
                        {{csrf_field()}}
                        {{ method_field('put') }}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label for="">Año</label>
                                        <input type="text"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year')}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="row" id="nits">
                                    <div class="col-md-6">
                                        <label for="">NIT</label>
                                        <input type="hidden"  id="tipoPersona" name="tipoPersona" value="2">
                                        <input type="text"  class="form-control form-control-user" id="nit" name="nit" onchange="calcular()" value="{{ old('nit').$consorcio->nit }}" placeholder="NIT...">
                                        {{--<button type="button" class="btn btn-primary mb-2" id="calcular" onclick="calcular()">Calcular Dígito de Verificación</button>--}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Digitó de Verificación</label>
                                        <input type="text"  class="form-control form-control-user" id="dv"  readonly="readonly" name="dv" value="{{ old('dv'). $consorcio->dv }}"  placeholder="DV...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="raz_socials">
                                    <div class="col-md-6">
                                        <label for="">Razón Social</label>
                                        <input type="text"  class="form-control form-control-user" id="raz_social" name="raz_social" value="{{ old('raz_social').$consorcio->raz_social }}" placeholder="RAZON SOCIAL O NOMBRE DE LA EMPRESA...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nombre Comercial</label>
                                        <input type="text"  class="form-control form-control-user"  id="nomComercial" name="nomComercial" value="{{ old('nomComercial').$consorcio->nomComercial }}" placeholder="NOMBRE COMERCIAL...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="id_regimenTributario">
                                    <div class="col-md-12">
                                        <label for="">Régimen Tributario</label>
                                        <select  name= "id_regimenTributario" id="id_regimenTributario" class="form-control ">
                                            <option value="">[Seleccione un Régimen]</option>
                                            @foreach($regimenTribuario as $regimen)
                                                <option {{ old('id_regimenTributario', $consorcio->id_regimenTributario) == $regimen->id ? 'selected' : '' }} value="{{$regimen->id}}">{{$regimen->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Departamento</label>
                                        <select  name= "idDepartamento" id="idDepartamento" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                            @foreach($departamentos as $departamento)
                                                <option {{ old('idDepartamento', $consorcio->idDepartamento) == $departamento->id ? 'selected' : '' }} value="{{$departamento->id}}">{{$departamento->nameDepartamento}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Ciudad</label>
                                        <select  name= "ciudad_id" id="ciudad_id" class="select2 form-control custom-select" >
                                            @foreach($ciudades as $ciudad)
                                                <option {{ old('ciudad_id', $consorcio->ciudad_id) == $ciudad->id ? 'selected' : '' }} value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            &nbsp
                            {{--<input type="hidden" value="1" name="tipoPersona" id="tipoPersona">--}}
                            <div class="row" id="idActividads">
                                <div class="col-md-6">
                                    <label for="">Descriptores CIIU</label>
                                    <select  name= "descritores_id" id="descritores_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="codigoCiiu()">
                                        @foreach($descriptoresnCiiu as $descriptores)
                                            <option {{ old('descritores_id', $consorcio->descritores_id) == $descriptores->id ? 'selected' : '' }}  value="{{$descriptores->id}}">{{$descriptores->actividad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Actividades CIIU</label>
                                    <select  name= "id_actividadesCiiu" id="id_actividadesCiiu" class="select2 form-control custom-select" >
                                        @foreach($actividadesCiiu as $actividad)
                                            <option {{ old('id_actividadesCiiu', $consorcio->id_actividadesCiiu) == $actividad->id ? 'selected' : '' }}  value="{{$actividad->id}}">{{$actividad->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            &nbsp
                            <div class="row" id="nombre1_rls">
                                <div class="col-md-6">
                                    <label for="">Primer Nombre Representante Legal</label>
                                    <input type="text" value="{{old('nombre1',$consorcio->nombre1)}}"  class="form-control form-control-user" id="nombre1" name="nombre1"  placeholder="PRIMER NOMBRE DEL REPRESENTANTE LEGAL...">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Segundo Nombre Representante Legal</label>
                                    <input type="text" value="{{old('nombre2',$consorcio->nombre2)}}"  class="form-control form-control-user"  id="nombre2" name="nombre2"  placeholder="SEGUNDO NOMBRE DEL REPRESENTANTE LEGAL...">
                                </div>
                            </div>
                            &nbsp
                            <div class="row" id="apellido1_rls">
                                <div class="col-md-6">
                                    <label for="">Primer Apellido Representante Legal</label>
                                    <input type="text" value="{{old('apellido',$consorcio->apellido)}}"  class="form-control form-control-user" id="apellido" name="apellido"  placeholder="PRIMER APELLIDO DEL REPRESENTANTE LEGAL...">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Segundo Apellido Representante Legal</label>
                                    <input type="text" value="{{old('apellido2',$consorcio->apellido2)}}"  class="form-control form-control-user"  id="apellido2" name="apellido2"  placeholder="SEGUNDO APELLIDO DEL REPRESENTANTE LEGAL...">
                                </div>
                            </div>
                            &nbsp
                            <div class="row" id="direccion_rls">
                                <div class="col-md-6">
                                    <label for="">Dirección Representante Legal</label>
                                    <input type="text" value="{{old('direccion',$consorcio->direccion)}}"  class="form-control form-control-user" id="direccion" name="direccion"  placeholder="DIRECCION DEL REPRESENTANTE LEGAL...">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Teléfono Representante Legal</label>
                                    <input type="text" value="{{old('telefono',$consorcio->telefono)}}"  class="form-control form-control-user"  id="telefono" name="telefono"  placeholder="TELEFONO DEL REPRESENTANTE LEGAL...">
                                </div>
                            </div>
                            &nbsp
                            <div class="row" id="correo_rls">
                                <div class="col-md-6">
                                    <label for="">Correo Representante Legal</label>
                                    <input type="text" value="{{old('correo',$consorcio->correo)}}"  class="form-control form-control-user" id="correo" name="correo"  placeholder="CORREO DEL REPRESENTANTE LEGAL...">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Celular Representante Legal</label>
                                    <input type="text" value="{{old('celular',$consorcio->celular)}}"  class="form-control form-control-user"  id="celular" name="celular"  placeholder="CELULAR DEL REPRESENTANTE LEGAL...">
                                </div>
                            </div>
                            &nbsp
                            <div class="row" >
                                <div class="col-md-4">
                                    <label for="">Responsable de IVA</label>
                                    <div class="form-group" >
                                        <label class="radio-inline">
                                            <input type="radio"  id="responsableIVA" name="responsableIVA" value="1" {{ $consorcio->responsableIVA== '1' ? 'checked' : '' }} {{ old('responsableIVA')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="responsableIVA" name="responsableIVA" value="2" {{ $consorcio->responsableIVA== '2' ? 'checked' : '' }} {{ old('responsableIVA')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Regimen Simple</label>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <input type="radio"  id="regimenSimple" name="regimenSimple" value="1" {{ $consorcio->regimenSimple== '1' ? 'checked' : '' }} {{ old('regimenSimple')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="regimenSimple" name="regimenSimple" value="2" {{ $consorcio->regimenSimple== '2' ? 'checked' : '' }}  {{ old('regimenSimple')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Auto Retenedor</label>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <input type="radio"  id="autoRetenedor" name="autoRetenedor" value="1" {{ $consorcio->autoRetenedor== '1' ? 'checked' : '' }} {{ old('autoRetenedor')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="autoRetenedor" name="autoRetenedor" value="2" {{ $consorcio->autoRetenedor== '2' ? 'checked' : '' }} {{ old('autoRetenedor')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                    </div>
                                </div>
                            </div>
                            &nbsp
                            @if ($consorcio->entidadBancaria_id == '')
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
                                                    <option {{ old('entidadBancaria_id', $consorcio->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}"> {{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="">
                                        <div class="col-md-6">
                                            <label for="">Número de Cuenta</label>
                                            <input type="text"  class="form-control form-control-user" value="{{$consorcio->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Estado de Cuenta</label>
                                                <select  name= "estadoCuenta"  id="estadoCuenta" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="{{$consorcio->estadoCuenta}}"  >{{$consorcio->estadoCuenta}}</option>
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
                                                <label for="">Tipo de Cuenta Bancaria</label>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $consorcio->TipocuentaBancaria== '1' ? 'checked' : '' }}>Ahorros</label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $consorcio->TipocuentaBancaria== '2' ? 'checked' : '' }}>Corriente</label>
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
                                                    <option {{ old('entidadBancaria_id', $consorcio->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}"> {{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                                    $consorcio->juridica                  @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="">
                                        <div class="col-md-6">
                                            <label for="">Número de Cuenta</label>
                                            <input type="text"  class="form-control form-control-user" value="{{$consorcio->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Estado de Cuenta</label>
                                                <select  name= "estadoCuenta"  id="estadoCuenta" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="{{$consorcio->estadoCuenta}}"  >{{$consorcio->estadoCuenta}}</option>
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
                                                <label for="">Tipo de Cuenta Bancaria</label>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $consorcio->TipocuentaBancaria== '1' ? 'checked' : '' }}>Ahorros</label>
                                                <label class="radio-inline">
                                                    <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $consorcio->TipocuentaBancaria== '2' ? 'checked' : '' }}>Corriente</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            &nbsp
                            <div class="row" id="perNaturales">
                                <div class="col-md-12">
                                    <div class="form-group" >
                                        <label for="">Terceros que Conformaran la Unión</label>
                                        <select  name= "personaNatural" id="personaNatural" class="id_personasNaturales form-control select2" onchange="agregarVehicle()">
                                            <option>SELECCIONA UN TIPO DE PERSONA</option>
                                            @foreach($personas as $persona)
                                                <option value="{{$persona->id}}">{{$persona->nombre1}} -- {{ $persona->juridica_id == true ? 'juridica' : 'Natural' }}</option>
                                            @endforeach
                                        </select>
                                        <code>Recuerda que la suma de los pocentaje debe ser igual a 100</code>
                                    </div>
                                </div>
                            </div>
                            <div class="row"  id="numeroDocumentos">
                                <div class="col-md-12">
                                    <table id="TablaPro" class="table">
                                        <thead>
                                        <tr>
                                            <th>Terceros</th>
                                            <th>Porcentaje</th>
                                            <th>Remover</th>
                                        </tr>
                                        </thead>
                                        <tbody id="ProSelected"><!--Ingreso un id al tbody-->
                                        <tr class="active"></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            &nbsp
                            <button id="btnEnviar"  class="btn btn-primary btn-user btn-block" type="submit">EDTIAR</button>
                        </div>
                        </div>
                    </form>
                    <div class="row"  id="">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    Consorcios
                                </div>
                                <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Razon Social </th>
                                        <th>Porcentaje</th>
                                        <th>Editar Porcentaje</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </thead>
                                    @foreach($consorcio->consorcios as $item)
                                        <tbody>
                                        <tr>
                                            <th style="width: 10%;">
                                                {{$item->persona()->pluck('raz_social')->implode(', ') }}
                                            </th>
                                            <th>{{$item->porcentaje}}</th>

                                            <th>
                                                <form method="POST" id="deleteTipoDoc" action="{{route('consorciados.editPorcetaje',$item->id)}}">
                                                    {{csrf_field()}}
                                                    {{ method_field('put') }}
                                                    <input type="text"  name="porcentaje" id="porcentaje" value="{{$item->porcentaje}}">
                                                    <button type="submit"  class="btn btn-circle btn-sm btn-warning" id="editar"><i class="fa fa-edit"></i></button>
                                                </form>
                                            </th>
                                            <th>
                                                <form method="POST" id="deleteTipoDoc" action="{{route('consorciados.destroy',$item->id)}}">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-circle btn-sm btn-danger" ><i class="fa fa-times"></i></button>
                                                </form>
                                            </th>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                    @can('consorciados.destroyEmpresa')
                                        <form method="POST" id="deleteTipoDoc"
                                              action="{{route('consorciados.destroyEmpresa',$consorcio->id)}}">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger " style="width: 20%;margin-left: 80%;">ELIMINAR TODO</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('js/consorciosEditar.js')}}"></script>
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

<script !src="">
    $(function() {
        $( "#terceros" ).validate({
            rules: {
                nit: {
                    required: true,
                    digits: true,
                    maxlength:20,
                    minLength:5,
                },
                raz_social : {
                    required: true,
                },
                correo_rl:{
                    email: true,
                },
                celular_rl:{
                    digits: true,
                },
                numeroCuenta:{
                    digits: true,
                    maxlength:20,
                },

            },
            messages: {
                nit: {
                    required: "Este campo es Obligatorio",
                    digits:"Este campo solo revise digitos",
                    maxlength:"Este campo debe tener maximo 20 numeros",
                    minLength:"Este campo debe tener minimo 5 numeros",
                },
                raz_social: {
                    required: "Este campo es Obligatorio",
                },
                correo_rl:{
                    email: "El formato de correo electrónico no es valido",
                },
                celular_rl:{
                    required: "Este campo es Obligatorio",
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
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('#total').on('change',function () {
            console.log('cambio');
        });

    });
</script>

