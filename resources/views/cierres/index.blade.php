@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Cierres</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Cierres</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{route('cierres.create')}}" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i></a>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 6%;">Año</th>
                                <th style="width: 7%;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cierres as $item)
                                <tr>
                                    <td style="width: 5%;">{{$item->id}}</td>
                                    <td style="width: 6%;">{{$item->anio}}</td>
                                    <td style="width: 7%;">
                                        @can('cierres.edit')
                                            <a href="{{route('cierres.edit',$item->id)}}" class="btn  btn-sm"><i class="fa fa-edit"></i></a>
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
                &nbsp
            </div>
            &nbsp
        </div>
    </div>
</div>
<div class="modal fade odal-open" id="crear" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CIERRE</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <button style="margin-top: -43px;float: right;" type="button" class="btn btn-primary agregarConcepto" id="agregarConcepto"><i class="fa fa-plus"></i></button>
                <div class="row"  id="numeroDocumentos">
                    <div class="col-md-12" style="overflow:scroll;
                                         height: 330px;">
                        <table id="TablaPro" class="table">
                            <form action="{{route('cierres.store')}}" method="post" id="crearBienes" name="crearBienes">
                                {{csrf_field()}}
                            <tbody id="concepto">
                                <td>
                                    <label for="">Año</label>
                                    <input type="text" class="form-control form-control-user" id="anio" name="anio"  placeholder="Año...">
                                    <input type="hidden" name="cierres_id[]"/>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit"> <i class="fa fa-check"></i> Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>
    <script  src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function() {
            $('.select2').select2();
        });
</script>
<script>
    $('#agregarConcepto').click(function(){
        console.log('ddd')
        $('#concepto').append(
            '<tr class="active">' +
            '<td>'+
            '<select  name="nombreConcepto[]" id="nombreConcepto" class="select2 form-control custom-select" >' +
            '  <option value="Ingreso">Ingreso</option>' +
            '  <option value="Gastos">Gastos</option>' +
            '  <option value="Costo">Costo</option>' +
            '  <option value="Utilidades">Utilidades</option>' +
            '  <option value="Perdida">Perdida</option>' +
            '</select></td>' +
            '<input type="hidden" name="cierres_id[]"/>' +
            '<td>'+'' +
            '<select name= "puc_id[]" id="puc_id" class="select2 form-control custom-select">'+
            '<option value="" >[Seleccione una Cuenta]</option>'+
            '    @foreach($puc as $item)'+
            '<option value="{{$item->id}}" {{ old('puc_id') == $item->id ? 'selected' : '' }} >{{$item->codigoCuenta }}</option>'+
            '   @endforeach'+
            '</select></td>'+
            '</tr>');

    });
</script>
@endsection
