/*exported formValidationSetup, refreshErrorMessages */
var productsId = [];
var vehiclesId = []; // Variable ID para lista dinamica
// Refresca Producto: Refresco la Lista de Productos dentro de la Tabla
// Si es vacia deshabilito el boton guardar para obligar a seleccionar al menos un producto al usuario
// Sino habilito el boton Guardar para que pueda Guardar
function RefrescaProducto(){
    var ip = [];
    var i = 0;

    /*$('.iProduct').each(function(index, element) {
        i++;
        ip.push({ id_pro : $(this).val() });
    });*/
    $('.idPersonasNaturales').each(function(index, element) {
        i++;
        ip.push({ id : $(this).val() });
    });


}

// EN ESTE CASO, USTED AGREGA personasNaturales
function agregarVehicle() {

    var sel2 = $('.id_personasNaturales').find('option:selected').val(); //Capturo el Value del Producto
    var text2 = $('.id_personasNaturales').find('option:selected').text();//Capturo el Nombre del Producto- Texto dentro del Select

    var sptext = text2.split();

    var newtr2 = '<tr class="item"  data-id="'+sel2+'">';
    newtr2 = newtr2 + '<input type="hidden" class="form-control" name="persona_id[]" value="'+sel2+'" required / style="width:80px">';
    newtr2 = newtr2 + '<td class="id_personasNaturales" >' + text2 + '</td>';
    newtr2 = newtr2 + '<td><input  onchange="suma()" class="form-control porcentaje" name="porcentaje[]" id="porcentaje" required / style="width:80px"></td>';
    newtr2 = newtr2 + '<td><button type="button" onclick="resta()" class="btn btn-link btn-danger remove remove-item"><i class="fa fa-times"></i></button></td></tr>';


    $('#ProSelected').append(newtr2); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

    RefrescaProducto();//Refresco Productos

    $('.remove-item').off().click(function(e) {
        var idProducto = $(this).parent('td').parent('tr').data('id');
        $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
        var index = productsId.indexOf(idProducto.toString());

        if (index > -1) {

            productsId.splice(index, 1);
        }
        if ($('#ProSelected tr.item').length == 0){
            $('#ProSelected .no-item').slideDown(300);
        }
        RefrescaProducto();
    });

    $('.iProduct').off().change(function(e) {
        RefrescaProducto();
    });
}
function resta(){
    var porcen=$('#porcentaje').val();
    var total=$('#total').val();
    //console.log(porcen+' '+ total);
    var resta=porcen-total;
    console.log(resta);
    $('#porcentaje').change(function (event) {
        container = $(this).parent('.porcentaje');

        total = 0;

        $(container).find('#porcentaje').each(function (index, el) {
            value = $(el).val() || 0
            total -= parseInt(value);
        });
        console.log(total);
        $(container).find('.total').val(total);
    });

}

function anular(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    return (tecla != 13);
}


/**SUMA*/
