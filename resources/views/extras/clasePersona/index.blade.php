@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Configuraciones - Clase Persona</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Configuraciones - Clase Persona</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Todos las Clase Persona</h5>
                    <div class="ibox-tools">
                        @can('clasePersona.create')
                            <a class="btn btn-primary float-right" href="#crear"  data-toggle="modal">
                                <i class="fas fa-plus "></i>
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
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            </tfoot>
                            <tbody id="datos">
                            @foreach($clasePersona  as $item)
                                <tr>
                                    <td>{{$item->nombre}}</td>
                                    <td>
                                        @can('clasePersona.edit')
                                        <a href="{{route('clasePersona.edit',$item->id)}}"><i
                                            class="fa fa-edit" aria-hidden="true"></i></a>
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
    <div class="modal fade odal-open" id="crear" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR CLASE DE PERSONA</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" method="post" id="crearTipoPersona" name="crearTipoPersona">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-user" id="nombre" name="nombre"  placeholder="NOMBRE...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" onclick="crearTipoPersonas()"> <i class="fa fa-check"></i> Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--EDITAR
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Actualizar Genero</h4>
          </div>
            <div class="modal-body">
                <form action="javascript:void(0)" method="post" id="editDoc" name="editDoc">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-user" id="codigo" name="codigo"  placeholder="CODIGO...">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-user"  id="nombre" name="nombre"  placeholder="NOMBRE...">
                        </div>
                        <input type="hidden" id="id">

                    </div>
                </form>
            </div>
          </div>
          <div class="modal-footer">
           </div>
        </div>
      </div>
    </div>--}}
@endsection()