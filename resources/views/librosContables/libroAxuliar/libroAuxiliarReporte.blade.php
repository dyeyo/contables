<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>COTA_XL</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700');
        body
        {
            font-family: 'Montserrat', sans-serif;
            font-size: 10pt;
            background-color: #F1F1F1;
            margin: 0;
            padding: 0.8rem !important;
            color: #929497;
            margin-right: 2cm;
            margin-left: 3cm;
        }
        table{
            padding: 0;
            margin: 0;
            width: 55%;
            border-radius: 4px;
        }
        span{
            font-weight: normal;
            color: #000000;
        }
        .hr{
            border: none;
            height: 1px;
            background-color: #E9E9E9;
        }
        .w80{
            margin: auto;
            width: 97%;
            padding: 0;
        }
        .all{
            height: 97%;
            border: 1px solid #E9E9E9;
            background: #ffffff;
        }
        .text-center{
            text-align: center;
        }
        .logo{
            width: 200px;
        }
        .bill-table{
            border-collapse: collapse;
            width: 168%;
            margin-left: -78%;
            padding: 0;
        }
        .bill-table td{
            padding-bottom: 0.8rem;
            padding-top: 0.8rem;
            padding-left: 1.8rem;
        }
        .bill-title{
            letter-spacing: 10.4pt;
            font-size: 12pt;
        }
        .noPadding td{
            border-top: 1px solid #ffffff;
            padding-left:  0;
        }
        .fz11{
            margin: 0;
            padding: 0;
            font-size: 11pt;
        }
        .clientDates{
            font-weight: 300;
            padding-right: 1rem;
            line-height: 1.5rem;
        }
        .normal{
            font-weight: 400;
        }
        .bg-blue td{
            padding: 1rem !important;
            background-color: #F2F8F9 ;
            vertical-align: middle;
        }
        .info-products{
            margin-top: 0.5rem;
            padding: 1rem;
            background-color: #F2F8F9;
            border-radius: 4px;
        }
        .days-container{
            vertical-align: top;
        }
        .precio-day-container,
        .precio-total-container, .precio-transporte-container, .precio-totalGen-container{
            padding: 1rem 0 1rem 0;
            vertical-align: top;
        }
        .table-details-days{
            color: #000000;
            padding: 0.5rem 0 0.5rem 0;
        }
        .table-details-days td span{
            color: #BB0034;
        }
        .more-detail-container a{
            color: #27AAE1;
            text-decoration: none;
        }
        .totals tr td{
            padding: 0.3rem;
        }
        .number span{
            color: #BB0034;
        }
        @page {
            margin: 0;
        }
        .logocontainer{
            width: 60%;
        }
        .text-center{
            text-align: center !important;
        }
        .bill-table td{
            margin-left: 0;
            text-align: center !important;
        }
        .imagenMaquina{
            width: auto;
            background-image: url("../../../public/images/1557418629Seven-Deadly-Sins-Portada-750x450.jpg");
            max-height: 105.4px;
            border-radius: 4px;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body >
<div class="all">
    <table class="">
        <tr>
            <td>
                <table class="">
                    <tr>
                        <td>
                            <?php $nombreEmpresa= \Illuminate\Support\Facades\DB::table('empresas')->select('nombre')->first(); ?>
                            <h3 >{{$nombreEmpresa->nombre}}</h3>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr class="w80  hr">
    @foreach($reporte as  $repo)
        @foreach($repo->plantilaContable as  $plan)
            @foreach($puc_list as  $puc)
                @if($puc->id == $plan->puc_id)
                @endif
            @endforeach
        @endforeach
        <span>FECHA INICIAL: {{$fechaInicial}} - FECHA FINAL: {{$fechaFinal}} </span>
        <table class="table w-100 table-bordered">
            <thead>
            <tr>
                <th class="text-md-center">Fecha </th>
                <th class="text-md-center">N° documento</th>
                <th class="text-md-center">Codigo/Nombre Cuenta</th>
                <th class="text-md-center">Tercero</th>
                <th class="text-md-center">Detalle</th>
                <th class="text-md-center">Cheque/REF</th>
                <th class="text-md-center">Debito</th>
                <th class="text-md-center">Credito</th>
                <th class="text-md-center">Saldo</th>
            </tr>
            <tr>
                <th class="text-md-right" colspan="8" >Saldo Inical</th>
                <th class="text-md-right">{{$repo->total_debito}}</th>
            </tr>
            </thead>
            <tbody>

            @foreach($repo->plantilaContable as  $plan)
                <tr>
                    <td class="text-md-center">{{$plan->fecha_movimiento}}</td>
                    <td class="text-md-center">{{$puc->codigo_cuenta}} - {{$puc->nombre_cuenta}}</td>
                    <td class="text-md-center">{{$repo->numero_doc}}</td>
                    <td class="text-md-center">{{$plan->tercero_plantilla}} </td>
                    <td class="text-md-center">{{$repo->detalle}}</td>
                    <td class="text-md-center">{{$plan->docReferencia}}</td>
                    <td class="text-md-center">{{$plan->debito}}</td>
                    <td class="text-md-center">{{$plan->credito}}</td>
                    <td class="text-md-center"></td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  class="text-md-center">Total de Movimientos </td>
                <td  class="totalDebito"></td>
                <td  class="totalCredito"></td>
                <td  class="text-md-center"></td>

            </tr>
            </tbody>
        </table>
    @endforeach
    <br>
</div>
</body>
</html>