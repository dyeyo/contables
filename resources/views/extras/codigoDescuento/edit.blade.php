@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="user"  action="{{route('bienes.update',$bienes->id)}}" method="post" id="terceros" name="terceros">
                        {{ method_field('put') }}
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">EDITAR BIENES Y SERVICIOS</h6>
                            </div>
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