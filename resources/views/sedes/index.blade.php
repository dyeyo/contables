@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Centro de Costo</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Centro de Costo</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @can('sede.create')
                <a href="{{route('sede.create')}}" class="btn btn-primary  float-right">
                        <i class="fa fa-plus"></i>
                    <a href="{{route('subSede.index')}}" style="margin-right: 8px;" class="btn btn-primary  float-right">
                        <i class="fa fa-business-time">Sub Centro de Costo</i>
                    <a href="{{route('sede.excel')}}" style="margin-right: 8px;" class="btn btn-primary  float-right">
                        <i class="fa fa-file-excel-o"></i>
                    </a>
                </a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th style="width: 20%">Codigo Centro de Costo</th>
                                    <th>Nombre de Centro de Costo</th>
                                    <th>Clase Centro de Costo</th>
                                    <th>Porrateo</th>
                                    <th>Nombre de Grupo Centro de Costo</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th style="width: 20%">Codigo Centro de Costo</th>
                                    <th>Nombre de Centro de Costo</th>
                                    <th>Clase Centro de Costo</th>
                                    <th>Porrateo</th>
                                    <th>Nombre de Grupo Centro de Costo</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($sedes as $item)
                                    <tr>
                                        <td style="width: 20%">{{$item->codigoCC}}</td>
                                        <td>{{$item->NombreCC}}</td>
                                        <td>{{$item->claseCC}}</td>
                                        <td>{{$item->prorrateo}}</td>
                                        <td>{{$item->nombreGrupoCC}}</td>
                                        <td>
                                            @can('sede.edit')
                                                <a href="{{route('sede.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

