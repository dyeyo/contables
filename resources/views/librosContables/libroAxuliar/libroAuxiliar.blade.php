@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Libros Auxilares</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Libros Auxilares</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Libros Auxilares</h5>
                </div>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <form class="user"  action="{{route('librosAuxiliar.filterLibrosAuxiliar')}}" method="post" id="puc"  name="puc">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Fecha Inicial</label>
                                        <input type="date"  class="form-control" id="fechaInicial" name="fechaInicial" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Fecha de Corte</label>
                                        <input type="date"  class="form-control" id="fechaCorte" name="fechaCorte" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Cuenta Inicio</label>
                                        <select  name="pucInicial" id="pucInicial" class="puc select2 form-control custom-select" ></select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Cuentas Final</label>
                                        <select   name="pucFinal" id="pucFinal" class="pucs select2 form-control custom-select" ></select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Tercero Responsable</label>
                                        <select  name= "tercero" id="tercero" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                            <option value="">[Seleccione un Tercero]</option>
                                            @foreach($personas as $item)
                                                <option value="{{$item->id}}" {{ old('tercero') == $item->id ? 'selected' : '' }} >{{$item->numeroDocumento}} {{$item->nit}} {{$item->nombre1}} {{$item->nombre2}} {{$item->apellido}} {{$item->apellido2}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-block" >Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script  src="https://code.jquery.com/jquery-3.3.1.js"
             integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
             crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $("#pucInicial").select2({
                placeholder: "",
                ajax: {
                    url: '/puc/pucLoadAjax/',
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    //Parametros a enviar al controlador
                    data: function(params) {
                        return {
                            term: params.term
                        }
                    },
                    //Resultado que responde el controlador.
                    processResults: function(data, page) {
                        return {
                            results: data
                        }
                    }
                },
                language: {
                    noResults: function() {
                        return "No se encontraron resultados."
                    },
                    searching: function() {
                        return "Buscando..."
                    },
                    errorLoading: function() {
                        return 'Se presentó un error.';
                    },
                }
            });
            $("#pucFinal").select2({
                placeholder: "",
                ajax: {
                    url: '/puc/pucLoadAjax/',
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    //Parametros a enviar al controlador
                    data: function(params) {
                        return {
                            term: params.term
                        }
                    },
                    //Resultado que responde el controlador.
                    processResults: function(data, page) {
                        return {
                            results: data
                        }
                    }
                },
                language: {
                    noResults: function() {
                        return "No se encontraron resultados."
                    },
                    searching: function() {
                        return "Buscando..."
                    },
                    errorLoading: function() {
                        return 'Se presentó un error.';
                    },
                }
            });
        });
    </script>
@endsection