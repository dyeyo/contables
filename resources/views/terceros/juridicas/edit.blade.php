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
                    <a href="{{route('personaJuridica.index')}}">Personas Juridicas</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Persona Juridica N°{{$personajuridica->juridica->nit}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>PERSONAS JURIDICAS <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
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
                    <form class="user"  action="{{route('personaJuridica.update',$personajuridica->id)}}" method="post" id="terceros" name="terceros">
                        {{ method_field('put') }}
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-body">
                                <input type="hidden"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year'),$personajuridica->anio}}" readonly="readonly">
                                <div class="row" id="nits">
                                    <div class="col-md-6">
                                        <label for="">NIT</label>
                                        <input type="text"  class="form-control form-control-user" id="nit" name="nit" onchange="calcular()" value="{{ $personajuridica->juridica->nit }}" placeholder="NIT...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Digitó de Verificación</label>
                                        <input type="text"  class="form-control form-control-user" id="dv"  readonly="readonly" name="dv" value="{{ $personajuridica->juridica->dv }}"  placeholder="DV...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="raz_socials">
                                    <div class="col-md-6">
                                        <label for="">Razón Social</label>
                                        <input type="text" value="{{$personajuridica->raz_social}}"  class="form-control form-control-user" id="raz_social" name="raz_social"  placeholder="RAZON SOCIAL O NOMBRE DE LA EMPRESA...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nombre Comercial</label>
                                        <input type="text" value="{{$personajuridica->juridica->nomComercial}}"  class="form-control form-control-user"  id="nomComercial" name="nomComercial"  placeholder="NOMBRE COMERCIAL...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="id_regimenTributario">
                                    <div class="col-md-6">
                                        <label for="">Régimen Tributario</label>
                                        <select  name= "id_regimenTributario" id="id_regimenTributario" class="form-control ">
                                            <option value="">[Seleccione un Regimen]</option>
                                            @foreach($regimenTribuario as $regimen)
                                                <option {{ old('id_regimenTributario', $personajuridica->juridica->id_regimenTributario) == $regimen->id ? 'selected' : '' }} value="{{$regimen->id}}">{{$regimen->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row" >
                                            <div class="col-md-4">
                                                    <label for="">Responsable de IVA</label>
                                                <div class="form-group" >
                                                    <label class="radio-inline">
                                                        <input type="radio"  id="responsableIVA" name="responsableIVA" value="SI" {{ $personajuridica->responsableIVA== 'SI' ? 'checked' : '' }} {{ old('responsableIVA')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="responsableIVA" name="responsableIVA" value="NO" {{ $personajuridica->responsableIVA== 'NO' ? 'checked' : '' }} {{ old('responsableIVA')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <label for="">Regimen Simple</label>
                                                <div class="form-group">
                                                    <label class="radio-inline">
                                                        <input type="radio"  id="regimenSimple" name="regimenSimple" value="SI" {{ $personajuridica->regimenSimple== 'SI' ? 'checked' : '' }} {{ old('regimenSimple')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="regimenSimple" name="regimenSimple" value="NO" {{ $personajuridica->regimenSimple== 'NO' ? 'checked' : '' }}  {{ old('regimenSimple')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <label for="">Auto Retenedor</label>
                                                <div class="form-group">
                                                    <label class="radio-inline">
                                                        <input type="radio"  id="autoRetenedor" name="autoRetenedor" value="SI" {{ $personajuridica->juridica->autoRetenedor== 'SI' ? 'checked' : '' }} {{ old('autoRetenedor')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="autoRetenedor" name="autoRetenedor" value="NO" {{ $personajuridica->juridica->autoRetenedor== 'NO' ? 'checked' : '' }} {{ old('autoRetenedor')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                                </div>
                                            </div>
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
                                                <option {{ old('idDepartamento', $personajuridica->juridica->idDepartamento) == $departamento->id ? 'selected' : '' }} value="{{$departamento->id}}">{{$departamento->nameDepartamento}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Ciudad</label>
                                        <select  name= "ciudad_id" id="ciudad_id" class="select2 form-control custom-select" >
                                            <option value="">[Seleccione una ciudad]</option>
                                            @foreach($ciudades as $ciudad)
                                                <option {{ old('ciudad_id   ', $personajuridica->juridica->ciudad_id) == $ciudad->id ? 'selected' : '' }} value="{{$ciudad->id}}">{{$ciudad->name}}</option>
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
                                            <option  value="">[Seleccione una Descripcion]</option>
                                            @foreach($descriptoresnCiiu as $descriptores)
                                                <option {{ old('descritores_id', $personajuridica->juridica->descritores_id) == $descriptores->id ? 'selected' : '' }}  value="{{$descriptores->id}}">{{$descriptores->actividad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Actividades CIIU</label>
                                        <select  name= "id_actividadesCiiu" id="id_actividadesCiiu" class="select2 form-control custom-select" >
                                            <option value="">[Seleccione una Actividad]</option>
                                            @foreach($actividadesCiiu as $actividad)
                                                <option {{ old('id_actividadesCiiu', $personajuridica->juridica->id_actividadesCiiu) == $actividad->id ? 'selected' : '' }}  value="{{$actividad->id}}">{{$actividad->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="nombre1_rls">
                                    <div class="col-md-6">
                                        <label for="">Primer Nombre Representante Legal</label>
                                        <input type="text" value="{{old('nombre1',$personajuridica->nombre1)}}"  class="form-control form-control-user" id="nombre1" name="nombre1"  placeholder="PRIMER NOMBRE DEL REPRESENTANTE LEGAL...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Nombre Representante Legal</label>
                                        <input type="text" value="{{old('nombre2',$personajuridica->nombre2)}}"  class="form-control form-control-user"  id="nombre2" name="nombre2"  placeholder="SEGUNDO NOMBRE DEL REPRESENTANTE LEGAL...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="apellido1_rls">
                                    <div class="col-md-6">
                                        <label for="">Primer Apellido Representante Legal</label>
                                        <input type="text" value="{{old('apellido',$personajuridica->apellido)}}"  class="form-control form-control-user" id="apellido" name="apellido"  placeholder="PRIMER APELLIDO DEL REPRESENTANTE LEGAL...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Segundo Apellido Representante Legal</label>
                                        <input type="text" value="{{old('apellido2',$personajuridica->apellido2)}}"  class="form-control form-control-user"  id="apellido2" name="apellido2"  placeholder="SEGUNDO APELLIDO DEL REPRESENTANTE LEGAL...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="direccion_rls">
                                    <div class="col-md-6">
                                        <label for="">Dirección Representante Legal</label>
                                        <input type="text" value="{{old('direccion',$personajuridica->direccion)}}"  class="form-control form-control-user" id="direccion" name="direccion"  placeholder="DIRECCION DEL REPRESENTANTE LEGAL...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Teléfono Representante Legal</label>
                                        <input type="text" value="{{old('telefono',$personajuridica->telefono)}}"  class="form-control form-control-user"  id="telefono" name="telefono"  placeholder="TELEFONO DEL REPRESENTANTE LEGAL...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="correo_rls">
                                    <div class="col-md-6">
                                        <label for="">Correo Representante Legal</label>
                                        <input type="text" value="{{old('correo',$personajuridica->correo)}}"  class="form-control form-control-user" id="correo" name="correo"  placeholder="CORREO DEL REPRESENTANTE LEGAL...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Celular Representante Legal</label>
                                        <input type="text" value="{{old('celular',$personajuridica->celular)}}"  class="form-control form-control-user"  id="celular" name="celular"  placeholder="CELULAR DEL REPRESENTANTE LEGAL...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sector Financiero - Banco</label>
                                        <label class="radio-inline">
                                            <input type="radio"  id="banco" name="banco" value="SI" {{ $personajuridica->juridica->banco== 'SI' ? 'checked' : '' }} {{ old('banco')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="banco" name="banco" value="NO" {{ $personajuridica->juridica->banco== 'NO' ? 'checked' : '' }} {{ old('banco')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                    </div>
                                </div>
                                @if ($personajuridica->juridica->entidadBancaria_id == '1')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Información Bancaria</label>
                                            <label class="radio-inline">
                                                <input type="radio"  id="SiInfo"  onclick="show1()" name="bancos" value="SI"  {{ old('banco')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="NoInfo" onclick="show2()" name="bancos" checked value="NO" {{ old('banco')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                        </div>
                                    </div>
                                    <div id="bancos" style="display:none;">
                                        <div class="row"  id="">
                                            <div class="col-md-12">
                                                <label for="">Información Bancaria</label>
                                                <select  name= "entidadBancaria_id" id="entidadBancaria_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="1">[SELECCIONES UNA ENTIDAD]</option>
                                                    @foreach($entidadBancaria as $entidad)
                                                        <option {{ old('entidadBancaria_id', $personajuridica->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}"> {{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row"  id="">
                                            <div class="col-md-6">
                                                <label for="">Entidad Bancaria</label>
                                                <input type="text"  class="form-control form-control-user" value="{{$personajuridica->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Estado de Cuenta</label>
                                                    <select  name= "estadoCuenta"  id="estadoCuenta" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                        <option value="{{$personajuridica->estadoCuenta}}"  >{{$personajuridica->estadoCuenta}}</option>
                                                        <option value="Registro previo">Registro previo </option>
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
                                                        <input type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $personajuridica->TipocuentaBancaria== '1' ? 'checked' : '' }}>Ahorros</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $personajuridica->TipocuentaBancaria== '2' ? 'checked' : '' }}>Corriente</label>
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
                                                        <option {{ old('entidadBancaria_id', $personajuridica->juridica->entidadBancaria_id) == $entidad->id ? 'selected' : '' }} value="{{$entidad->id}}"> {{$entidad->CodigoSuperbancaria}} {{$entidad->DenominacionSocialEntidad}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        &nbsp
                                        <div class="row"  id="">
                                            <div class="col-md-6">
                                                <label for="">Entidad Bancaria</label>
                                                <input type="text"  class="form-control form-control-user" value="{{$personajuridica->juridica->numeroCuenta}}" id="numeroCuenta" name="numeroCuenta"  placeholder="Número de Cuenta...">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Estado de Cuenta</label>
                                                    <select  name= "estadoCuenta"  id="estadoCuenta" class=" form-control custom-select" style="width: 100%; height:36px;">
                                                        <option value="{{$personajuridica->juridica->estadoCuenta}}"  >{{$personajuridica->juridica->estadoCuenta}}</option>
                                                        <option value="Registro previo">Registro previo </option>
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
                                                        <input type="radio"  id="TipocuentaBancaria"  name="TipocuentaBancaria" value="1"{{ $personajuridica->juridica->TipocuentaBancaria== '1' ? 'checked' : '' }}>Ahorros</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" id="TipocuentaBancaria" name="TipocuentaBancaria"  value="2" {{ $personajuridica->juridica->TipocuentaBancaria== '2' ? 'checked' : '' }}>Corriente</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                                &nbsp
                            </div>
                        </div>
                    </form>
                    @can('personaJuridica.destroy')
                        <form method="POST" id="deleteTipoDoc"
                              action="{{route('personaJuridica.destroy',$personajuridica->id)}}">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger " style="width: 20%;margin-left: 80%;">ELIMINAR</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
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
                numeroCuenta:{
                    digits: true,
                    maxlength:20,
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
<script>
    function  calcularDigitoVerificacion ( nit )  {
        var vpri,
            x,
            y,
            z;

        // Se limpia el Nit
        // nit = nit.replace ( /\s/g, "" ) ; // Espacios
        // nit = nit.replace ( /,/g,  "" ) ; // Comas
        // nit = nit.replace ( /\./g, "" ) ; // Puntos
        // nit = nit.replace ( /-/g,  "" ) ; // Guiones

        // Se valida el nit
        if  ( isNaN ( nit ) )  {
            console.log ("El nit/cédula  no es válido(a).") ;
            return "" ;
        };

        // Procedimiento
        vpri = new Array(16) ;
        z = nit.length ;

        vpri[1]  =  3 ;
        vpri[2]  =  7 ;
        vpri[3]  = 13 ;
        vpri[4]  = 17 ;
        vpri[5]  = 19 ;
        vpri[6]  = 23 ;
        vpri[7]  = 29 ;
        vpri[8]  = 37 ;
        vpri[9]  = 41 ;
        vpri[10] = 43 ;
        vpri[11] = 47 ;
        vpri[12] = 53 ;
        vpri[13] = 59 ;
        vpri[14] = 67 ;
        vpri[15] = 71 ;

        x = 0 ;
        y = 0 ;
        for  ( var i = 0; i < z; i++ )  {
            y = ( nit.substr (i, 1 ) ) ;
            console.log ( y + "x" + vpri[z-i] + ":" ) ;

            x += ( y * vpri [z-i] ) ;
            console.log ( x ) ;
        }

        y = x % 11 ;
        console.log ( y ) ;

        return ( y > 1 ) ? 11 - y : y ;
    }
</script>
<script !src="">
    function show1(){
        document.getElementById('bancos').style.display ='block';

    }
    function show2() {
        document.getElementById('bancos').style.display = 'none';
    }
</script>