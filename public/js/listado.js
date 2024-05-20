$(document).ready(function () {
  $("#tabla-cotizaciones").show();
  $("#tabla-proyectos").hide();
  $("#lista").change(function () {
    // Oculta todos los divs con clase "contenido"
    $(".contenido").hide();
    // Obtiene el valor seleccionado en el select
    var opcionSeleccionada = $(this).val();
    // Muestra el div correspondiente a la opción seleccionada
    $("#tabla-" + opcionSeleccionada).show();
  });
});


function getCotizaciones(){

    $.ajax({
        type: "GET",
        url: `http://localhost/katariPrice/cotizacion/getCotizaciones`,
        success: function (response) {
            
        },error: function(error){

        }
    });
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
}
