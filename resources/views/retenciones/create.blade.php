@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Retenciones</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('empresa.index')}}">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('retenciones.index')}}">Retenciones</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Crear Retencion</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>

    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="ibox-title">
                    <h5>RETENCIONES <small> Asegurate de que todos los campos esten bien diligenciados antes de enivar</small></h5>
                </div>
                    <form class="user"  action="{{route('retenciones.store')}}" method="post" id="puc"  name="puc">
                        {{csrf_field()}}
                        <div class="card shadow mb-4" id="datosBasicos" >
                            <div class="container">
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" id="eliminada" name="eliminada" value="2">
                                    <div class="col-md-6">
                                        @foreach($empresa as $e)
                                            @if ($e->marco_normativo =='EMPRESA PUBLICA' || $e->marco_normativo =='ENTIDADES DEL GOBIERNO')
                                                <label for="">Tipo de Retención</label>
                                                <select  name="tipoRetencion" id="tipoRetencion" class="selectDos form-control custom-select" >
                                                    <option value=""></option>
                                                    <option value="Retención en la Fuente" {{old('Retención en Fuente')}}>Retención en la Fuente</option>
                                                    <option value="Retención de IVA" {{old('Retención de IVA')}}>Retención de IVA</option>
                                                    <option value="Estampillas" {{old('Estampillas')}}>Estampillas</option>
                                                    <option value="Retención del ICA" {{old('Retención del ICA')}}>Retención del ICA</option>
                                                    <option value="Fondo de Seguridad" {{ old('Fondo de Seguridad') }} >Fondo de Seguridad</option>
                                                    <option value="Publicaciones" {{ old('Publicaciones') }}>Publicaciones</option>
                                                    <option value="Papeleria" {{ old('Papeleria') }}>Papeleria</option>
                                                    <option value="Descuentos Tributarios" {{ old('Descuentos Tributarios') }}>Descuentos Tributarios</option>
                                                    <option value="Descuento Nomina" {{ old('Descuento Nomina') }}>Descuento Nomina</option>
                                                    <option value="Otros" {{ old('Otros') }} > Otros</option>
                                                {{--    <option value="Otras Deducciones en Gastos">Otras Deducciones en Gastos</option>
                                                    <option value="Otros RetencionesDescuentos en Ingresos">Otros RetencionesDescuentos en Ingresos</option>
                                              --}}  </select>
                                            @elseif($e->marco_normativo =='ENTIDADES PRIVADA')
                                                <label for="">Tipo de Retención</label>
                                                <select  name="tipoRetencion" id="tipoRetencion" class="selectDos form-control custom-select" >
                                                    <option value="Retención en la Fuente" {{old('Retención en Fuente')}}>Retención en la Fuente</option>
                                                    <option value="Retención de IVA" {{old('Retención de IVA')}}>Retención de IVA</option>
                                                    <option value="Retención del ICA" {{old('Retención del ICA')}}>Retención del ICA</option>
                                                    <option value="Retención del CRE" {{old('Retención del CRE')}}>Retención del CRE</option>
                                                    <option value="Descuento en Compras" {{old('Descuento en Compras')}}>Descuento en Compras</option>
                                                    <option value="Descuento en Ventas" {{old('Descuento en Ventas')}}>Descuento en Ventas</option>
                                                    <option value="Descuento por Pronto Pago" {{old('Descuento por Pronto Pago')}}>Descuento por Pronto Pago</option>
                                                    <option value="Descuentos Sociales" {{old('Descuentos Sociales')}}>Descuentos Sociales</option>
                                                    <option value="Otros" {{ old('Otros') }} > Otros</option>
                                                </select>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Concepto</label>
                                        <input type="text"  class="form-control form-control-user"  id="concepto" name="concepto"  placeholder="Concepto...">
                                        <input type="hidden" id="transacciones_id" name="transacciones_id">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Tarifa de Retención</label>
                                        <select  name="tarifa_retencion" id="tarifa_retencion" class="select2 form-control custom-select" >
                                            <option value="">[Seleccione una Opicion ]</option>
                                            <option value="Porcentaje" {{old('Porcentaje')}}>Porcentaje</option>
                                            <option value="PorcentajeRangos" {{old('Porcentaje – Rangos')}}>Porcentaje – Rangos</option>
                                            <option value="ValorFijo" {{old('Valor Fijo')}}>Valor Fijo</option>
                                            <option value="ValorFijoRangos" {{old('Valor Fijo - Rangos')}}>Valor Fijo - Rangos</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Cuenta CGC</label>
                                        <select  name="puc_id" id="puc_id" class="puc_id select2 form-control custom-select" ></select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Tercero</label>
                                        <select  name="tercero_id" id="select2" class="selectDos form-control custom-select">
                                            @foreach($terceros as $item)
                                                <option value="{{$item->id}}" {{ old('tercero_id') == $item->id ? 'selected' : '' }} >{{$item->raz_social}} - {{$item->nombre1}} {{$item->nombre2}} {{$item->apellido}} {{$item->apellido2}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Territorialidad</label>
                                        <select  name="territorialidad" id="territorialidad" class="selectDos form-control custom-select" >
                                            <option value="">[SELECCIONES UNA OPCION]</option>
                                            <option value="Nacional" {{old('Nacional')}}>Nacional</option>
                                            <option value="Departamental" {{old('Departamental')}}>Departamental</option>
                                            <option value="Municipal" {{old('Municipal')}}>Municipal</option>
                                            <option value="Distrital" {{old('Distrital')}}>Distrital</option>
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Mecanismo</label>
                                        <select  name="mecanismo" id="mecanismo" class=" form-control custom-select" >
                                            <option value="">[SELECCIONES UNA OPCION]</option>
                                            <option value="1" {{old('Valor_antes_de_Impuesto_a_las_ventas')}}>Valor antes de Impuesto a las ventas</option>
                                            <option value="2" {{old('Valor_Total')}}>Valor total</option>
                                            <option value="3" {{old('Valor del Impuesto a las Ventas')}}>Valor del Impuesto a las Ventas</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Reporte para SIA</label>
                                        <select  name="reporte_sia" id="reporteSia" class="selectDos form-control custom-select" >
                                            <option value="">[Seleccione una Opicion ]</option>
                                            <option value="Salud" {{old('Salud')}}>Salud</option>
                                            <option value="Retencion" {{old('Retencion')}}>Retencion</option>
                                            <option value="Otros" {{old('Otros')}}>Otros</option>
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <input type="hidden"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year')}}" readonly="readonly">
                                    <div class="col-md-3">
                                        <label for="">Tarifa</label>
                                        <code>Ej: Si es 5% digite 0.05</code>
                                        <input type="text"  readonly="readonly" style="text-align:right" class="form-control form-control-user" maxlength="5" min="0" max="1" title="El limite de este campo esta entre 0.00 a 1.00"   id="porcentaje" name="porcentaje"  placeholder="0.00">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Base Inicial</label>
                                        <input type="text"  readonly="readonly" style="text-align:right" class="form-control form-control-user"   onkeyup="format(this)" onchange="format(this)" id="baseInicial" placeholder="Base Inicial...">
                                        <input type="text"  style="display: none" class="form-control form-control-user"   id="baseInicialPasa" name="base_inical">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Base Final</label>
                                        <input type="text"  readonly="readonly" style="text-align:right" class="form-control form-control-user"   onkeyup="format(this)" onchange="format(this)" id="baseFinal" placeholder="Base Final...">
                                        <input type="text"  style="display: none" class="form-control form-control-user"   id="baseFinalPasa" name="base_final">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Monto Minimo</label>
                                        <input type="text"  readonly="readonly" style="text-align:right" class="form-control form-control-user"  onkeyup="format(this)" onchange="format(this)" id="montoMinimo"  placeholder="Monto Minimo...">
                                        <input type="text"  style="display: none" class="form-control form-control-user"   id="montoMinimoPasa" name="monto_minimo">
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">IVA</label>
                                        <code>Ej: Si es 5% digite 0.05</code>
                                        <input type="text"  readonly="readonly" style="text-align:right" class="form-control form-control-user" maxlength="4" min="0" max="100" title="El limite de este campo esta entre 1 a 100"   id="iva" name="iva"  placeholder="0.00">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Valor Fijo</label>
                                        <input type="text"  readonly="readonly" style="text-align:right" class="form-control form-control-user"   onkeyup="format(this)" onchange="format(this)" id="valorFijo"  placeholder="0.00">
                                        <input type="text"  style="display: none" class="form-control form-control-user"  id="valorFijoPasa" name="valor_fijo">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Base de Calculo</label>
                                        <select  name="base_calculco" id="baseCalculo" class="selectDos form-control custom-select" >
                                            <option value="">[Seleccione una Opicion ]</option>
                                            <option value="Valor Comprobante" {{old('Valor Comprobante')}}>Valor Comprobante</option>
                                            <option value="Valor Rejistro Presupuestal" {{old('Valor Rejistro Presupuestal')}}>Valor Rejistro Presupuestal</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Ingreso</label>
                                        <label class="radio-inline">
                                            <input type="radio"  id="ingreso" name="ingreso" value="1" onchange="mostrarIngreso()" {{ old('ingreso')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="ingreso" name="ingreso" value="2" checked onchange="noMostrarIngreso()" {{ old('ingreso')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Activo</label>
                                        <label class="radio-inline">
                                            <input type="radio"  id="activo" name="activo" value="1" {{ old('activo')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="activo" name="activo" value="2"  {{ old('activo')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Automatico</label>
                                        <label class="radio-inline">
                                            <input type="radio"  id="automatico" name="automatico" value="1" {{ old('automatico')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="automatico" name="automatico" value="2"  {{ old('automatico')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                    </div>
                                </div>
                                &nbsp
                                <div id="presupuestos" style="display:none;">
                                    <div class="col-md-6">
                                        <label for="">Código Presupuesto De Ingreso</label>
                                        <input type="text"  class="form-control form-control-user" id="codigoPresupuesto" name="codigoPresupuesto"  placeholder="0.00">
                                    </div>
                                    <br>
                                    <button  type="button" class="btn btn-primary agregarPlanDebito" id="agregarPlanDebito"><i class="fa fa-plus"></i>Debito</button>
                                    <button style="float: right;" type="button" class="btn btn-primary agregarPlanCredito" id="agregarPlanCredito"><i class="fa fa-plus"></i>Credito</button>
                                    <div class="row"  id="numeroDocumentos">
                                        <div class="col-md-6" style="overflow:scroll;
                                     height: 330px;">
                                            <table id="TablaPro" class="table">
                                                <thead>
                                                <tr>
                                                    <th>CUENTA PUC</th>
                                                </tr>
                                                </thead>
                                                <tbody id="ProSelectedDebito">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6" style="overflow:scroll;
                                     height: 330px;">
                                            <table id="TablaPro" class="table">
                                                <thead>
                                                <tr>
                                                    <th>CUENTA PUC</th>
                                                </tr>
                                                </thead>
                                                <tbody id="ProSelectedCredito">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block btnEnviar" type="submit">AGREGAR</button>
                            </div>
                            &nbsp
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script>
        document.getElementById("baseInicial").addEventListener('keyup', baseInicialsinPunto);
        document.getElementById("baseFinal").addEventListener('keyup', baseFinalsinPunto);
        document.getElementById("montoMinimo").addEventListener('keyup', montoMinimosinPunto);
        document.getElementById("valorFijo").addEventListener('keyup', valorFijosinPunto);

        function mostrarIngreso(){
            document.getElementById('presupuestos').style.display ='block';
        }
        function noMostrarIngreso(){
            document.getElementById('presupuestos').style.display = 'none';
            $('#codigoPresupuesto').val('');
        }
        function baseInicialsinPunto(e) {
            var value = $(this).val();
            $("#baseFinalPasa").val(value.replace('.', '').toLowerCase());
        }
        function baseFinalsinPunto(e) {
            var value = $(this).val();
            $("#baseFinalPasa").val(value.replace('.', '').toLowerCase());
        }
        function montoMinimosinPunto(e) {
            var value = $(this).val();
            $("#montoMinimoPasa").val(value.replace('.', '').toLowerCase());
        }
        function valorFijosinPunto(e) {
            var value = $(this).val();
            $("#valorFijoPasa").val(value.replace('.', '').toLowerCase());
        }
        function format(input)
        {
            var num = input.value.replace(/\./g,'');
            if(!isNaN(num)){
                num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                num = num.split('').reverse().join('').replace(/^[\.]/,'');
                input.value = num;
            }

            else{ alert('Solo se permiten numeros');
                input.value = input.value.replace(/[^\d\.]*/g,'');
            }
        }

        $(document).ready(function() {
            $('.selectDos').select2();
            $(".puc_id").select2({
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
            var id= $(".puc_id").val()
            $.ajax({
                type: 'GET',
                url: '/puc/loadPucPrueba/'+id,
                dataType: 'json',
                success: function (data) {
                    data.forEach(element=>{
                        if (element.tipoCuenta_id===1){
                            alert('Esta cuenta es de tipo SUPERIOR por facor selecione otra')
                        }
                    });
                    ////console.log(data);
                },error:function(){
                    //console.log(data);
                }
            });
        });

        $('.agregarPlanDebito').click(function(){
            $('#ProSelectedDebito').append('<tr class="active">'+
                '<input type="hidden" name="retencion_descuentos_id[]" />'+
                '<input type="hidden" name="debito[]" value="1"/>'+
                '<input type="hidden" name="credito[]" value="2"/>'+
                '<td><select style="width: 28pc;" name="puc_id[]" id="puc_idDebito" class="selectPuc selef puc_idDebito select2"></select></td>'+
                '<td><button type="button" class="btn btn-link btn-danger remove borrar"><i class="fa fa-times"></i></button></td>'+
                '</tr>');
            $(".puc_idDebito").select2({
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
            var id= $(".puc_idDebito").val()
            $.ajax({
                type: 'GET',
                url: '/puc/loadPucPrueba/'+id,
                dataType: 'json',
                success: function (data) {
                    data.forEach(element=>{
                        if (element.tipoCuenta_id===1){
                            alert('Esta cuenta es de tipo SUPERIOR por facor selecione otra')
                        }
                    });
                    ////console.log(data);
                },error:function(){
                    //console.log(data);
                }
            });
        });

        $('.agregarPlanCredito').click(function(){
            $('#ProSelectedCredito').append('<tr class="active">'+
                '<input type="hidden" name="retencion_descuentos_id[]" />'+
                '<input type="hidden" name="credito[]" value="1"/>'+
                '<input type="hidden" name="debito[]" value="2"/>'+
                '<td><select style="width: 28pc;" name="puc_id[]" id="puc_idCredito" class="selectPuc selef puc_idCredito select2"></select></td>'+
                '<td><button type="button" class="btn btn-link btn-danger remove borrar"><i class="fa fa-times"></i></button></td>'+
                '</tr>');
            //Funcion Jquery
            $(".puc_idCredito").select2({
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
            var id= $(".puc_idCredito").val();
            $.ajax({
                type: 'GET',
                url: '/puc/loadPucPrueba/'+id,
                dataType: 'json',
                success: function (data) {
                    data.forEach(element=>{
                        if (element.tipoCuenta_id===1){
                            alert('Esta cuenta es de tipo SUPERIOR por facor selecione otra')
                        }
                    });
                    ////console.log(data);
                },error:function(){
                    //console.log(data);
                }
            });
        });
        $(function () {
            $(document).on('click', '.borrar', function (event) {
                $(this).closest('tr').remove();
            });
        });

        $( "#tarifa_retencion" ).change(function() {

            var tarifa_retencion=  $('select[name="tarifa_retencion"] option:selected').val();
            switch (tarifa_retencion) {
                case 'Porcentaje':
                    $('#valorFijo').attr('readonly',true);
                    $('#baseInicial').attr('readonly',true);
                    $('#baseFinal').attr('readonly',true);
                    $('#iva').attr('readonly',true);

                    $('#porcentaje').attr('readonly',false);
                    $('#montoMinimo').attr('readonly',false);

                    $('#baseFinal').val('');
                    $('#baseInicial').val('');
                    $('#valorFijo').val('');
                    $('#iva').val('');
                    $('#baseFinal').val('');
                    $('#porcentaje').val('');
                    $('#montoMinimo').val('');
                    break;
                case 'PorcentajeRangos':
                    $('#montoMinimo').attr('readonly',true);
                    $('#iva').attr('readonly',true);
                    $('#valorFijo').attr('readonly',true);

                    $('#porcentaje').attr('readonly',false);
                    $('#baseInicial').attr('readonly',false);
                    $('#baseFinal').attr('readonly',false);
                    $('#baseInicial').val('1');
                    $('#baseFinal').val('1');

                    $('#valorFijo').val('');
                    $('#iva').val('');
                    $('#porcentaje').val('');
                    $('#montoMinimo').val('');
                    break;
                case 'ValorFijo':
                    $('#porcentaje').attr('readonly',true);
                    $('#baseInicial').attr('readonly',true);
                    $('#iva').attr('readonly',true);
                    $('#baseFinal').attr('readonly',true);

                    $('#valorFijo').attr('readonly',false);
                    $('#montoMinimo').attr('readonly',false);

                    $('#baseFinal').val('');
                    $('#baseInicial').val('');
                    $('#valorFijo').val('');
                    $('#iva').val('');
                    $('#baseFinal').val('');
                    $('#porcentaje').val('');
                    $('#montoMinimo').val('');
                    break;
                case 'ValorFijoRangos':
                    $('#montoMinimo').attr('readonly',true);
                    $('#porcentaje').attr('readonly',true);
                    $('#iva').attr('readonly',true);

                    $('#baseInicial').attr('readonly',false);
                    $('#baseFinal').attr('readonly',false);
                    $('#valorFijo').attr('readonly',false);

                    $('#baseInicial').val('1');
                    $('#baseFinal').val('1');
                    $('#valorFijo').val('');

                    $('#iva').val('');
                    $('#porcentaje').val('');
                    $('#montoMinimo').val('');
                    break;
                default:
                    $('#porcentaje').attr('readonly',true);
                    $('#baseInicial').attr('readonly',true);
                    $('#baseFinal').attr('readonly',true);
                    $('#montoMinimo').attr('readonly',true);
                    $('#iva').attr('readonly',true);
                    $('#valorFijo').attr('readonly',true);

                    $('#baseFinal').val('');
                    $('#baseInicial').val('');
                    $('#valorFijo').val('');
                    $('#iva').val('');
                    $('#baseFinal').val('');
                    $('#porcentaje').val('');
                    $('#montoMinimo').val('');
            }
        });

    </script>
    <script>
        $(function() {
            $( "#puc" ).validate({
                rules: {
                    tipoRetencion:{
                        required: true,
                    },
                    concepto:{
                        required: true,
                    },
                    anio:{
                        digits:true,
                        maxlength:4,
                    },
                    porcentaje:{
                        number:true,
                    },
                    base:{
                        digits:true,
                        maxlength:4,
                    },
                    montoMinimo:{
                        maxlength:20,
                    },
                    iva:{
                        number:true,
                        maxlength:4,
                    },
                    puc_id:{
                        required: true,
                    }
                },
                messages: {
                    tipoRetencion:{
                        required: "Este campo es Obligatorio",
                    },
                    concepto:{
                        required: "Este campo es Obligatorio",
                    },
                    anio:{
                        digits: "Este campo solo recive digitos",
                        maxlength: "Este campo solo recive hasta 3"
                    },
                    base:{
                        digits: "Este campo solo recive digitos",
                        maxlength: "Este campo solo recive hasta 3 digitos"
                    },
                    montoMinimo:{
                        maxlength: "Este campo solo recive hasta 20 digitos"
                    },
                    iva:{
                        number: "Este campo solo recive digitos",
                        maxlength: "Este campo solo recive hasta 3 digitos"
                    },
                    puc_id:{
                        required: "Este campo es Obligatorio",
                    }
                }
            });
        });
        function todos1(){
            $('#iva').prop("disabled",true);
            $('#iva').val('');
        }
        function todos2() {
            $('#iva').prop("disabled",false);
        }
    </script>
@endsection
