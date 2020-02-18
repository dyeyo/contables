@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Cuentas Institucionales</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Cuentas Institucionales</strong>
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
                        <div class="tabs-container">
                            <ul class="nav nav-tabs" role="tablist">
                                <li><a class="nav-link active" data-toggle="tab" href="#tab-1">Cuentas Instirucionales Completadas</a></li>
                                <li><a class="nav-link" data-toggle="tab" href="#tab-2">Cuentas Instirucionales Incompletas</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                            <tr>
                                                <th>Código deCuenta</th>
                                                <th>Código Superior</th>
                                                <th>Nombre de Cuenta</th>
                                                <th>Naturaleza de Cuenta</th>
                                                <th>Cuenta CoNC</th>
                                                <th>Número de Cuenta</th>
                                                <th>Tipo de Cuenta Bancaria</th>
                                                <th>Situacion de Fondos</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Código deCuenta</th>
                                                <th>Código Superior</th>
                                                <th>Nombre de Cuenta</th>
                                                <th>Naturaleza de Cuenta</th>
                                                <th>Cuenta CoNC</th>
                                                <th>Número de Cuenta</th>
                                                <th>Tipo de Cuenta Bancaria</th>
                                                <th>Situacion de Fondos</th>
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($cuenta as $item)
                                                <tr>
                                                    <td>{{$item->codigo_cuenta}}</td>
                                                    <td>{{$item->codigo_superior}}</td>
                                                    <td>{{$item->nombre_cuenta}}</td>
                                                    <td>{{$item->naturaleza}}</td>
                                                    <td>{{$item->cuenta_co_nc}}</td>
                                                    <td>{{$item->numeroCuenta}}</td>
                                                    <td>{{$item->tipoCuentaBancaria}}</td>
                                                    <td>{{$item->situacionFondos}}</td> <td>
                                                        @can('cuentasInstitucionales.edit')
                                                            <a href="{{route('cuentasInstitucionales.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" id="tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Código deCuenta</th>
                                                    <th>Código Superior</th>
                                                    <th>Nombre de Cuenta</th>
                                                    <th>Naturaleza de Cuenta</th>
                                                    <th>Cuenta CoNC</th>
                                                    <th>Número de Cuenta</th>
                                                    <th>Tipo de Cuenta Bancaria</th>
                                                    <th>Situacion de Fondos</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Código deCuenta</th>
                                                    <th>Código Superior</th>
                                                    <th>Nombre de Cuenta</th>
                                                    <th>Naturaleza de Cuenta</th>
                                                    <th>Cuenta CoNC</th>
                                                    <th>Número de Cuenta</th>
                                                    <th>Tipo de Cuenta Bancaria</th>
                                                    <th>Situacion de Fondos</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($cuentaPendientes as $item)
                                                <tr>
                                                    <td>{{$item->codigo_cuenta}}</td>
                                                    <td>{{$item->codigo_superior}}</td>
                                                    <td>{{$item->nombre_cuenta}}</td>
                                                    <td>{{$item->naturaleza}}</td>
                                                    <td>{{$item->cuenta_co_nc}}</td>
                                                    <td>{{$item->numeroCuenta}}</td>
                                                    <td>{{$item->tipoCuentaBancaria}}</td>
                                                    <td>{{$item->situacionFondos}}</td> <td>
                                                        @can('cuentasInstitucionales.edit')
                                                            <a href="{{route('cuentasInstitucionales.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
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
                </div>
            </div>
        </div>
    </div>
@endsection