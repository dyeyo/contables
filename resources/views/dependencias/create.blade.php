
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
                    <strong>Crear Dependencia</strong>
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
                    <form class="user"  action="{{route('dependecias.store')}}" method="post" id="terceros" enctype="multipart/form-data" name="terceros">
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
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
                                        <input type="text"  class="form-control form-control-user" value="{{old('codigo')}}" id="codigo" name="codigo"  placeholder="Código de Dependecia...">
                                        <input type="hidden"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year')}}" readonly="readonly">


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre de Dependecia</label>
                                            <input type="text"  class="form-control form-control-user" value="{{old('nombre')}}" id="nombreDependecia" name="nombre"  placeholder="Nombre de Dependecia...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select  name= "persona_id" id="persona_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="">[Seleccione una Tercero]</option>
                                            @foreach($terceros as $item)
                                                <option value="{{$item->id}}" {{ old('persona_id') == $item->id ? 'selected' : '' }}>
                                                    {{$item->nombre1 }} {{$item->nombre2 }} {{$item->apellido}} {{$item->apellido2}}
                                               </option>
                                            @endforeach
                                        </select>
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


