@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Configuraciones - Roles y Permisos</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Configuraciones - Roles y Permisos</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Todos los Roles y Permisos</h5>
                    <div class="ibox-tools">
                        @can('tipoDocumento.create')
                            <a href="{{route('roles.create')}}" class="btn btn-primary float-right">
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
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>URL Amigable</th>
                        @can('roles.edit')
                            <th></th>
                        @endcan
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>URL Amigable</th>
                        @can('roles.edit')
                            <th></th>
                        @endcan
                    </tr>
                    </tfoot>
                    <tbody id="datos">
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>{{ $role->slug }}</td>
                            @can('roles.edit')
                            <td>
                                <a href="{{ route('roles.edit', $role->id) }}"
                                class="btn btn-sm btn-default">
                                    <i
                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                </a>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $roles->render() }}
            </div>
        </div>
    </div>
        </div>
    </div>

@endsection