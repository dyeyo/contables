@extends('layouts.plantillaBase')
@section('contenido')
<!-- Page Heading -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Consorcios y Uniones Temporales</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('empresa.index')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Consorcios y Uniones Temporales</strong>
            </li>
        </ol>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Todas los Consorcios y Uniones Temporales</h5>
                <div class="ibox-tools">
                    @can('consorciados.create')
                        <a href="{{route('consorciados.create')}}" class="btn btn-primary float-right">
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
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Razón Social</th>
                            <th>NIT</th>
                            <th>Porcentaje</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Razón Social</th>
                            <th>NIT</th>
                            <th>Porcentaje</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($consorciados as $key => $item)
                            <tr>
                                <td>{{$item->raz_social}}</td>
                                <td>{{$item->nit}}</td>
                                <td>{{$item->consorcios()->pluck('porcentaje')->implode(' / ')}}</td>
                                <td>
                                    {{--@can('personaNarutal.show')--}}
                                    {{--<a href="{{route('personaNarutal.show',$item->id)}}"><i class="fa fa-eye"></i></a>--}}
                                    {{--@endcan--}}
                                    @can('consorciados.edit')
                                        <a href="{{route('consorciados.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
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