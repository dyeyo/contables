@extends('layouts.plantillaBase')
@section('contenido')
    <div class="row"  id="">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
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
                    <form action="{{route('cierres.store')}}" method="post" id="crearBienes" name="crearBienes">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Año</label>
                                <input type="text"  class="form-control form-control-user"  id="anio" name="anio"  value="{{session('year')}}" readonly="readonly">
                                <input type="hidden" name="cierres_id[]"/>
                            </div>
                        </div>
                        &nbsp
                        <button style="margin-top: -43px;float: right;" type="button" class="btn btn-primary agregarConcepto" id="agregarConcepto"><i class="fa fa-plus"></i></button>
                        <div class="row"  id="numeroDocumentos">
                            <div class="col-md-12" style="overflow:scroll;
                                         height: 330px;">
                                <table id="TablaPro" class="table">
                                    <tbody id="concepto">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        &nbsp
                        <button class="btn btn-primary btn-user btn-block btnEnviar" type="submit">AGREGAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

    <script !src="">
        var i = 0;
        $('#agregarConcepto').click(function(){

            if (i < 4) { /*Cambiar el >= 0 por < 10 si quieres limitar el incremento*/
                i++;
            }else{
                $('.agregarConcepto').attr('disabled',true);

            }

            $('#concepto').append(
                '<tr class="active">' +
                '<td>'+
                '<select  name="nombreConcepto[]" id="nombreConcepto" class="select2 form-control custom-select" >' +
                '  <option value="Ingresos">Ingresos</option>' +
                '  <option value="Gastos">Gastos</option>' +
                '  <option value="Costo">Costo</option>' +
                '  <option value="Utilidad">Utilidad</option>' +
                '  <option value="Pérdida">Pérdida</option>' +
                '</select></td>' +
                '<input type="hidden" name="cierres_id[]"/>' +
                '<td>' +
                '<select style="width: 60pc;" name="puc_id[]" id="puc_id" class="select2 form-control custom-select puc_id" >'+
                '</select></td>'+
                '</tr>');

            var disabledResults = $(".select2");
            disabledResults.select2();
            //Funcion Jquery
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

            $( ".puc_id" ).change(function() {
                var id= $("#puc_id").val()
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
                        //console.log(data);
                    },error:function(){
                        console.log(data);
                    }
                });
            });


        });
    </script>


@endsection
