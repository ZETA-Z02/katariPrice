$(document).ready(function () {
  // OCULTA LOS MODALES
  $("#natural-modal").hide();
  $("#juridica-modal").hide();
  $("#natural-form").hide();
  $("#juridica-form").hide();
  //ocultar datos ->natural y juridica
  $("#datos-natural").hide();
  $("#datos-juridica").hide();
  // MUESTRA INPUT ESTADISTICA
  $("#contenido-estadistica").show();
  // INPUT ESTADISTICA END
  // SELECT PARA QUE APAREZCA EL FORMULARIO
  $("#servicio").change(function () {
    // Oculta todos los divs con clase "contenido"
    $(".contenido").hide();
    // Obtiene el valor seleccionado en el select
    var opcionSeleccionada = $(this).val();
    // Muestra el div correspondiente a la opción seleccionada
    $("#contenido-" + opcionSeleccionada).show();
  });
  // SELECT PARA QUE APAREZCA EL FORMULARIO END
  // BOTONES NATURAL
  $("#natural-btn").click(function () {
    $("#juridica-modal").hide();
    $("#natural-modal").show();
  });
  $("#natural-new-btn").click(function () {
    $("#natural-form").show();
  });
  // BOTON NATURAL END
  // BOTONES JURIDICO
  $("#juridica-btn").click(function () {
    $("#natural-modal").hide();
    $("#juridica-modal").show();
  });
  $("#juridica-new-btn").click(function () {
    $("#juridica-form").show();
  });
  // BOTON JURIDICO END
  // FORMULARIO NATURAL MODAL
  $("#natural-modal-form").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "http://localhost/katariPrice/cotizacion/natural",
      data: $(this).serialize(),
      success: function (response) {
        console.log("INSERCION EXITOSA");
        console.log(response);
        tablaNatural();
        $("#natural-form").hide();
      },
      error: function (error) {
        console.log("INSERCION FALLIDA");
        alert("Fallo");
        $("#natural-modal-form")[0].reset();
      },
    });
  });
  // FORMULARIO NATURAL MODEL END
  // FORMULARIO JURIDICA MODAL
  $("#juridica-modal-form").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "http://localhost/katariPrice/cotizacion/juridica",
      data: $(this).serialize(),
      success: function (response) {
        console.log("INSERCION EXITOSA");
        console.log(response);
        tablaJuridica();
        $("#juridica-form").hide();
      },
      error: function (error) {
        console.log("INSERCION FALLIDA");
        alert("Fallo");
        $("#juridica-modal-form")[0].reset();
      },
    });
  });
  // FORMULARIO JURIDICA MODEL END
  // CANCELAR BOTONES MODAL FORMULARIO NUEVO NATURAL Y JURIDICA
  $("#cancelar-natural-btn").click(function () {
    $("#natural-form").hide();
  });
  $("#cancelar-juridica-btn").click(function () {
    $("#juridica-form").hide();
  });
  //GUARDAR TODO EL FORMULARIO->PRINCIPAL
  // $("#guardar-todo").click(function(){
  //   let id = $("#idnatural").val();
  //   console.log("guardar todo"+id);
  // });

  // LLAMADA A FUNCIONES;
  tablaNatural();
  tablaJuridica();
  searchNatural();
  searchJuridica();
});
// /////////////---CALCULADORA DE SOFTWARE--//////////////
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
// /////////////---CALCULADORA DE SOFTWARE-END-//////////////

