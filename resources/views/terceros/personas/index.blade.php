@extends('layouts.plantillaBase')
@section('contenido')
<!-- Page Heading -->
@include('terceros.partes.contadoresTerceros')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @can('personaJuridica.create')
                <a href="{{route('personaJuridica.create')}}" class="btn btn-success btn-circle float-right">
                    <i class="fas fa-plus"></i>
                </a>
                @endcan
                <h6 class="m-0 font-weight-bold text-primary">Personas Jurídicas</h6>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th style="width: 10%;">NIT</th>
                            <th style="width: 20%;">Razón Social</th>
                            <th style="width: 20%;">Nombre Comercial</th>
                            <th style="width: 20%;">Representante Legal</th>
                            <th style="width: 20%;">Dirección</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th style="width: 10%;">NIT</th>
                            <th style="width: 20%;">Razón Social</th>
                            <th style="width: 20%;">Nombre Comercial</th>
                            <th style="width: 20%;">Representante Legal</th>
                            <th style="width: 20%;">Dirección</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($personaJuridica as $item)
                            <tr>
                                <td style="width: 10%;">{{$item->nit .'-' .$item->dv}}</td>
                                <td style="width: 20%;">{{$item->raz_social }}</td>
                                <td style="width: 20%;">{{$item->nomComercial}}</td>
                                <td style="width: 20%;">{{$item->nombre1_rl. ' '. $item->nombre2_rl .' '. $item->apellido1_rl. ' '. $item->apellido2_rl}}</td>
                                <td style="width: 20%;">{{$item->direccion_rl}}</td>
                                <td>
                                    @can('personaJuridica.show')
                                    <a href="{{route('personaJuridica.show',$item->id)}}"><i class="fa fa-eye"></i></a>
                                    @endcan
                                    @can('personaJuridica.edit')
                                    <a href="{{route('personaJuridica.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
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