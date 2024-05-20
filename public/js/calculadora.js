$(document).ready(function (){
    $("#costo-total").hide();
    getDificultad();
    getLenguaje();
    getAplicacion();
    // CHECKBOX ACTIVATE
    $("#conservidor").on("change", function() {
        if (this.checked) {
            $("#sinservidor").prop("checked", false);
        }
    });
    $("#sinservidor").on("change", function() {
        if (this.checked) {
            $("#conservidor").prop("checked", false);
        }
    });
    // CHECKBOX ACTIVATE END
    $("#calcular").on("click", function(){
        $("#costo-total").show();
    });
});

function getDificultad(){
    $.ajax({
        type: "GET",
        url: "http://localhost/katariPrice/calculadora/getDificultad",
        success: function (response) {
            //console.log(response);
            let data = JSON.parse(response);
            html = "";
            data.forEach(element => {
                html += `<option value="${element.factor}">${element.iddificultad}</option>`
            });
            $("#dificultad").html(html);
        },
        error: function (error) {
            console.log("ERROR EN LA PETICION: " + error);
        },
    });
}
function getLenguaje(){
    $.ajax({
        type: "GET",
        url: "http://localhost/katariPrice/calculadora/getLenguaje",
        success: function (response) {
            //console.log(response);
            let data = JSON.parse(response);
            html = "";
            data.forEach(element => {
                html += `<option value="${element.precio}">${element.lenguaje}</option>`
            });
            $("#lenguaje").html(html);
        }, error: function(error){

        },
    });
}
function getAplicacion(){
    $.ajax({
        type: "GET",
        url: "http://localhost/katariPrice/calculadora/getAplicacion",
        success: function (response) {
            //console.log(response);
            let data = JSON.parse(response);
            html = "";
            data.forEach(element => {
                html += `<option value="${element.precio}">${element.aplicacion}</option>`
            });
            $("#aplicacion").html(html);
        }, error: function(error){

        },
    });
}
