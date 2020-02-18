function municipios() {
    var departament = $("#idDepartamento").val();
    if (departament != -1) {
        $.getJSON(route('loadCiudades', {id: departament}), function (data) {
            var html_selct = '<option value="2">[Seleccione un Municipio]</option>';
            for (var i = 0; i < data.length; ++i) {
                html_selct += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                $('#ciudad_id').html(html_selct);
            }
        })
    } else {
        $('#ciudad_id').html('<option value="2">[Seleccione un Municipio]</option>');
    }
}

function tipoPresupuesto() {
    var presupuesto = $("#comprobante_id").val();
    if (presupuesto != '') {
        $.getJSON(route('loadTipoPresupuesto', {id: presupuesto}), function (data) {
            var html_selct = '<option value="">[Seleccione una Opción]</option>';
            for (var i = 0; i < data.length; ++i) {
                var activarDescuento = data[i].activarDescuentos;
                html_selct += '<option value="' + data[i].id + '">' + data[i].nombrePresupuesto + '</option>';
                $('#tipoPresupuesto_id').html(html_selct);

                if (activarDescuento==='SI'){
                    $('.botonesDesRet').attr('disabled', false);
                }else{
                    $('.botonesDesRet').attr('disabled', true);
                }
            }
        })
    } else {
        $('#tipoPresupuesto_id').html('<option value="-1">[Seleccione una Opción]</option>');
    }
}

function niif() {
    var puc = $(".puc_idD").val();
    console.log(puc)

    if (puc) {
        $.getJSON(route('transaccion.loadNiif', {id: puc}), function (data) {
            var html_selct='';
            for (var i = 0; i < data.length; ++i) {
                html_selct += '<option value="' + data[i].codigoNiff + '">' + data[i].codigoNiff + '</option>';
                $('.codigoNIIIFD').html(html_selct);
            }
        })
    }
}

function dian() {
    var formatoDian = $("#formatoDian_id").val();
    if (formatoDian != -1) {
        $.getJSON(route('loadFormato', {id: formatoDian}), function (data) {
            var html_selct = '<option value="-1">[Seleccione un formato]</option>';
            for (var i = 0; i < data.length; ++i) {
                html_selct += '<option value="' + data[i].id + '">'+ data[i].codigo+ ' ' + data[i].concepto + '</option>';
                $('#conceptoDian_id').html(html_selct);
            }
        })
    } else {
        $('#conceptoDian_id').html('<option value="-1">[Seleccione un concépto]</option>');
    }

}

function nivelEmplo() {
    var nivelEmpleo = $("#nivelEmpleo_id").val();
    if (nivelEmpleo != '') {
        $.getJSON(route('loadEmpleo', {id: nivelEmpleo}), function (data) {
            var html_selct = '<option value="-1">[Seleccione un Empelo]</option>';
            for (var i = 0; i < data.length; ++i) {
                html_selct += '<option value="' + data[i].id + '">' + data[i].codigo+ ' ' + data[i].nombreEmpleo + '</option>';
                $('#codigoEmpleo_id').html(html_selct);
            }
        })
    } else {
        $('#ciudad_id').html('<option value="-1">[Seleccione un Empleo]</option>');
    }
}

function crearTipoDoc()  {
    var data = $('#newDoc').serialize();
    var url = route('tipoDocumento.store');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            beforeSend: function () {
                $('#newDoc')[0].reset();
            },
            success: function (ans) {
                if ($.isEmptyObject(ans.error)) {
                   $('#response').html('');
                    $("#crear").modal('hide');//ocultamos el modal
                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                    $('.modal-dialog').remove();//eliminamos el backdrop del modal
                    window.location.reload(true);

                   // $('#response').fadeIn("slow")("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.success + "</div>");
                    //
                    // setTimeout(function() {
                    //     $("#response").fadeOut(1500);
                    // },3000);

                } else {
                    $('#response').html('');
                    $('#response').fadeIn("slow")("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.error + "</div>");
                }

            },
        });
}

