@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="card shadow mb-4" id="datosBasicos" >
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Crear Retención</h6>
                        </div>
                        &nbsp
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
                        <form class="user"  action="{{route('descuentos.update', $descuento->id)}}" method="post" id="puc"  name="puc">
                            {{ method_field('put') }}
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Año</label>
                                        <input type="text"  class="form-control form-control-user"  id="anio" name="anio"  value="{{$descuento->anio}}" readonly="readonly">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Codigo</label>
                                        <select  name= "codigo_id" id="codigo_id" class="select2 form-control custom-select" >
                                            @foreach($codigo as $item)
                                                <option {{ old('codigo_id', $descuento->codigo_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->codigo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Concepto</label>
                                        <input type="text"  class="form-control form-control-user"  id="concepto" name="concepto"  value="{{$descuento->concepto}}" placeholder="Concepto...">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Porcentaje</label>
                                        <input type="text"  class="form-control form-control-user"  id="porcentaje" name="porcentaje"  value="{{$descuento->porcentaje}}" placeholder="0.00">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Valor Base</label>
                                        <input type="text"  class="form-control form-control-user"  id="base" name="base"  value="{{$descuento->base}}" placeholder="0.00">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Cuenta CGC</label>
                                        <select  name= "puc_id" id="puc_id" class="select2 form-control custom-select" >
                                            <option value="" >[Seleccione una Cuenta]</option>
                                            @foreach($puc as $item)
                                                {{ $style = $item->tipoCuenta_id == 2 ? '' :  'disabled="disabled"' }}
                                                <option   {{ $style }} {{old('puc_id', $descuento->puc_id) == $item->id ? 'selected' : '' }} value="{{$item->id}}">
                                                    {{$item->codigoCuenta}} - {{$item->nombreCuenta}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                &nbsp
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-top: 40px;">
                                            <label for="">Automatico</label>
                                            <label class="radio-">
                                                <input  type="radio"  id="automatico"  name="automatico" value="SI"  {{ $descuento->automatico=="SI" ? 'checked=':''. old('automatico')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                            <label class="radio-">
                                                <input type="radio" id="automatico" name="automatico"  value="NO" {{ $descuento->automatico=="NO" ? 'checked=':''. old('automatico')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-top: 40px;">
                                            <label for="">Activo</label>
                                            <label class="radio-inline">
                                                <input type="radio"  id="activo"  name="activo" value="SI"  {{ $descuento->activo=="SI" ? 'checked=':''. old('activo')=="SI" ? 'checked='.'"'.'checked'.'"' : '' }}>SI</label>
                                            <label class="radio-inline">
                                                <input type="radio" id="activo" name="activo"  value="NO" {{ $descuento->activo=="NO" ? 'checked=':''. old('activo')=="NO" ? 'checked='.'"'.'checked'.'"' : '' }}>NO</label>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <button class="btn btn-primary btn-user btn-block" type="submit">EDITAR</button>
                            </div>
                            &nbsp
                    </form>
                    @can('descuentos.destroy')
                        <form method="POST" id="deleteTipoDoc"
                              action="{{route('descuentos.destroy',$descuento->id)}}">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger btnEnviar" style="width: 20%;margin-left: 80%;">ELIMINAR</button>
                        </form>
                    @endcan

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            var disabledResults = $(".select2");
            disabledResults.select2();
            /*$( "#puc_id" ).change(function() {
                var tipoCuenta=  $('select[name="puc_id"] option:selected').text();
                var cadena=tipoCuenta.indexOf('DETALLE')
                if (cadena == -1){
                    alert('Esta cuenta es de tipo Superior, no puede ser elejida');
                    $('.btnEnviar').attr('disabled',true)
                }else {
                    $('.btnEnviar').attr('disabled',false)
                }
                //console.log(tipoCuenta);
            });*/
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
                        maxlength:4,
                    },
                    base:{
                        number:true,
                        maxlength:4,
                    },
                    montoMinimo:{
                        digits:true,
                        maxlength:20,
                    },
                    iva:{
                        number:true,
                        maxlength:4,
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
                    porcentaje:{
                        number: "Este campo solo recive digitos",
                        maxlength: "Este campo solo recive digitos de 0.01 a 100"
                    },
                    base:{
                        number: "Este campo solo recive digitos",
                        maxlength: "Este campo solo recive digitos de 0.01 a 100"
                    },
                    montoMinimo:{
                        digits: "Este campo solo recive digitos",
                        maxlength: "Este campo solo recive hasta 20 digitos"
                    },
                    iva:{
                        number: "Este campo solo recive digitos",
                        maxlength: "Este campo solo recive hasta 3 digitos"
                    }
                }
            });
        });


    </script>
@endsection
