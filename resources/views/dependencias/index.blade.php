@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Dependecias</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong><a href="{{route('dependecias.index')}}">Dependecias</a></strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Todas las Dependencias</h5>
                    <div class="ibox-tools">
                        @can('dependecias.create')
                            <a href="{{route('dependecias.create')}}" class="btn btn-primary float-right">
                                <i class="fa fa-plus"></i>
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
                            <th>Número</th>
                            <th>Código</th>
                            <th>Nombre Completo</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Número</th>
                            <th>Código</th>
                            <th>Nombre Completo</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($dependecias as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->codigo}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>
                                     @can('dependecias.index')
                                        <a href="{{route('dependecias.edit',$item->id)}}"><i class="fa fa-edit"></i><a>
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