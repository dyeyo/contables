@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Configuraciones - Tipo de Documentos</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{route('tipoDocumento.index')}}">Configuraciones - Tipo de Documentos</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Tipo de Documento {{$tipoDoc->codigo}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>TIPO DE DOCUMENTO <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar*</small></h5>
                </div>
                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-warning">{{ Session::get('message') }}</div>
                @endif
                <div class="card-body">
                    <form class="user"  action="{{route('tipoDocumento.update',$tipoDoc->id)}}" method="post" id="terceros" name="terceros">
                        {{ method_field('put') }}
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            &nbsp
                            <div class="container">
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            @if (Session::has('message'))
                                <div class="alert alert-warning">{{ Session::get('message') }}</div>
                            @endif
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Codigo de Documento</label>
                                        <input type="text" class="form-control form-control-user" id="codigo" name="codigo" value="{{$tipoDoc->codigo}}" placeholder="NOMBRE...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nombre Documento</label>
                                        <input type="text" class="form-control form-control-user" id="nombreDocumento" name="nombreDocumento" value="{{$tipoDoc->nombreDocumento}}" placeholder="NOMBRE...">
                                    </div>
                                </div>
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                            </div>
                        </div>
                    </form>
                    &nbsp
                    @can('tipoDocumento.destroy')
                    <form method="POST" id="deleteTipoDoc"
                          action="{{route('tipoDocumento.destroy',$tipoDoc->id)}}" >
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger "><i class="fas fa-times-circle"></i>ELIMINAR</button>
                    </form>
                        @endcan
                </div>
            </div>
        </div>
    </div>
    @endsection