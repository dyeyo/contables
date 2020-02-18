@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Cuentas NIIF</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Cuentas NIIF</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('niff.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="file" name="excel" class="">
                            <button class="btn btn-primary" style="float: right;">Importar Datos</button>
                       <a href="{{route('niff.excel')}}" style="margin-right: 8px;" class="btn btn-primary float-right">Gestionar NIIFS
                            <i class="fa fa-download"></i>
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Código PUC</th>
                        <th>Nombre Cuenta PUC</th>
                        <th>Código NIIF</th>
                        <th>Nombre NIIF</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Código PUC</th>
                        <th>Nombre Cuenta PUC</th>
                        <th>Código NIIF</th>
                        <th>Nombre NIIF</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($niif as $item)
                        <tr>
                            <td>{{$item->puc->codigo_cuenta}}</td>
                            <td>{{$item->puc->nombre_cuenta}}</td>
                            <td>{{$item->codigoNiff}}</td>
                            <td>{{$item->nombreNiff}}</td>
                            <td>
                                @can('niff.edit')
                                    <a href="{{route('niff.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
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
@endsection