@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="user"  action="{{route('empresa.store')}}" method="post" id="terceros" enctype="multipart/form-data" name="terceros">
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">CREACIÓN DE EMPRESA</h6>
                            </div>
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
                            <div class="card-body">
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <label for="">NIT</label>
                                        <input type="text"  class="form-control form-control-user" id="nit" name="nit" onchange="calcular()" value="{{ old('nit') }}" placeholder="NIT...">
                                        {{--<button type="button" class="btn btn-primary mb-2" id="calcular" onclick="calcular()">Calcular Dígito de Verificación</button>--}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Dígito de Verificación</label>
                                        <input type="text"  class="form-control form-control-user" id="dv"  readonly="readonly" name="dig_verificacion" {{ old('dig_verificacion') }}  placeholder="DV...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-6">
                                        <label for=""> Nombre</label>
                                        <input type="text"  class="form-control form-control-user" value="{{old('nombre')}}" id="nombre" name="nombre"  placeholder="Nombre...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Código CGN</label>
                                        <input type="text"  class="form-control form-control-user" value="{{old('codCgn')}}" id="codCgn" name="codCgn"  placeholder="Código CGN...">
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
                                <div class="row"  id="apellido1s">
                                    <div class="col-md-6">
                                        <label for="">Página WEB</label>
                                        <input type="text"  class="form-control form-control-user" value="{{old('url')}}" id="url" name="url"  placeholder="Página WEB...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Vigencia CDP</label>
                                        <input type="text"  class="form-control form-control-user" value="{{old('vigencia_cdp')}}" id="vigencia_cdp" name="vigencia_cdp"  placeholder="Vigencia cdp...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Lema</label>
                                        <textarea name="lema" id="lema" style="resize: none" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Marco Normativo</label>
                                        <select name="marco_normativo" id="marco_normativo"  class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                            <option value="ENTIDADES DEL GOBIERNO">ENTIDADES DEL GOBIERNO</option>
                                            <option value="EMPRESA PUBLICA">EMPRESA PUBLICA</option>
                                            <option value="EMPRESA PRIVADA">EMPRESA PRIVADA</option>
                                        </select>
                                     </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Logo de la República</label>
                                        <div class="form-group" >
                                            <input type="file" name="logo_republica" id="logo_republica">
                                         </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Logo del Municipio</label>
                                        <div class="form-group" >
                                            <input type="file" name="logo_municipio" id="logo_municipio">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Logo Plan de Desarrollo</label>
                                        <div class="form-group" >
                                            <input type="file" name="logo_plandesarrollo" id="logo_plandesarrollo">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="departamento_ids">
                                    <div class="col-md-6">
                                        <label for="">Departamento</label>
                                        <select  name= "id_departamento" id="idDepartamento" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                            <option value="">[Seleccione un Departamento]</option>
                                            @foreach($departamentos as $departamento)
                                                <option value="{{$departamento->id}}" {{ old('depatamento_id') == $departamento->id ? 'selected' : '' }} >{{$departamento->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Ciudad</label>
                                        <select  name= "id_ciudad" id="ciudad_id" class="select2 form-control custom-select" >
                                            <option value="" >[Seleccione una Ciudad]</option>
                                            @foreach($ciudades as $ciu)
                                                <option value="{{$ciu->id}}" {{ old('ciudad_id') == $ciu->id ? 'selected' : '' }} >{{$ciu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="idActividads">
                                    <div class="col-md-6">
                                        <label for="">Número Ingreso Inicial</label>
                                        <input type="text" class="form-control form-control-user" value="{{old('num_ingresoinicial')}}" id="num_ingresoinicial" name="num_ingresoinicial"  placeholder="Número Ingreso Inicial...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Número Ingreso Actual</label>
                                        <input type="text" class="form-control form-control-user" value="{{old('num_ingresoactual')}}" id="num_ingresoactual" name="num_ingresoactual"  placeholder="Número Ingreso Actual...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Representante Legal Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreRepresentanteLegal')}}" name="nombreRepresentanteLegal" id="nombRepresentanteLegal">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Representante Legal</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaRepresentanteLegal')}}" name="cedulaRepresentanteLegal" id="ceduRepresentanteLegal">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Representante Legal</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTpRepresentanteLegal')}}" name="noTpRepresentanteLegal" id="noRepresentanteLegal">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Contador Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreContador')}}" name="nombreContador" id="nombreContador">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Contador</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaContador')}}" name="cedulaContador" id="cedulaContador">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Contador</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTpContador')}}" name="noTpContador" id="noTpContador">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Revisor Fiscal Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreRevisorFiscal')}}" name="nombreRevisorFiscal" id="nombreRevisorFiscal">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Revisor Fiscal</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaRevisorFiscal')}}" name="cedulaRevisorFiscal" id="cedulaRevisorFiscal">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Revisor Fiscal</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTPRevisorFiscal')}}" name="noTPRevisorFiscal" id="noTPRevisorFiscal">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Control Interno Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreControlInterno')}}" name="nombreControlInterno" id="nombreControlInterno">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Control Interno</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaControlInterno')}}" name="cedulaControlInterno" id="cedulaControlInterno">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Control Interno</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTPControlInterno')}}" name="noTPControlInterno" id="noTPControlInterno">
                                        </div>
                                    </div>

                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Jefe de Presupuesto Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('jefePresupuesto')}}" name="jefePresupuesto" id="jefePresupuesto">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Jefe de Presupuesto</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaJefePresupuesto')}}" name="cedulaJefePresupuesto" id="cedulaJefePresupuesto">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Jefe de Presupuesto</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTPJefePresupuesto')}}" name="noTPJefePresupuesto" id="noTPJefePresupuesto">
                                        </div>
                                    </div>

                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label for="">Otro Resposnable</label>
                                        <select  name= "otroResponsable" id="otroResponsable" class="select2 form-control custom-select" >
                                            <option value="" >[Seleccione un responsable]</option>
                                                <option value="TESORERO(A)">TESORERO(A)</option>
                                                <option value="SUB GER. AVO Y FRO.">SUB GER. AVO Y FRO.</option>
                                                <option value="PAGADOR(A)">PAGADOR(A)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Nombre Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreOtroResponsable')}}" name="nombreOtroResponsable" id="nombreOtroResponsable">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Cedula</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaJefePresupuesto')}}" name="cedulaJefePresupuesto" id="cedulaJefePresupuesto">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">N° TP </label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTPOtroResponsable')}}" name="noTPOtroResponsable" id="noTPOtroResponsable">
                                        </div>
                                    </div>

                                </div>
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">AGREGAR</button>
                            </div>
                    </form>
                </div>
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
                nit: {
                    required: true,
                },
                nombre : {
                    required: true,
                },
                codCgn: {
                    required: true,
                },
                direccion: {
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
                vigencia_cdp:{
                    required: true,
                    digits: true,
                    maxlength:365,
                    minlength:1
                },
                marco_normativo:{
                    required: true,
                },
                id_departamento:{
                    required:true,
                },
                id_ciudad:{
                    required:true,
                },
                num_ingresoinicial:{
                    required:true,
                },
                num_ingresoactual:{
                    required:true,
                },
            },
            messages: {
                nit: {
                    required: "Este campo es Obligatorio",
                },
                nombre: {
                    required: "Este campo es Obligatorio",
                },
                codCgn: {
                    required: "Este campo es Obligatorio",
                },
                direccion: {
                    required: "Este campo es Obligatorio",
                },
                telefono:{
                    digits:"Este campo solo revise digitos",
                },
                celular:{
                    digits:"Este campo solo revise digitos",
                },
                correo:{
                    digits:"Este campo solo revise digitos",
                    email:"Este campo debe ser un correo electronico"
                },
                vigencia_cdp: {
                    required: "Este campo es Obligatorio",
                    digits:"Este campo solo revise digitos",
                    maxlength:"El limite es de 365",
                    minlength:"El limite es de 1",
                },
                marco_normativo: {
                    required: "Este campo es Obligatorio",
                },
                id_departamento: {
                    required: "Este campo es Obligatorio",
                },
                id_ciudad: {
                    required: "Este campo es Obligatorio",
                },
                num_ingresoinicial: {
                    required: "Este campo es Obligatorio",
                },
                num_ingresoactual: {
                    required: "Debe marcar una de las opciones",
                },

            }
        });

    });
</script>