function crearTipoPersonas() {
    var data = $('#crearTipoPersona').serialize();
    var url = route('clasePersona.store');
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        beforeSend: function () {
            $('#crearTipoPersona')[0].reset();
        },
        success: function (ans) {
            if ($.isEmptyObject(ans.error)) {
                $('#response').html('');
                $("#crear").modal('hide');//ocultamos el modal
                $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                $('.modal-dialog').remove();//eliminamos el backdrop del modal
                window.location.reload(true);
                // $('#response').fadeIn("slow")("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.success + "</div>");
                // setTimeout(function() {
                //     $("#response").fadeOut(1500);
                // },3000);

            } else {
                $('#response').html('');
                $('#response').fadeIn("slow")("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.error + "</div>");
            }

        },
    });
}

function crearCodigoEmpleos() {
    var data = $('#crearCodigoEmpleo').serialize();
    var url = route('codigoEmpleo.store');
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        beforeSend: function () {
            $('#crearCodigoEmpleo')[0].reset();
        },
        success: function (ans) {
            if ($.isEmptyObject(ans.error)) {
                $('#response').html('');
                $("#crear").modal('hide');//ocultamos el modal
                $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                $('.modal-dialog').remove();//eliminamos el backdrop del modal
                window.location.reload(true);
                // $('#response').fadeIn("slow")("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.success + "</div>");
                // setTimeout(function() {
                //     $("#response").fadeOut(1500);
                // },3000);

            } else {
                $('#response').html('');
                $('#response').fadeIn("slow")("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.error + "</div>");
            }

        },
    });
}

function crearNivelEmpleos() {
    var data = $('#crearNivelEmpleo').serialize();
    var url = route('nivelEmpleo.store');
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        beforeSend: function () {
            $('#crearNivelEmpleo')[0].reset();
        },
        success: function (ans) {
            if ($.isEmptyObject(ans.error)) {
                $('#response').html('');
                $("#crear").modal('hide');//ocultamos el modal
                $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                $('.modal-dialog').remove();//eliminamos el backdrop del modal
                window.location.reload(true);
                // $('#response').fadeIn("slow")("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.success + "</div>");
                // setTimeout(function() {
                //     $("#response").fadeOut(1500);
                // },3000);

            } else {
                $('#response').html('');
                $('#response').fadeIn("slow")("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.error + "</div>");
            }

        },
    });
}

function crearRegimenTributarios() {
    var data = $('#crearRegimenTributario').serialize();
    var url = route('regimenTributario.store');
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        beforeSend: function () {
            $('#crearRegimenTributario')[0].reset();
        },
        success: function (ans) {
            if ($.isEmptyObject(ans.error)) {
                $('#response').html('');
                $("#crear").modal('hide');//ocultamos el modal
                $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                window.location.reload(true);
                // $('.modal-dialog').remove();//eliminamos el backdrop del modal
                // $('#response').fadeIn("slow")("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.success + "</div>");
                // setTimeout(function() {
                //     $("#response").fadeOut(1500);
                // },3000);

            } else {
                $('#response').html('');
                $('#response').fadeIn("slow")("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.error + "</div>");
            }

        },
    });
}

function crearTipoVinculacion() {
    var data = $('#crearTipoVincula').serialize();
    var url = route('tipoVinculacion.store');
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        beforeSend: function () {
            $('#crearTipoVincula')[0].reset();
        },
        success: function (ans) {
            if ($.isEmptyObject(ans.error)) {
                $('#response').html('');
                $("#crear").modal('hide');//ocultamos el modal
                $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                $('.modal-dialog').remove();//eliminamos el backdrop del modal
                window.location.reload(true);
                // $('#response').fadeIn("slow")("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.success + "</div>");
                // setTimeout(function() {
                //     $("#response").fadeOut(1500);
                // },3000);

            } else {
                $('#response').html('');
                $('#response').fadeIn("slow")("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.error + "</div>");
            }

        },
    });
}

function crearUnidadEjecutar() {
    var data = $('#crearUnidadEjecuta').serialize();
    var url = route('unidadEjecutar.store');
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        beforeSend: function () {
            $('#crearUnidadEjecuta')[0].reset();
        },
        success: function (ans) {
            if ($.isEmptyObject(ans.error)) {
                $('#response').html('');
                $("#crear").modal('hide');//ocultamos el modal
                $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                $('.modal-dialog').remove();//eliminamos el backdrop del modal
                window.location.reload(true);
                // $('#response').fadeIn("slow")("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.success + "</div>");
                // setTimeout(function() {
                //     $("#response").fadeOut(1500);
                // },3000);

            } else {
                $('#response').html('');
                $('#response').fadeIn("slow")("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.error + "</div>");
            }

        },
    });
}

