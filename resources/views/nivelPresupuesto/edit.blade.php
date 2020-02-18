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
                    <a href="{{route('nivelPresupuesto.index')}}">Nivel Presupuestal</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Nivel {{$nivel->nivel}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>NIVEL PRESUPUESTAL <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                <div class="card-body">
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
                    <form class="user"  action="{{route('nivelPresupuesto.update',$nivel->id)}}" method="post" id="terceros" name="terceros">
                        {{ method_field('put') }}
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-body">
                                <div class="row"  id="tipoDocumentos">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="codigoCC">Nivel</label>
                                            <input type="text"   class="form-control form-control-user" value="{{old('nivel'). $nivel->nivel}}" id="nivel" name="nivel"  placeholder="Nivel...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Número de Caracteres</label>
                                        <input type="text"  class="form-control form-control-user" value="{{old('numero_caracteres'). $nivel->numero_caracteres}}" id="numero_caracteres" name="numero_caracteres"  placeholder="Número de Caracteres...">
                                    </div>
                                </div>
                                &nbsp
                            </div>
                            <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                            &nbsp
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
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

<script !src="">
    $(function() {
        $( "#terceros" ).validate({
            rules: {
                nivel: {
                    required: true,
                    digits: true,
                },
                numero_caracteres: {
                    digits: true,
                    required: true,
                },

            },
            messages: {
                nivel: {
                    required: "Este campo es Obligatorio",
                    digits: "Este campo solo recive numeros",
                },
                numero_caracteres: {
                    digits: "Este campo solo recive numeros",
                    required: "Este campo es Obligatorio",
                },

            }
        });

    });
</script>
