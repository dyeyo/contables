@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>MACROPROCESOS BANCARIOS</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Macro Procesos Bancarios</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('macroProcesos.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="excel" class="">
                        <button class="btn btn-success" style="float: right;">Importar Datos</button>
                        <a href="{{route('macroProcesos.plantilla')}}" style="margin-right: 8px;" class="btn btn-success  float-right">
                            <i class="fa fa-download"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection