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
                    <a href="{{route('users.index')}}">Usuarios</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Usuario {{$users->email}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
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
                    <form class="user"  action="{{route('users.update',$users->id)}}" method="post" id="terceros" enctype="multipart/form-data" name="terceros">
                        {{csrf_field()}}
                        {{ method_field('put') }}
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
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="email">Correo Electrónico</label>
                                    <div class="col-md-12">
                                        <input id="email" type="email" value="{{$users->email}}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-unstyled">
                                            <div class="form-group">
                                                <ul class="list-unstyled">
                                                    @foreach($roles as $role)
                                                        <li>
                                                            <label>
                                                                {{--<input type="radio"  id="roles" name="roles" value="1"  {{ $role->id== 'roles' ? 'checked' : '' }} {{ old('roles')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}></label>--}}
                                                                <input type="checkbox" name="roles"  value="{{ $role->id }}" {{ $users->roles->contains($role->id) ? 'checked' : '' }} >
                                                                <em>{{ $role->name }}</em>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="id" id="id" value="{{auth()->user()->id}}">
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


