@extends('layouts.plantillaBase')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{--<a href="{{route('transaccion.listaPlantillas')}}" class="btn btn-success" style="float: right;margin-right: 5px;">Plantillas<i class="fa fa-paperclip"></i></a>--}}
                <h5 class="m-0 font-weight-bold text-primary">Soporte Contables desde {{$inicio}} hasta {{$fin}}</h5>
            </div>
            &nbsp
            <div class="container-fluid">
                <div class="accordion" id="accordionExample">
                    <div class="card">

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTableSelect" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Numero Doc</th>
                                            <th>Fecha</th>
                                            <th>Tercero</th>
                                            <th>Soporte</th>
                                            <th>Tipo Presupuesto</th>
                                            <th>Valor de la Transacción</th>
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
                                        </tfoot>
                                        <tbody>
                                        @foreach($datos as $item)
                                            <tr>
                                                <td>{{$item->numeroDoc}}</td>
                                                <td>{{$item->anio.'/'.$item->mes.'/'.$item->dia}}</td>
                                                <td>{{$item->nombre1.' '.$item->nombre2.' '.$item->apellido.' '.$item->apellido2}}</td>
                                                <td>{{$item->nombreSoporte}}</td>
                                                <td>{{$item->nombrePresupuesto}}</td>
                                                <td>{{$item->valortransaccion }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                &nbsp
            </div>
            &nbsp
        </div>
    </div>
</div>
@endsection
