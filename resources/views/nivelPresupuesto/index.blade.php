@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Niveles Presupuesto Gastos</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Niveles Presupuesto Gastos</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 5%">Nivel</th>
                                    <th style="width: 10%">Numero de Caracteres</th>
                                    <th style="width: 5%"></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 5%">Nivel</th>
                                    <th style="width: 10%">Numero de Caracteres</th>
                                    <th style="width: 5%"></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($nivel as $item)
                                    <tr>
                                        <td style="width: 20%">{{$item->id}}</td>
                                        <td>{{$item->nivel}}</td>
                                        <td>{{$item->numero_caracteres}}</td>
                                        <td>
                                            @can('nivelPresupuesto.edit')
                                                <a href="{{route('nivelPresupuesto.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
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

