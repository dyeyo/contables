@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Usuarios</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong><a href="{{route('users.index')}}">Usuarios</a></strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Todos los Usuarios</h5>
                    <div class="ibox-tools">
                        @can('users.create')
                            <a href="{{route('users.create')}}" class="btn btn-primary float-right">
                                <i class="fa fa-plus"></i>
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
                            <th>Identificador</th>
                            <th>Correo</th>
                            @can('users.edit')
                            <th></th>
                                @endcan
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Identificador</th>
                            <th>Correo</th>
                            @can('users.edit')
                            <th></th>
                                @endcan
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->email}}</td>
                                @can('users.edit')
                                <td>
                                    <a href="{{route('users.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                                </td>
                                    @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<script !src="">
    $(document).ready(function() {
        $("input[type=radio]").click(function(event){
            var valor = $(event.target).val();
            if(valor =="1"){
                $("#perNaturales").hide();
                $("#perEmpleado").show();
                $("#datosExtras").show();
            } else if (valor == "2") {
                $("#perNaturales").show();
                $("#perEmpleado").hide();
                $("#datosExtras").show();
            } else {
                // Otra cosa
            }
        });
    });


</script>