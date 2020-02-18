@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Configuraciones - Codigo Empleo</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Configuraciones - Codigo Empleo</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Todos los Codigo de Empleo</h5>
                    <div class="ibox-tools">
                        @can('clasePersona.create')
                            <a class="btn btn-primary float-right" href="#crear"  data-toggle="modal">
                                <i class="fas fa-plus "></i>
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                @can('codigoEmpleo.edit')
                                <th>Acciones</th>
                                    @endcan
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                @can('codigoEmpleo.edit')
                                <th>Acciones</th>
                                    @endcan
                            </tr>
                            </tfoot>
                            <tbody id="datos">
                            @foreach($codEmpleo  as $item)
                                <tr>
                                    <td>{{$item->codigo}}</td>
                                    <td>{{$item->nombreEmpleo}}</td>
                                    @can('codigoEmpleo.edit')
                                    <td>
                                        <a href="{{route('codigoEmpleo.edit',$item->id)}}" class="">
                                            <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                    </td>
                                        @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-open" id="crear" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR CODIGO EMPLEO</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" method="post" id="crearCodigoEmpleo" name="crearCodigoEmpleo">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-user"  id="codigo" name="codigo"  placeholder="CODIGO...">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-user"  id="nombreEmpleo" name="nombreEmpleo"  placeholder="NOMBRE...">
                            </div>
                        </div>
                        &nbsp
                        <div class="row">
                            <div class="col-md-12">
                                <select  name= "id_nivelEmpleo" id="id_nivelEmpleo" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                    <option value="">[Nivel de Empleo]</option>
                                    @foreach($nivelEmpleo as $nivel)
                                        <option value="{{$nivel->id}}" {{ old('descritores_id') == $nivel->id ? 'selected' : '' }}>{{$nivel->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" onclick="crearCodigoEmpleos()"> <i class="fa fa-check"></i> Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection()