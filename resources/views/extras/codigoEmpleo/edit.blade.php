@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Configuraciones - Codigo Empleo</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{route('codigoEmpleo.index')}}">Configuraciones - Codigo Empleo</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Codigo Empleo {{$codEmpleo->codigo}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>CODIGO DE EMPLEO<small> Asegurate de que todos los campos esten bien diligenciados antes de enivar*</small></h5>
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
                    <form class="user"  action="{{route('codigoEmpleo.update',$codEmpleo->id)}}" method="post" id="terceros" name="terceros">
                        {{ method_field('put') }}
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
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
                                        <label for="">Codigo de Empleo</label>
                                        <input type="text" class="form-control form-control-user" id="codigo" name="codigo" value="{{$codEmpleo->codigo}}" placeholder="CODIGO...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nombre de Empleo</label>
                                        <input type="text" class="form-control form-control-user" id="nombreEmpleo" name="nombreEmpleo" value="{{$codEmpleo->nombreEmpleo}}" placeholder="NOMBRE...">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Nivel de Empleo</label>
                                        <select  name= "id_nivelEmpleo" id="id_nivelEmpleo" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option value="">[Nivel de Empleo]</option>
                                            @foreach($nivelEmpleo as $nivel)
                                                <option {{ old('id_nivelEmpleo', $codEmpleo->id_nivelEmpleo) == $nivel->id ? 'selected' : '' }} value="{{$nivel->id}}"> {{$nivel->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                            </div>
                        </div>
                    </form>
                    &nbsp
                    <form method="POST" id="deleteTipoDoc" style="float: inline-end; margin-right: 90%;"
                          action="{{route('codigoEmpleo.destroy',$codEmpleo->id)}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger"><i class="fas fa-times-circle"></i>ELIMINAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection