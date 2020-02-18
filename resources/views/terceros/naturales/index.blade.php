@extends('layouts.plantillaBase')
@section('contenido')
<!-- Page Heading -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Personas Naturales Diego</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('empresa.index')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Personas Naturales</strong>
            </li>
        </ol>
    </div>
</div>
<br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Todas las Personas Naturales</h5>
                    <div class="ibox-tools">
                        @can('personaNarutal.create')
                            <a href="{{route('personaNarutal.create')}}" class="btn btn-primary float-right">
                                <i class="fa fa-plus"></i>
                            </a>
                            <a href="{{route('personaNarutal.excel')}}" style="margin-right: 8px;" class="btn btn-primary float-right">
                                <i class="fa fa-file-excel-o"></i>
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
                                    <th>Número de identificación</th>
                                    <th>Nombres y Apellidos</th>
                                    <th>Dirección</th>
                                    <th>Regimen Simple</th>
                                    <th>Responsable IVA</th>
                                    <th>Número de Cuenta</th>
                                    <th>Teléfono/Celular</th>
                                    <th>Correo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($personasNaturales as $item)
                                <tr>
                                    <td >{{$item->numeroDocumento}}</td>
                                    <td>{{$item->nombre1.' '.$item->nombre2.' '.$item->apellido. ' '. $item->apellido2}}</td>
                                    <td>{{$item->direccion}}</td>
                                    <td>{{$item->responsableIVA}}</td>
                                    <td>{{$item->regimenSimple}}</td>
                                    <td>{{$item->numeroCuenta}}</td>
                                    <td>{{$item->telefono .' / '. $item->celular}}</td>
                                    <td>{{$item->correo}}</td>
                                    <td>
                                        {{--@can('personaNarutal.show')--}}
                                            {{--<a href="{{route('personaNarutal.show',$item->id)}}"><i class="fa fa-eye"></i></a>--}}
                                        {{--@endcan--}}
                                        @can('personaNarutal.edit')
                                            <a href="{{route('personaNarutal.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Número de identificación</th>
                                <th>Nombres y Apellidos</th>
                                <th>Dirección</th>
                                <th>Responsable IVA</th>
                                <th>Regimen Simple</th>
                                <th>Número de Cuenta</th>
                                <th>Teléfono/Celular</th>
                                <th>Correo</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

