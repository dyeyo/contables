@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Configuraciones - Bienes y Servicios</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('bienes.index')}}">Configuraciones - Bienes y Servicios</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar Bienes y Servicios {{$bienes->nombreBien}}</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>BIENES Y SERVICIOS <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar*</small></h5>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Nombre del Bien</label>
                                        <input type="text" class="form-control form-control-user" id="nombreBien" name="nombreBien" value="{{$bienes->nombreBien}}" placeholder="NOMBRE...">
                                    </div>
                                </div>
                                &nbsp
                                <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>

                            </div>
                        </div>
                    </form>
                    &nbsp
                    @can('bienes.destroy')
                        <form method="POST" id="deleteTipoDoc" style="float: inline-end; margin-right: 90%;"
                              action="{{route('bienes.destroy',$bienes->id)}}">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger"><i class="fas fa-times-circle"></i>ELIMINAR</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    @endsection