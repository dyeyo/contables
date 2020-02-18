@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    @can('descuentos.create')
                        <a href="{{route('descuentos.create')}}" class="btn btn-success btn-circle float-right">
                            <i class="fas fa-plus"></i>
                        </a>
                    @endcan
                    <h6 class="m-0 font-weight-bold text-primary">Descuentos</h6>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Año</th>
                            <th>Codigo</th>
                            <th>Concepto</th>
                            <th>PUC</th>
                            <th>Automatico</th>
                            <th>Porcentaje</th>
                            <th>Base</th>
                            <th>Activo</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Año</th>
                            <th>Codigo</th>
                            <th>Concepto</th>
                            <th>PUC</th>
                            <th>Automatico</th>
                            <th>Porcentaje</th>
                            <th>Base</th>
                            <th>Activo</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($descuento as $item)
                            <tr>
                                <td>{{$item->anio}}</td>
                                <td>{{$item->codigo}}</td>
                                <td>{{$item->concepto}}</td>
                                <td>{{$item->codigoCuenta}}</td>
                                <td>{{$item->automatico}}</td>
                                <td>{{$item->porcentaje}}</td>
                                <td>{{$item->base}}</td>
                                <td>{{$item->activo}}</td>
                                <td>
                                    @can('descuentos.index')
                                        <a href="{{route('descuentos.edit',$item->id)}}"><i class="fa fa-edit"></i><a>
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

@endsection