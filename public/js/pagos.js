$(document).ready(function(){
    $("#pago-modal").hide();
    $("#registrar-pago").click(function(){
        $("#pago-modal").show();
    });
    $("#guardar-pago").click(function(){
        $("#pago-modal").hide();
    });
});
pagoDetalles();
function pagoDetalles(){
    let idpago = $("#idpago").val();
    console.log(idpago);
    $.ajax({
        type: "POST",
        url: "http://localhost/katariPrice/listado/pagoDetalle",
        data: {idpago},
        success: function (response) {
            //console.log(response);
            let data = JSON.parse(response);    
            let html = "";
            let i = 1;
            data.forEach(element => {
                html +=`
                    <tr>
                        <td>${i}</td>
                        <td>${element.concepto}</td>
                        <td>${element.fecha}</td>
                        <td class="text-right">${element.monto}</td>
                    </tr>
                        `;
                i=i+1;
            });
            $("#tabla-pago").html(html);
        },error: function (error){
            console.log("ERROR EN LA PETICION: " + error);
        }
    });
}