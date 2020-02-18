@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Soportes Contables</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Soportes Contables</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>SOPORTE CONTABLE <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                <div class="card-body">
                    <form class="user"  action="{{route('panel.store')}}" method="post" id="puc"  name="puc">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Nombre del Soporte</label>
                                        <input type="text"  class="form-control form-control-user"  id="nombreSoporte" name="nombreSoporte"  placeholder="Nombre de Soporte...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Abreviatura</label>
                                        <input type="text"  class="form-control form-control-user"  id="abreviatura" name="abreviatura"  placeholder="Abreviatura...">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Presupuesto</h3>
                                        <select onChange="tipoPresupuestos()" class="select2" style="width: 100%;" id="tipoPresupuesto_id" name="tipoPresupuesto_id[]" multiple="multiple">
                                            @foreach($tipoPresupuesto as $item)
                                                <option value="{{$item->id}}" {{ old('tipoPresupuesto_id') == $item->id ? 'selected' : '' }} >{{$item->nombrePresupuesto}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        @foreach($empresa as $emp)
                                            <input type="hidden" value="{{$emp->id}}" name="empresa_id" id="empresa_id">
                                        @endforeach
                                        <h3>Otras Opciones</h3>
                                        <p>Selecciona el una opcion para activar o desactivar campos en siguentes formularios y funcionamiento del sistema</p>
                                        <input class="checked" id="Tesoreria" name="tesoreria" type="checkbox" value="SI">
                                        <label for="Tesoreria">Tesoreria</label><br>
                                        <input class="checked" id="Contabilidad" name="contabilidad" type="checkbox" value="SI">
                                        <label for="Contabilidad">Contabilidad</label><br>
                                        <input class="checked" id="Naturaleza" name="naturaleza" type="checkbox" value="SI">
                                        <label for="Naturaleza">Naturaleza(Debito)</label><br>
                                        <input class="checked" id="Activar" name="activarDescuentos" type="checkbox" value="SI">
                                        <label for="Activar">Activar (Descuentos)</label><br>
                                        <input class="checked" id="SIA" name="reporteSIA" type="checkbox" value="SI">
                                        <label for="SIA">Se Reporte al SIA</label><br>
                                        <input class="checked" id="Estado" name="estado" type="checkbox" value="SI">
                                        <label for="Estado">Estado (Activo)</label>
                                    </div>
                                </div>
                            </div>
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">AGREGAR</button>
                            &nbsp
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
    </script>

    <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        $(function() {
            $( "#puc" ).validate({
                rules: {
                    nombreSoporte:{
                        required: true,
                    },
                    abreviatura:{
                        required:true,
                        maxlength:4
                    }

                },
                messages: {
                    nombreSoporte:{
                        required: "Este campo es Obligatorio",
                    },
                    abreviatura:{
                        required: "Este campo es Obligatorio",
                        maxlength: "La abreviatura solo debe tener maximo 4 caracteres",
                    },
                }
            });
        });

        function tipoPresupuestos() {
            var tipoPresupuesto= $('#tipoPresupuesto_id').val();
            tipoPresupuesto.forEach(function (e) {
                if (e==='1'){
                    console.log('ss')
                    tipoPresupuesto.prop("disabled","disabled");
                }

            })
        }
    </script>
@endsection
