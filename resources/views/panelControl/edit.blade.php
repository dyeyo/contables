@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Soportes Contables</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('panel.index')}}">Soportes Contables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Soporte {{$comprobante->nombreSoporte}} </strong>
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
                <form class="user"  action="{{route('panel.update', $comprobante->id)}}" method="post" id="puc"  name="puc">
                    {{ method_field('put') }}
                    {{csrf_field()}}
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
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nombre del Soporte</label>
                                <input type="text"  class="form-control form-control-user"  value="{{$comprobante->nombreSoporte}}" id="nombreSoporte" name="nombreSoporte"  placeholder="Nombre de Soporte...">
                            </div>
                            <div class="col-md-6">
                                <label for="">Abreviatura</label>
                                <input type="text"  class="form-control form-control-user"  value="{{$comprobante->abreviatura}}" id="abreviatura" name="abreviatura"  placeholder="Abreviatura...">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <h3>Presupuesto</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="select2" style="width: 100%;" name="tipoPresupuesto_id[]" multiple="multiple">
                                            @foreach($tipoPresupuesto as $item)
                                                <option {{ old('$tipoPresupuesto', $comprobante->$tipoPresupuesto) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->nombrePresupuesto}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @foreach($empresa as $emp)
                                <input type="hidden" value="{{$emp->id}}" name="empresa_id" id="empresa_id">
                            @endforeach
                            <div class="col-6">
                                <h3>Otras Opciones</h3>
                                <p>Selecciona el una opcion para activar o desactivar campos en siguentes formularios y funcionamiento del sistema</p><br>
                                <input class="checked" id="Tesoreria" name="tesoreria" type="checkbox" value="SI" @if($comprobante->tesoreria == 'SI') checked="checked" @endif>
                                <label for="Tesoreria">Tesoreria</label><br>
                                <input class="checked" id="Contabilidad" name="contabilidad" type="checkbox" value="SI" @if($comprobante->contabilidad== 'SI') checked="checked" @endif>
                                <label for="Contabilidad">Contabilidad</label><br>
                                <input class="checked" id="Naturaleza" name="naturaleza" type="checkbox" value="SI" @if($comprobante->naturaleza== 'SI') checked="checked" @endif>
                                <label for="Naturaleza">Naturaleza(Debito)</label><br>
                                <input class="checked" id="Activar" name="activarDescuentos" type="checkbox" value="SI" @if($comprobante->activarDescuentos== 'SI') checked="checked" @endif>
                                <label for="Activar">Activar (Descuentos)</label><br>
                                <input class="checked" id="SIA" name="reporteSIA" type="checkbox" value="SI" @if($comprobante->reporteSIA== 'SI') checked="checked" @endif>
                                <label for="SIA">Se Reporte al SIA</label><br>
                                <input class="checked" id="Estado" name="estado" type="checkbox" value="SI" @if($comprobante->estado== 'SI') checked="checked" @endif>
                                <label for="Estado">Estado (Activo)</label>
                            </div>
                        </div>
                    </div>
                    &nbsp
                    <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                    &nbsp
                </form>
                <div class="row container">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                Tipos de Presupuestos
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo Presupuesto</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </thead>
                                    @foreach($tipoPresupuestoComprobante as $item)
                                        <tbody>
                                        <tr>
                                            <th>{{$item->id}}</th>
                                            <th>{{$item->nombrePresupuesto}}</th>
                                            <th>
                                                <form method="POST" id="deleteTipoDoc" action="{{route('panel.destroyTipoPresupuesto',$item->id)}}">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-sm btn-danger" ><i class="fa fa-times"></i></button>
                                                </form>
                                            </th>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    @can('panel.destroy')
                        <div class="col-md-6">
                            <form method="POST" id="deleteTipoDoc" action="{{route('panel.destroy',$comprobante->id)}}">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-block btn-sm btn-danger" >Eliminar</button>
                            </form>
                        </div>
                    @endcan
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
    </script>
@endsection
