@extends('layouts.plantillaBase')
@section('contenido')
    <!-- Page Heading -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Personas Naturales</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('empresa.index')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Personas Juridicas</strong>
            </li>
        </ol>
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Todas las Personas Juridicas</h5>
                <div class="ibox-tools">
                    @can('personaJuridica.create')
                        <a href="{{route('personaJuridica.create')}}" class="btn btn-primary float-right">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a href="{{route('personaJuridica.excel')}}" style="margin-right: 8px;" class="btn btn-primary float-right">
                            <i class="fa fa-file-excel-o"></i>
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
                            <th style="width: 10%;">NIT</th>
                            <th style="width: 20%;">Razón Social</th>
                            <th style="width: 20%;">Régimen Tributario</th>
                            <th style="width: 20%;">Banco</th>
                            <th style="width: 20%;">Representante Legal</th>
                            <th style="width: 20%;">responsable IVA</th>
                            <th style="width: 20%;">Número Bancaria</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th style="width: 10%;">NIT</th>
                            <th style="width: 20%;">Razón Social</th>
                            <th style="width: 20%;">Régimen Tributario</th>
                            <th style="width: 20%;">Banco</th>
                            <th style="width: 20%;">Representante Legal</th>
                            <th style="width: 20%;">responsable IVA</th>
                            <th style="width: 20%;">Número Bancaria</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($personaJuridica as $item)
                            <tr>
                                <td style="width: 10%;">{{$item->nit}}</td>
                                <td style="width: 10%;">{{$item->raz_social}}</td>
                                <td style="width: 10%;">{{$item->nombre}}</td>
                                <td style="width: 10%;">{{$item->banco}}</td>
                                <td>{{$item->nombre1.' '.$item->nombre2.' '.$item->apellido. ' '. $item->apellido2}}</td>
                                <td style="width: 10%;">{{$item->responsableIVA}}</td>
                                <td style="width: 10%;">{{$item->numeroCuenta}}</td>
                                <td>
                                    {{--@can('personaJuridica.show')--}}
                                    {{--<a href="{{route('personaJuridica.show',$item->id)}}"><i class="fa fa-eye"></i></a>--}}
                                    {{--@endcan--}}
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