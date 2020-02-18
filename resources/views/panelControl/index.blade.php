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

    <div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('panel.create')}}" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i></a>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Abreviatura</th>
                            <th>Nombre de Soporte</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($panel as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->abreviatura}}</td>
                                <td>{{$item->nombreSoporte}}</td>
                                <td>
                                    @can('panel.edit')
                                        <a href="{{route('panel.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
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