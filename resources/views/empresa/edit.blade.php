@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="user"  action="{{route('empresa.update',$empresa->id)}}" method="post" id="terceros" enctype="multipart/form-data" name="terceros">
                        {{csrf_field()}}
                        {{ method_field('put') }}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">EMPRESA {{$empresa->nit}}</h6>
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
                                        <input type="text"  class="form-control form-control-user" id="nit" name="nit" onchange="calcular()" value="{{$empresa->nit}}" placeholder="NIT...">
                                        {{--<button type="button" class="btn btn-primary mb-2" id="calcular" onclick="calcular()">Calcular Dígito de Verificación</button>--}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Dígito de Verificación</label>
                                        <input type="text"  class="form-control form-control-user" id="dv"  readonly="readonly" name="dig_verificacion" value="{{$empresa->dig_verificacion}}" placeholder="DV...">
                                        <input type="hidden"  class="form-control form-control-user" value="{{$empresa->marco_normativo}}" id="marco_normativo" name="marco_normativo" >
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="nombre1s">
                                    <div class="col-md-6">
                                        <label for="">Nombre</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$empresa->nombre}}" id="nombre" name="nombre"  placeholder="Nombre...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Código CGN</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$empresa->codCgn}}" id="codCgn" name="codCgn"  placeholder="Codigo CGN...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="direccions">
                                    <div class="col-md-6">
                                        <label for="">Dirección</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$empresa->direccion}}" id="direccion" name="direccion"  placeholder="Direccion...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Telefóno</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$empresa->telefono}}" id="telefono" name="telefono"  placeholder="Numero de Telefono...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="celulars">
                                    <div class="col-md-6">
                                        <label for="">Celular</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$empresa->celular}}" id="celular" name="celular"  placeholder="Celular...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Correo</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$empresa->correo}}" id="correo" name="correo"  placeholder="Correo Electronico...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row"  id="apellido1s">
                                    <div class="col-md-6">
                                        <label for="">Página WEB</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$empresa->url}}" id="url" name="url"  placeholder="Pagina WEB...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Vigencia CDP</label>
                                        <input type="text"  class="form-control form-control-user" value="{{$empresa->vigencia_cdp}}" id="vigencia_cdp" name="vigencia_cdp"  placeholder="Vigencia cdp...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Lema</label>
                                        <textarea name="lema" id="lema"  style="resize: none" class="form-control">{{$empresa->lema}}</textarea>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Logo de la República</label>
                                        <div class="form-group" >
                                            <img src="{{asset('images/'.$empresa->logo_republica)}}" style="width: 50%" alt="">
                                            <input type="file" name="logo_republica" id="logo_republica" value="{{$empresa->logo_republica}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Logo del Municipio</label>
                                        <div class="form-group" >
                                            <img src="{{asset('images/'.$empresa->logo_municipio)}}" style="width: 50%" alt="">
                                            <input type="file" name="logo_municipio" id="logo_municipio" value="{{$empresa->logo_municipio}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Logo Plan de Desarrollo</label>
                                        <div class="form-group" >
                                            <img src="{{asset('images/'.$empresa->logo_plandesarrollo)}}" style="width: 50%" alt="">
                                            <input type="file" name="logo_plandesarrollo" id="logo_plandesarrollo" value="{{$empresa->logo_plandesarrollo}}">
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
                                                <option {{ old('id_departamento', $empresa->id_departamento) == $departamento->id ? 'selected' : '' }} value="{{$departamento->id}}">{{$departamento->nameDepartamento}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Ciudad</label>
                                        <select  name="id_ciudad" id="ciudad_id" class="select2 form-control custom-select" >
                                            <option>[Seleccione un Municipio]</option>
                                            @foreach($ciudades as $ciudad)
                                                <option {{ old('id_ciudad', $empresa->id_ciudad) == $ciudad->id ? 'selected' : '' }} value="{{$ciudad->id}}">{{$ciudad->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" id="idActividads">
                                    <div class="col-md-6">
                                        <label for="">Número Ingreso Inicial</label>
                                        <input type="text" class="form-control form-control-user" value="{{$empresa->num_ingresoinicial}}" id="num_ingresoinicial" name="num_ingresoinicial"  placeholder="Numero Ingreso Inicial...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Número Ingreso Actual</label>
                                        <input type="text" class="form-control form-control-user" value="{{$empresa->num_ingresoactual}}" id="num_ingresoactual" name="num_ingresoactual"  placeholder="Numero Ingreso Actual...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Representante Legal Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreRepresentanteLegal',$empresa->nombreRepresentanteLegal)}}" name="nombreRepresentanteLegal" id="nombRepresentanteLegal">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Representante Legal</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaRepresentanteLegal',$empresa->cedulaRepresentanteLegal)}}" name="cedulaRepresentanteLegal" id="ceduRepresentanteLegal">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Representante Legal</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('no_tp_representante_legal',$empresa->no_tp_representante_legal)}}" name="no_tp_representante_legal" id="noRepresentanteLegal">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Contador Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreContador',$empresa->nombreContador)}}" name="nombreContador" id="nombreContador">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Contador</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaContador',$empresa->cedulaContador)}}" name="cedulaContador" id="cedulaContador">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Contador</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTpContador',$empresa->noTpContador)}}" name="noTpContador" id="noTpContador">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Revisor Fiscal Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreRevisorFiscal',$empresa->nombreRevisorFiscal)}}" name="nombreRevisorFiscal" id="nombreRevisorFiscal">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Revisor Fiscal</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaRevisorFiscal',$empresa->cedulaRevisorFiscal)}}" name="cedulaRevisorFiscal" id="cedulaRevisorFiscal">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Revisor Fiscal</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTPRevisorFiscal'),$empresa->noTPRevisorFiscal}}" name="noTPRevisorFiscal" id="noTPRevisorFiscal">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Control Interno Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreControlInterno'),$empresa->nombreControlInterno}}" name="nombreControlInterno" id="nombreControlInterno">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Control Interno</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaControlInterno'),$empresa->cedulaControlInterno}}" name="cedulaControlInterno" id="cedulaControlInterno">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Control Interno</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTPControlInterno'),$empresa->noTPControlInterno}}" name="noTPControlInterno" id="noTPControlInterno">
                                        </div>
                                    </div>

                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-4">
                                        <label for="">Nombre del Jefe de Presupuesto Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('jefePresupuesto'),$empresa->jefePresupuesto}}" name="jefePresupuesto" id="jefePresupuesto">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Cedula del Jefe de Presupuesto</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaJefePresupuesto'),$empresa->cedulaJefePresupuesto}}" name="cedulaJefePresupuesto" id="cedulaJefePresupuesto">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">N° TP Jefe de Presupuesto</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTPJefePresupuesto'),$empresa->noTPJefePresupuesto}}" name="noTPJefePresupuesto" id="noTPJefePresupuesto">
                                        </div>
                                    </div>

                                </div>
                                &nbsp
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label for="">Otro Resposnable</label>
                                        <select  name= "otroResponsable" id="otroResponsable" class="select2 form-control custom-select" >
                                            <option value="{{$empresa->otroResponsable}}">{{$empresa->otroResponsable}}</option>
                                            <option value="TESORERO(A)">TESORERO(A)</option>
                                            <option value="SUB GER. AVO Y FRO.">SUB GER. AVO Y FRO.</option>
                                            <option value="PAGADOR(A)">PAGADOR(A)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Nombre Completo</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('nombreOtroResponsable'),$empresa->nombreOtroResponsable}}" name="nombreOtroResponsable" id="nombreOtroResponsable">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Cedula</label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('cedulaJefePresupuesto'),$empresa->cedulaJefePresupuesto}}" name="cedulaJefePresupuesto" id="cedulaJefePresupuesto">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">N° TP </label>
                                        <div class="form-group" >
                                            <input type="text" class="form-control form-control-user" value="{{old('noTPOtroResponsable'),$empresa->noTPOtroResponsable}}" name="noTPOtroResponsable" id="noTPOtroResponsable">
                                        </div>
                                    </div>

                                </div>
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
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
        crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
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
                idDepartamento:{
                    required: true,
                },
                idCiudad:{
                    required: true,
                },
                id_clase:{
                    required:true,
                },
                descritores_id:{
                    required: true,
                },
                id_actividadesCiiu:{
                    required:true,
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
                idDepartamento: {
                    required: "Este campo es Obligatorio",
                },
                idCiudad: {
                    required: "Este campo es Obligatorio",
                },
                descritores_id: {
                    required: "Este campo es Obligatorio",
                },
                id_actividadesCiiu: {
                    required: "Este campo es Obligatorio",
                },
                id_clase: {
                    required: "Este campo es Obligatorio",
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
            }
        });

    });
</script>