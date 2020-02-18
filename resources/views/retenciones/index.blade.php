@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Retenciones</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Retenciones</strong>

                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Todas las Retenciones</h5>
                    <div class="ibox-tools">
                        @can('retenciones.create')
                            <a href="{{route('retenciones.create')}}" class="btn btn-success" style="float: right;"><i class="fa fa-plus"></i></a>
                            <a href="{{route('exportRetencion.excel')}}" style="margin-right: 8px;" class="btn btn-primary float-right">
                                <i class="fa fa-download"></i>
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Tipó Retención</th>
                            <th>Concepto</th>
                            <th>Año</th>
                            <th>Base</th>
                            <th>Monto Minimo</th>
                            <th>Tarifa Retencion</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($retenciones as $item)
                            <tr>
                                <td>{{$item->tipoRetencion}}</td>
                                <td>{{$item->concepto}}</td>
                                <td>{{$item->anio}}</td>
                                <td style="text-align:right" >{{$item->base_inical}} - {{$item->base_final}}</td>
                                <td style="text-align:right" class="montoMinimo">{{$item->monto_minimo}}</td>
                                <td>{{$item->tarifa_retencion}}</td>
                                <td>
                                    @can('retenciones.edit')
                                        <a href="{{route('retenciones.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
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
@endsection
<script src="">
    $(".montoMinimo").load({
         function(event) {
            $(event.target).select();
         },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                return value.replace(/\D/g, "")
                    .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
            });
        }
    });

</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>