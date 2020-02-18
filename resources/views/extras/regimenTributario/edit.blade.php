@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Configuraciones - Regimen Tributario</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{route('clasePersona.index')}}">Configuraciones - Regimen Tributario</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Regimen Tributario {{$regimenTrubutario->nombre}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>REGIMEN TRIBUTARIO <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar*</small></h5>
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
                    <form class="user"  action="{{route('regimenTributario.update',$regimenTrubutario->id)}}" method="post" id="terceros" name="terceros">
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
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-user" id="nombre" name="nombre" value="{{$regimenTrubutario->nombre}}" placeholder="NOMBRE...">
                                    </div>
                                </div>
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                            </div>
                        </div>
                    </form>
                    &nbsp
                    @can('regimenTributario.destroy')
                    <form method="POST" id="deleteTipoDoc"  action="{{route('regimenTributario.destroy',$regimenTrubutario->id)}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit"  class="btn btn-danger">Eliminar</button>
                    </form>
                        @endcan
                </div>
            </div>
        </div>
    </div>
    @endsection