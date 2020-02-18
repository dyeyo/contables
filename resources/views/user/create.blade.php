@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Usuarios</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong><a href="{{route('users.index')}}">Usuarios</a></strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Agregar Usuarios</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3>CREAR USUARIO</h3>
                </div>
                <div class="card-body">
                    <form method="POST" id="terceros" action="{{ route('users.store') }}">
                        @csrf
                            <div class="row">
                                <div class="col-md-12" id="perNaturales">
                                    <div class="form-group" >
                                        <label for="">Personas Natural/Empleados</label>
                                        <select  name="persona_id" id="persona_id" class="persona form-control">
                                            <option value=""></option>
                                            @foreach($persona as $tipo)
                                                <option value="{{$tipo->id}}">{{$tipo->nombre1}} {{$tipo->nombre2}} {{$tipo->apellido}} {{$tipo->apellido2}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div id="datosExtras">
                            <div class="row" >
                                <div class="col-md-12">
                                    <label for="email">Correo Electrónico</label>
                                    <input id="email" type="email" value="{{old('email')}}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="password">Contraseña</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>
                            <input id="nombreCompleto" type="hidden" class="form-control" name="nombreCompleto">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-unstyled">
                                        @foreach($roles as $role)
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" >
                                                    <em>{{ $role->name }}</em>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <input type="hidden" name="id" id="id" value="{{auth()->user()->id}}">
                            </div>
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



        $('.persona').on('change', function () {
            var nombre=$('.persona').text();
            console.log(nombre);
            $('#nombreCompleto').val(nombre);
        });



    });
</script>
