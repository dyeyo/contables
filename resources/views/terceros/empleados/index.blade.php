@extends('layouts.plantillaBase')
@section('contenido')
<!-- Page Heading -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Personas Empleados</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('empresa.index')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Personas Empleados</strong>
            </li>
        </ol>
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Todas las Personas Juridicas</h5>
                <div class="ibox-tools">
                    @can('personaEmpleado.create')
                        <a href="{{route('personaEmpleado.create')}}" class="btn btn-primary float-right">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a href="{{route('personaEmpleado.excel')}}" style="margin-right: 8px;" class="btn btn-primary float-right">
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
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th style="width: 177px;">Identificación</th>
                            <th style="width: 177px;">Nombre Completo</th>
                            <th style="width: 177px;">Nivel de Empleo</th>
                            <th style="width: 177px;">Empleo</th>
                            <th style="width: 177px;">Designado Supervisor</th>
                            <th style="width: 0px;"></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th style="width: 177px;">Identificación</th>
                            <th style="width: 177px;">Nombre Completo</th>
                            <th style="width: 177px;">Nivel de Empleo</th>
                            <th style="width: 177px;">Empleo</th>
                            <th style="width: 177px;">Designado Supervisor</th>
                            <th style="width: 0px;"></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($perEmpleados as $item)
                            <tr>
                                <td>{{$item->numeroDocumento}}</td>
                                <td>{{$item->nombre1.' '.$item->nombre2.' '.$item->apellido. ' '. $item->apellido2}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->nombreEmpleo}}</td>
                                <td>{{$item->designadoSupervisor}}</td>
                                <td>
                                    {{--@can('personaEmpleado.show')--}}
                                        {{--<a href="{{route('personaEmpleado.show',$item->id)}}"><i class="fa fa-eye"></i></a>--}}
                                    {{--@endcan--}}
                                    @can('personaEmpleado.edit')
                                        <a href="{{route('personaEmpleado.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
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