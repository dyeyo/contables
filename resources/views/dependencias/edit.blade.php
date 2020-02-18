<style>
    .hide {
        display: none;
    }
</style>
@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Dependencia</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{route('dependecias.index')}}">Dependencia</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Dependencia N°{{$dependecias->codigo}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>DEPENDENCIA <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                <div class="card-body">
                    <form class="user"  action="{{route('dependecias.update',$dependecias->id)}}" method="post" id="terceros" enctype="multipart/form-data" name="terceros">
                        {{csrf_field()}}
                        {{ method_field('put') }}

                        <div class="card shadow mb-4" id="datosBasicos" >
                            @if (Session::has('message'))
                                <div class="alert alert-warning">{{ Session::get('message') }}</div>
                            @endif
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
                                        <input type="text"  class="form-control form-control-user" value="{{$dependecias->codigo}}" id="codigo" name="codigo"  placeholder="codigo de ependecia...">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre de Dependecia</label>
                                            <input type="text"  class="form-control form-control-user" value="{{$dependecias->nombre}}" id="nombreDependecia" name="nombre"  placeholder="nombre de Dependecia...">
                                        </div>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-6">
                                        <select  name="persona_id" id="persona_id" class="select2 form-control custom-select">
                                            <option value="">[Seleccione una Tercero]</option>
                                                @foreach($terceros as $tipo)
                                                    <option {{ old('persona_id', $dependecias->persona_id) == $tipo->id ? 'selected' : '' }} value="{{$tipo->id}}">      {{$tipo->nombre1}} {{$tipo->nombre2}} {{$tipo->apellido}} {{$tipo->apellido2}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            &nbsp
                            <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                        </div>
                    </form>
                    <div class="row"  id="">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    @can('dependecias.destroy')
                                        <form method="POST" id="deleteTipoDoc"
                                              action="{{route('dependecias.destroy',$dependecias->id)}}">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger " style="width: 20%;">ELIMINAR</button>
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

