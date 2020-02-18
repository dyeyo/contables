@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Plan Unico de Cuentas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Catalogo Presupuestal</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('puc.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="excel" class="">
                        <button class="btn btn-success" style="float: right;">Importar Datos</button>
                        <a href="{{route('puc.plantilla')}}" style="margin-right: 8px;" class="btn btn-success  float-right">
                            <i class="fa fa-download"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{route('puc.excel')}}" style="margin-right: 8px;" class="btn btn-primary float-right">
                        <i class="fa fa-file-excel-o"></i>
                    </a>
                </div>
                @if (Session::has('email'))
                    <div class="alert alert-danger">{{ Session::get('email') }}</div>
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="card-body" id="app">
                    <busca-cuenta></busca-cuenta>
                    <br>
                    @foreach($puc as $itemCuenta)
                        <puc
                                :cuenta="{{$itemCuenta->toJson()}}"
                                :edit="{{auth()->user()->can('puc.edit')}}"
                                :create="{{auth()->user()->can('puc.create')}}">
                        </puc>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
@endsection