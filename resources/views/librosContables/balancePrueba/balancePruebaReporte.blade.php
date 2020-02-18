@extends('layouts.plantillaBase')
@section('contenido')
<div class="row"  id="">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-bordered" id="dataTableSelect" width="100%"
                       cellspacing="0">
                    <thead>
                        <tr class="bg-blue">
                            <th >Consulta</th>
                            <th >Cod. Pptal</th>
                            <th >Nombre de Cuenta</th>
                            <th >Nivel</th>
                            <th >Tipo</th>
                            <th >Debito</th>
                            <th >Credito</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-blue">
                            <th>Consulta</th>
                            <th>Cod. Pptal</th>
                            <th>Nombre de Cuenta</th>
                            <th>Nivel</th>
                            <th>Tipo</th>
                            <th>Debito</th>
                            <th>Credito</th>
                        </tr>
                    </tfoot>
                        <tbody>
                        @foreach($reporte as $item)
                            <tr class="bg-blue">
                                <th ><span></span></th>
                                <th ><span>{{$item->codigoCuenta}}</span></th>
                                <th ><span>{{$item->nombreCuenta}}</span></th>
                                <th ><span>{{$item->tipoCuenta_id}}</span></th>
                                <th ><span>{{$item->nivel == 1 ? 'S' : 'D'}}</span></th>
                                <th ><span>{{$item->debito}}</span></th>
                                <th ><span>{{$item->credito}}</span></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
