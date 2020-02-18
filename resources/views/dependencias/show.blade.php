<style>
    .hide {
        display: none;
    }
</style>
@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DEPENDENCIA N° {{$dependecias->id}}</h6>
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
                                        <label for="codigo">Código de Dependecia</label>
                                        <input type="text" disabled="disabled" class="form-control form-control-user" value="{{$dependecias->codigo}}" id="codigo" name="codigo"  placeholder="codigo de ependecia...">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre de Dependecia</label>
                                            <input type="text"disabled="disabled"  class="form-control form-control-user" value="{{$dependecias->nombre}}" id="nombreDependecia" name="nombre"  placeholder="nombre de Dependecia...">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                {{--EMPRESA
                                @foreach($empresa as $e)
                                    @if ($e->marco_normativo =='EMPRESA PUBLICA' || $e->marco_normativo=='ENTIDADES DEL GOBIERNO' )
                                    <div class="row"  id="nombre1s">
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label for="">ordenadores del Gasto</label>
                                                <input type="radio" id="estadoSi" name="ordenadorGasto" value="1" checked {{ old('No')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}  onclick="show1();" />
                                                No
                                                <input type="radio" id="estadoNo" name="ordenadorGasto" value="2"   {{ old('No')=="2" ? 'checked='.'"'.'checked'.'"' : ''}}  onclick="show2();" />
                                                Si
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                    &nbsp
                                <div class="hide" id="fueSi">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">actoAdministacion</label>
                                            <select name="actoAdministrativo" id="actoAdministrativo" class="form-control "  {{ old('genero')}}>
                                                <option value="">SELECCIONE UNO</option>
                                                <option value="DECRETO">DECRETO</option>
                                                <option value="RESOLUCION">RESOLUCIÓN</option>
                                                <option value="ACTA">ACTA</option>
                                                <option value="OTRO">OTRO</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Direccion</label>
                                            <input type="text"  class="form-control form-control-user" value="{{old('direccion')}}" id="direccion" name="direccion"  placeholder="Direccion...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="celulars">
                                        <div class="col-md-6">
                                            <label for="">numeroActo</label>
                                            <input type="text"  class="form-control form-control-user" value="{{old('numeroActo')}}" id="numeroActo" name="numeroActo"  placeholder="numero de Acto...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">fechaInicioAutorizacion</label>
                                            <input type="date"  class="form-control form-control-user" value="{{old('fechaInicioAutorizacion')}}" id="fechaInicioAutorizacion" name="fechaInicioAutorizacion"  placeholder="Correo Electronico...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="apellido1s">
                                        <div class="col-md-6">
                                            <label for="">fechaFinAutorizacion</label>
                                            <input type="date"  class="form-control form-control-user" value="{{old('fechaFinAutorizacion')}}" id="fechaFinAutorizacion" name="fechaFinAutorizacion"  placeholder="Pagina WEB...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">fechaRevocatoriaGasto</label>
                                            <input type="date"  class="form-control form-control-user" value="{{old('fechaRevocatoriaGasto')}}" id="fechaRevocatoriaGasto" name="fechaRevocatoriaGasto"  placeholder="Vigencia cdp...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row"  id="direccions">
                                        <div class="col-md-6">
                                            <label for="">fechaExpedicion</label>
                                            <input type="date"  class="form-control form-control-user" value="{{old('fechaExpedicion')}}" id="fechaExpedicion" name="fechaExpedicion"  placeholder="Numero de Telefono...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <label for="">Todos</label>
                                                <br>
                                                Si
                                                <input type="radio" id="estadoSi" name="estado" value="1" {{ old('estado')=="1" ? 'checked='.'"'.'checked'.'"' : '' }} onclick="yesnoCheck();">
                                                No
                                                <input type="radio" id="estadoNo" name="estado" value="2"  checked {{ old('estado')=="2" ? 'checked='.'"'.'checked'.'"' : '' }} onclick="yesnoCheck();" >
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">catalogo Presupuestal Desde</label>
                                            <input type="text"  class="form-control form-control-user" value="{{old('catalogoPresupuestalDesde')}}" id="catalogoPresupuestalDesde" name="catalogoPresupuestalDesde"  placeholder="catalogo Presupuestal Desde...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">catalogoPresupuestalHasta</label>
                                            <input type="text"  class="form-control form-control-user" value="{{old('catalogoPresupuestalHasta')}}" id="catalogoPresupuestalHasta" name="catalogoPresupuestalHasta"  placeholder="catalogo Presupuestal Hasta...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Bienes y Servicios</label>
                                            <select  name= "id_ambitoBienesyServicios" id="id_ambitoBienesyServicios" class="   form-control custom-select" style="width: 100%; height:36px;" onchange="municipios()">
                                                <option value="">[Seleccione uno]</option>
                                                @foreach($ambitoServices as $services)
                                                    <option value="{{$services->id}}" {{ old('id_ambitoBienesyServicios') == $services->id ? 'selected' : '' }} >{{$services->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">cuantia Hasta</label>
                                            <input type="text" class="form-control form-control-user" value="{{old('cuantiaHasta')}}" id="cuantiaHasta" name="cuantiaHasta"  placeholder="Cuantia hasta...">
                                        </div>
                                    </div>
                                    &nbsp
                                    <div class="row" id="idActividads">

                                        <div class="col-md-6">
                                            <label for="">Estado</label>
                                            <br>
                                            <label class="radio-inline">
                                                <input type="radio"  id="estado" name="estado" value="1" {{ old('estado')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>ACITVO</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="estado" name="estado" value="2" {{ old('estado')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>INACTIVO</label>
                                        </div>
                                    </div>--}}
                            </div>
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

        const number = document.querySelector('#cuantiaHasta');

        function formatNumber (n) {
            n = String(n).replace(/\D/g, "");
            return n === '' ? n : Number(n).toLocaleString();
        }
        number.addEventListener('keyup', (e) => {
            const element = e.target;
            const value = element.value;
            element.value = formatNumber(value);
        });

    });
</script>

<script !src="">
    $(function() {
        $( "#terceros" ).validate({
            rules: {
                codigo: {
                    required: true,
                    maxlength:20
                },
                nombreDependecia : {
                    required: true,
                    maxlength:60
                },
                numeroActo: {
                    maxlength:20
                },
                cuantiaHasta: {
                    maxlength:13
                },
            },
            messages: {
                codigo: {
                    required: "Este campo es Obligatorio",
                    maxlength: "Este campo debe tener maximo 20 carateres",
                },
                nombreDependecia: {
                    required: "Este campo es Obligatorio",
                    maxlength: "Este campo debe tener maximo 60 carateres",
                },
                numeroActo: {
                    maxlength: "Este campo debe tener maximo 20 carateres",
                },
                cuantiaHasta: {
                    maxlength: "Este campo debe tener maximo 13 carateres",
                }
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


</script>

