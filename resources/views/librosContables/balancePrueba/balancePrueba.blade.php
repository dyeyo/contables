@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Dependecias</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">HOLA QUE MAS</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Balance de Prueba</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Balance de Prueba</h5>
                </div>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <form class="user"  action="{{route('balancePrueba.filterBalancePrueba')}}" method="post" id="frmBusqBalanceSheet"  name="frmBusqBalanceSheet" onsubmit="return false;">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-sm-6">
                                        {!! Form::label('optBusqNivelPucDesde', 'Nivel Desde:', array('class' => 'control-label')) !!}
                                        {!! Form::select('optBusqNivelPucDesde',  $arr_nivel_puc,0, ['id'=>'optBusqNivelPucDesde','class' => 'form-control input-sm']) !!}
                                    </div>
                                    <div class="col-sm-6">
                                        {!! Form::label('optBusqNivelPucH', 'Nivel Hasta:', array('class' => 'control-label')) !!}
                                        {!! Form::select('optBusqNivelPucH',  $arr_nivel_puc,0, ['id'=>'optBusqNivelPucH','class' => 'form-control input-sm']) !!}
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-4">

                                        {!! Form::label('optBusqYearFrom', 'Año Desde:', array('class' => 'control-label')) !!}
                                        {!! Form::select('optBusqYearFrom', $arr_years, $year, ['id'=>'optBusqYearFrom','class' => 'form-control input-sm']) !!}

                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::label('optBusqMonthFrom', 'Periodo Desde:', array('class' => 'control-label')) !!}
                                        {!! Form::select('optBusqMonthFrom',  $arr_accounting_month,$month, ['id'=>'optBusqMonthFrom','class' => 'form-control input-sm custom-select']) !!}

                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::label('optBusqMonthUntil', 'Periodo Hasta:', array('class' => 'control-label')) !!}
                                        {!! Form::select('optBusqMonthUntil',  $arr_accounting_month,$month, ['id'=>'optBusqMonthUntil','class' => 'custom-select form-control input-sm']) !!}

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::label('optSaldo', 'Mov Saldos 0:', array('class' => 'control-label')) !!}

                                        <select id="optSaldo" name="optSaldo">
                                            <option value="0">SI</option>
                                            <option value="2">NO</option>
                                        </select>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="button-group">
                                            <button type="submit" class="btn btn-info waves-effect waves-light" id="btnBusq"> <i class="fa fa-search"></i>Buscar</button>
                                            <button type="reset" class="btn waves-effect waves-light btn-light"> <i class="fa fa-eraser"></i>Limpiar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="dvActivo"></div>
                                        <div id="dvPasivo"></div>
                                        <div id="dvPatrimonio"></div>
                                        <div id="dvBalance"></div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>

                            </form>
                            <div class="box_table">
                                <div>
                                    <table id="tbBalanceSheet" name="tbBalanceSheet" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Cuenta</th>
                                            <th>Nombre</th>
                                            <th class="right">Saldo Inicial</th>
                                            <th class="right">Debitos</th>
                                            <th class="right">Creditos</th>
                                            <th class="right">Nuevo Saldo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
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
    <script  src="https://code.jquery.com/jquery-3.3.1.js"
             integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
             crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {


            vcurrent_balance=0;
            var table = tableSearch({
                id: 'tbBalanceSheet',
                type: 'GET',
                url: '/balancePrueba/reporte',
                form: 'frmBusqBalanceSheet',
                ordering: 'false',
                lengthMenu: [[-1], ["Todo"]],
                columns: [
                    {data: 'number_account', name: 'number_account', type: 'string', orderable: false},
                    {data: 'name_account', name: 'name_account', className: "text-left", orderable: false},
                    {data: 'previous_balance', name: 'previous_balance', className: "text-right", orderable: false},
                    {data: 'debit_total', name: 'debit_total', className: "text-right", orderable: false},
                    {data: 'credit_total', name: 'credit_total', className: "text-right", orderable: false},
                    {data: 'current_balance', name: 'current_balance'  ,className: "text-right",orderable:false}
                ],
                createdRow: function (row, data) {
                    var styleTd = 'background-color:' + data.code_color + ';' + ((data.bold === 't') ? 'font-weight: bold;' : '');
                    $('td', row).attr('style', styleTd);
                    if(data.number_account == '1' || data.number_account == '2' || data.number_account == '3')
                        equation(data.number_account, data.current_balance);
                }
            });
            table.columns.adjust().draw();

            function equation(account, balance)
            {
                if(account == '1')
                {
                    active = parseFloat(balance);
                    $('#dvActivo').html('<b style="color:green;font-size:20px;">ACTIVO: '+numberFormat(parseFloat(balance),2,'.',',')+'</b>');
                }
                else if(account == '2')
                {
                    $('#dvPasivo').html('<b style="color:green;font-size:20px;">PASIVO: '+numberFormat(parseFloat(balance),2,'.',',')+'</b>');
                    vcurrent_balance = parseFloat(vcurrent_balance) + parseFloat(balance);
                }
                else
                {
                    vcurrent_balance = parseFloat(vcurrent_balance) + parseFloat(balance);
                    $('#dvPatrimonio').html('<b style="color:green;font-size:20px;">PATRIMONIO: '+numberFormat(parseFloat(balance),2,'.',',')+'</b>');
                    $('#dvBalance').html('<b style="color:red;font-size:20px;">ACTIVO - (PASIVO + PATRIMONIO): '+numberFormat((parseFloat(active) - parseFloat(vcurrent_balance)),2,'.',',')+'</b>');
                    active = 0;
                    vcurrent_balance = 0;
                }
            }


        });


    </script>
@endsection
