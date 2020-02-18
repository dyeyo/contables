@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Transacciones</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Transacciones </strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        @can('transaccion.create')
                            <a href="{{route('transaccion.create')}}" class="btn btn-primary float-right">
                                <i class="fa fa-plus"></i>
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('messageMalo'))
        <div class="alert alert-danger">{{ Session::get('messageMalo') }}</div>
    @endif
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a class="nav-link active" data-toggle="tab" href="#tab-1">Transacciones Contabilizadas</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#tab-2">Transacciones sin Contabilizar</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#tab-3">Transacciones Plantillas</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" id="tab-1" class="tab-pane active">
                        <div class="panel-body">

                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Numero Doc</th>
                                    <th>Fecha</th>
                                    <th>Tercero</th>
                                    <th>Soporte</th>
                                    <th>Tipo Presupuesto</th>
                                    <th>Valor de la Transacción</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Numero Doc</th>
                                    <th>Fecha</th>
                                    <th>Tercero</th>
                                    <th>Soporte</th>
                                    <th>Tipo Presupuesto</th>
                                    <th>Valor de la Transacción</th>
                                    {{--<th></th>--}}
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($trasacciones as $item)
                                    <tr>
                                        <td>{{$item->numero_doc}}</td>
                                        <td>{{$item->anio.'/'.$item->mes.'/'.$item->dia}}</td>
                                        <td>{{$item->nombre1.' '.$item->nombre2.' '.$item->apellido.' '.$item->apellido2}}</td>
                                        <td>{{$item->nombreSoporte}}</td>
                                        <td>{{$item->nombrePresupuesto}}</td>
                                        <td style="text-align:right" >{{$item->valor_transaccion }}</td>
                                        {{--<td>
                                            @can('transaccion.edit')
                                                <a  title="EDITAR" href="{{route('transaccion.edit',$item->id)}}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan
                                        </td>--}}
                                        <td>
                                            @can('transaccion.duplicate')
                                                <a  title="DUPLICAR" href="{{route('transaccion.duplicate',$item->id)}}" class="btn btn-sm"><i class="fa fa-clone"></i></a>
                                            @endcan
                                        </td>
                                        <td>
                                            <a  title="IMPRIMIR" href="{{route('transaccion.printTrans',$item->id)}}" class="btn btn-sm"><i class="fa fa-print"></i></a>
                                        </td>
                                        <td style="width: 10px">
                                            @can('transaccion.anularTransaccion')
                                                <form method="POST" id="deleteRetencion"
                                                      action="{{route('transaccion.anularTransaccion',$item->id)}}">
                                                    <input type="hidden" name="est_transaccion_id" value="3">
                                                    {{method_field('PUT')}}
                                                    {{csrf_field()}}
                                                    <button type="submit"  onclick="return confirm('¿Esta seguro de eliminar este registro?')" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
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
                                    <th>Numero Doc</th>
                                    <th>Fecha</th>
                                    <th>Tercero</th>
                                    <th>Soporte</th>
                                    <th>Tipo Presupuesto</th>
                                    <th>Valor de la Transacción</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Numero Doc</th>
                                    <th>Fecha</th>
                                    <th>Tercero</th>
                                    <th>Soporte</th>
                                    <th>Tipo Presupuesto</th>
                                    <th>Valor de la Transacción</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($trasaccionesErronea as $item)
                                    <tr>
                                        <td>{{$item->numero_doc}}</td>
                                        <td>{{$item->anio.'/'.$item->mes.'/'.$item->dia}}</td>
                                        <td>{{$item->nombre1.' '.$item->nombre2.' '.$item->apellido.' '.$item->apellido2}}</td>
                                        <td>{{$item->nombreSoporte}}</td>
                                        <td>{{$item->nombrePresupuesto}}</td>
                                        <td style="text-align:right" >{{$item->valor_transaccion }}</td>
                                        <td>
                                            @can('transaccion.edit')
                                                <a  title="EDITAR" href="{{route('transaccion.edit',$item->id)}}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('transaccion.duplicate')
                                                <a  title="DUPLICAR" href="{{route('transaccion.duplicate',$item->id)}}" class="btn btn-sm"><i class="fa fa-clone"></i></a>
                                            @endcan
                                        </td>
                                        <td>
                                            <a  title="IMPRIMIR" href="{{route('transaccion.printTrans',$item->id)}}" class="btn btn-sm"><i class="fa fa-print"></i></a>
                                        </td>
                                        <td style="width: 10px">
                                            @can('transaccion.anularTransaccion')
                                                <form method="POST" id="deleteRetencion"
                                                      action="{{route('transaccion.anularTransaccion',$item->id)}}">
                                                    <input type="hidden" name="est_transaccion_id" value="3">
                                                    {{method_field('PUT')}}
                                                    {{csrf_field()}}
                                                    <button type="submit"  onclick="return confirm('¿Esta seguro de eliminar este registro?')" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" id="tab-3" class="tab-pane">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th style="width: 100px">Numero Doc</th>
                                    <th>Nombre de la Plantilla</th>
                                    <th style="width: 15%;">Fecha</th>
                                    <th style="width: 15%">Valor de la Transacción</th>
                                    <th style="width: 10px"></th>
                                    <th style="width: 10px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trasaccionesPlantilla as $item)
                                    <tr>
                                        <td style="width: 100px">{{$item->numero_doc}}</td>
                                        <td>{{$item->nombre_plantilla}}</td>
                                        <td style="width: 15%;">{{$item->fecha_movimiento}}</td>
                                        <td style="width: 80px; text-align:right" >{{$item->valor_transaccion}}</td>
                                        <td style="width: 10px">
                                            @can('transaccion.edit')
                                                <a href="{{route('transaccion.edit',$item->id)}}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan
                                        </td>
                                        <td style="width: 10px">
                                            @can('transaccion.anularTransaccion')
                                                <form method="POST" id="deleteRetencion"
                                                      action="{{route('transaccion.anularTransaccion',$item->id)}}">
                                                    {{method_field('PUT')}}
                                                    {{csrf_field()}}
                                                    <button type="submit"  onclick="return confirm('¿Esta seguro de eliminar este registro?')" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
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

@endsection
