// Call the dataTables jQuery plugin
$(document).ready(function() {
  var table = $('#dataTableSelect').DataTable({
    "order": [[ 1, "desc" ]],
    //scrollY: 300,
    //deferRender: true,
    //scroller: true,
    "language": {
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });

  $("#dataTableSelect tfoot th").each( function ( i ) {

    if ($(this).text() !== '') {
      var isStatusColumn = (($(this).text() == 'Status') ? true : false);
      var select = $('<select><option value=""></option></select>')
          .appendTo( $(this).empty() )
          .on( 'change', function () {
            var val = $(this).val();

            table.column( i )
                .search( val ? '^'+$(this).val()+'$' : val, true, false )
                .draw();
          } );

      // Get the Status values a specific way since the status is a anchor/image
      if (isStatusColumn) {
        var statusItems = [];

        /* ### IS THERE A BETTER/SIMPLER WAY TO GET A UNIQUE ARRAY OF <TD> data-filter ATTRIBUTES? ### */
        table.column( i ).nodes().to$().each( function(d, j){
          var thisStatus = $(j).attr("data-filter");
          if($.inArray(thisStatus, statusItems) === -1) statusItems.push(thisStatus);
        } );

        statusItems.sort();

        $.each( statusItems, function(i, item){
          select.append( '<option value="'+item+'">'+item+'</option>' );
        });

      }
      // All other non-Status columns (like the example)
      else {
        table.column( i ).data().unique().sort().each( function ( d, j ) {
          select.append( '<option value="'+d+'">'+d+'</option>' );
        } );
      }

    }
  });
  $('#dataTable').DataTable({
     scrollY: 400,
     deferRender: true,
     scroller: true,
     "language": {
       "sProcessing": "Procesando...",
       "sLengthMenu": "Mostrar _MENU_ registros",
       "sZeroRecords": "No se encontraron resultados",
       "sEmptyTable": "Ningún dato disponible en esta tabla",
       "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
       "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
       "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
       "sInfoPostFix": "",
       "sSearch": "Buscar:",
       "sUrl": "",
       "sInfoThousands": ",",
       "sLoadingRecords": "Cargando...",
       "oPaginate": {
         "sFirst": "Primero",
         "sLast": "Último",
         "sNext": "Siguiente",
         "sPrevious": "Anterior"
       },
       "oAria": {
         "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
         "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       }
     },
     "pageLength": 10,
   });
});