function crearcrearBienesyservicios() {
    var data = $('#crearBienes').serialize();
    var url = route('bienes.store');
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        beforeSend: function () {
            $('#crearBienes')[0].reset();
        },
        success: function (ans) {
            if ($.isEmptyObject(ans.error)) {
                $('#response').html('');
                $("#crear").modal('hide');//ocultamos el modal
                $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                $('.modal-dialog').remove();//eliminamos el backdrop del modal
                window.location.reload(true);
                // $('#response').fadeIn("slow")("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.success + "</div>");
                // setTimeout(function() {
                //     $("#response").fadeOut(1500);
                // },3000);

            } else {
                $('#response').html('');
                $('#response').fadeIn("slow")("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + ans.error + "</div>");
            }

        },
    });
}

function codigoCiiu() {
    var descriptores = $("#descritores_id").val();
    if (descriptores != -1) {
        $.getJSON(route('codigoCiiu', {id: descriptores}), function (data) {
            var html_selct = '<option value="481">[Seleccione una Actividad]</option>';
            for (var i = 0; i < data.length; ++i) {
                html_selct += '<option value="' + data[i].id + '">' + data[i].codigo+ ' ' + data[i].descripcion +  '</option>';
                $('#id_actividadesCiiu').html(html_selct)
            };
        })
    } else {
        $('#id_actividadesCiiu').html('<option value="481">[Seleccione una Actividad]</option>');
    }
}

function ClaseId(sel) {
    if (sel.value==3){
        $('#Subclases').fadeIn('slow');
    }
    if (sel.value==2){
        $('#Subclases').fadeOut('slow');
    }
    if (sel.value==5){
        $('#Subclases').fadeOut('slow');
    }
}

function  calcularDigitoVerificacion ( myNit )  {
    var vpri,
        x,
        y,
        z;

    // Se limpia el Nit
    myNit = myNit.replace ( /\s/g, "" ) ; // Espacios
    myNit = myNit.replace ( /,/g,  "" ) ; // Comas
    myNit = myNit.replace ( /\./g, "" ) ; // Puntos
    myNit = myNit.replace ( /-/g,  "" ) ; // Guiones

    // Se valida el nit
    if  ( isNaN ( myNit ) )  {
        console.log ("El nit/cédula '" + myNit + "' no es válido(a).") ;
        return "" ;
    };

    // Procedimiento
    vpri = new Array(16) ;
    z = myNit.length ;

    vpri[1]  =  3 ;
    vpri[2]  =  7 ;
    vpri[3]  = 13 ;
    vpri[4]  = 17 ;
    vpri[5]  = 19 ;
    vpri[6]  = 23 ;
    vpri[7]  = 29 ;
    vpri[8]  = 37 ;
    vpri[9]  = 41 ;
    vpri[10] = 43 ;
    vpri[11] = 47 ;
    vpri[12] = 53 ;
    vpri[13] = 59 ;
    vpri[14] = 67 ;
    vpri[15] = 71 ;

    x = 0 ;
    y = 0 ;
    for  ( var i = 0; i < z; i++ )  {
        y = ( myNit.substr (i, 1 ) ) ;
        // console.log ( y + "x" + vpri[z-i] + ":" ) ;

        x += ( y * vpri [z-i] ) ;
        // console.log ( x ) ;
    }

    y = x % 11 ;
    // console.log ( y ) ;

    return ( y > 1 ) ? 11 - y : y ;
}
// Calcular
function calcular() {

    // Verificar que haya un numero
    let nit = document.getElementById("nit").value;
    let isNitValid = nit >>> 0 === parseFloat(nit) ? true : false; // Validate a positive integer

    // Si es un número se calcula el Dígito de Verificación
    if ( isNitValid ) {
        let inputDigVerificacion = document.getElementById("dv");
        inputDigVerificacion.value = calcularDigitoVerificacion (nit);
    }
}