// FUNCIONES
// -----------------TABLA NATURAL----------------
function tablaNatural() {
  $.ajax({
    type: "GET",
    url: "http://localhost/katariPrice/cotizacion/getNatural",
    success: function (response) {
      //console.log(response);
      data = JSON.parse(response);
      html = "";
      data.forEach((element) => {
        html += `
              <tr id="${element.idnatural}">
                <td>${element.nombres}</td>
                <td>${element.dni}</td>
                <td>${element.ciudad}</td>
                <td>
                  <button class="seleccionar-natural">Seleccionar</button>
                </td>
              </tr>
          `;
      });
      $("#datos-natural-table").html(html);
      seleccionarNatural(response);
    },
    error: function (error) {
      console.log("ERROR EN LA PETICION: " + error);
    },
  });
}
// -----------------TABLA NATURAL-END-------------
// -----------------TABLA JURIDICA----------------
function tablaJuridica() {
  $.ajax({
    type: "GET",
    url: "http://localhost/katariPrice/cotizacion/getJuridica",
    success: function (response) {
      //console.log(response);
      data = JSON.parse(response);
      html = "";
      data.forEach((element) => {
        html += `
              <tr id="${element.idjuridica}">
                <td>${element.razonsocial}</td>
                <td>${element.ruc}</td>
                <td>${element.telefono}</td>
                <td>
                  <button class="seleccionar-juridica">Seleccionar</button>
                </td>
              </tr>
          `;
      });
      $("#datos-juridica-table").html(html);
      seleccionarJuridica(response)
    },
    error: function (error) {
      console.log("ERROR EN LA PETICION: " + error);
    },
  });
}
// -----------------TABLA JURIDICA-END-------------
// **************FUNCION SEARCH NATURAL**************
function searchNatural() {
  $("#natural-nombre, #natural-dni").on("keyup", function () {
    let nombres = $("#natural-nombre").val();
    let dni = $("#natural-dni").val();
    $.ajax({
      type: "POST",
      url: "http://localhost/katariPrice/cotizacion/searchNatural",
      data: { nombres, dni },
      success: function (response) {
        console.log(response);
        let data = JSON.parse(response);
        let html = "";
        data.forEach((element) => {
          html += `
                <tr id="${element.idnatural}">
                    <td>${element.nombres}</td>
                    <td>${element.dni}</td>
                    <td>${element.ciudad}</td>
                    <td>
                      <button class="seleccionar-natural">Seleccionar</button>
                    </td>
                </tr>`;
        });
        $("#datos-natural-table").html(html);
        seleccionarNatural(response);
      },
      error: function (error) {
        console.error("Error en la solicitud", error);
      },
    });
  });
}
// **************FUNCION SEARCH NATURAL*END*************
// **************FUNCION SEARCH JURIDICA**************
function searchJuridica() {
  $("#juridica-razonsocial, #juridica-ruc").on("keyup", function () {
    let razonsocial = $("#juridica-razonsocial").val();
    let ruc = $("#juridica-ruc").val();
    $.ajax({
      type: "POST",
      url: "http://localhost/katariPrice/cotizacion/searchJuridica",
      data: { razonsocial, ruc },
      success: function (response) {
        console.log(response);
        let data = JSON.parse(response);
        let html = "";
        data.forEach((element) => {
          html += `
                <tr id="${element.idjuridica}">
                    <td>${element.razonsocial}</td>
                    <td>${element.ruc}</td>
                    <td>${element.telefono}</td>
                    <td>
                        <button class="seleccionar-juridica">Seleccionar</button>
                    </td>
                </tr>`;
        });
        $("#datos-juridica-table").html(html);
        seleccionarJuridica(response);
      },
      error: function (error) {
        console.error("Error en la solicitud", error);
      },
    });
  });
}
// **************FUNCION SEARCH JURIDICA*END*************
function seleccionarNatural(data) {
  $(document).on("click", ".seleccionar-natural", function () {
    //console.log("clickeado" + data);
    let id = $(this).parent().parent().attr("id");
    //console.log(id);
    let datos = JSON.parse(data);
    // Buscar por valor
    for (var i = 0; i < datos.length; i++) {
      //console.log(datos[i]);
      for (let key in datos[i]) {
        //console.log(key, datos[i][key]);
        if (datos[i][key] === id) {
          //console.log("Valor encontrado en la clave:", key);
          //console.log(datos[i]["nombres"]);
          $("#idnatural").val(datos[i]["idnatural"]);
          $("#nombres").val(datos[i]["nombres"]);
          $("#dni").val(datos[i]["dni"]);
          $("#telefono").val(datos[i]["telefono"]);
          $("#email").val(datos[i]["email"]);
          $("#direccion").val(datos[i]["direccion"]);
          $("#ciudad").val(datos[i]["ciudad"]);
          
          // en ves de esto-> hacer funcion para ocultar y vaciar elementos(inputs)
          $("#datos-juridica").hide();

          $("#datos-natural").show();
          $("#natural-modal").hide();
          return;
        }
      }
    }
  });
}
function seleccionarJuridica(data) {
  $(document).on("click", ".seleccionar-juridica", function () {
    //console.log("clickeado" + data);
    let id = $(this).parent().parent().attr("id");
    //console.log(id);
    let datos = JSON.parse(data);
    // Buscar por valor
    for (var i = 0; i < datos.length; i++) {
      //console.log(datos[i]);
      for (let key in datos[i]) {
        //console.log(key, datos[i][key]);
        if (datos[i][key] === id) {
          //console.log("Valor encontrado en la clave:", key);
          //console.log(datos[i]["nombres"]);
          $("#idjuridica").val(datos[i]["idjuridica"]);
          $("#razonsocial").val(datos[i]["razonsocial"]);
          $("#ruc").val(datos[i]["ruc"]);
          $("#telefono-juridica").val(datos[i]["telefono"]);
          $("#email-juridica").val(datos[i]["email"]);
          $("#rubro").val(datos[i]["rubro"]);
          $("#web").val(datos[i]["web"]);
          // en ves de esto-> hacer funcion para ocultar y vaciar elementos(inputs)
          $("#datos-natural").hide();

          $("#datos-juridica").show();
          $("#juridica-modal").hide();
          return;
        }
      }
    }
  });
}


// *-*-*-*-*-*-*-FUNCIONES CALCULADORA-*-*-*-*-*-*-
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
// *-*-*-*-*-*-*-FUNCIONES CALCULADORA-END-*-*-*-*-*-*-
