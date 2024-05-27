$(document).ready(function () {
  $("#modal-login").hide();
  tablaPersonal();
  postPersonal();
  postLogin();
  updateLogin();
  updatePersonal();
  eliminar();
});

function tablaPersonal() {
  $.ajax({
    type: "GET",
    url: `http://localhost/katariPrice/personal/getPersonal`,
    success: function (response) {
      let data = JSON.parse(response);
      let html = "";
      data.forEach((element) => {
        html += `
            <tr id="${element.idpersonal}">
                <td><img src="${element.foto}" alt="${element.nombres}" width="50px"></td>
                <td>${element.nombres}</td>
                <td>${element.telefono}</td>
                <td>${element.email}</td>
                <td><a class="button" href="http://localhost/katariPrice/personal/detalles/${element.idpersonal}">Detalles</a></td>
                <td><a class="button warning" href="http://localhost/katariPrice/personal/login/${element.idpersonal}">Login</a></td>
                <td><button class="button alert" id="eliminar">Eliminar</button></td>
            </tr>`;
      });
      $("#personal-data").html(html);
    },
    error: function (error) {
      console.log("error:" + error);
    },
  });
}
// CREAR NUEVO PERSONAL=?>> VISTA-> PERSONAL/NUEVO
function postPersonal() {
  $("#personalForm").on("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        $("#modal-login").show();
        $("#idpersonal-nuevo").val(response);
      },
      error: function (error) {
        console.error("Error:", error);
        // Aquí puedes manejar los errores
        alert("Hubo un error al enviar el formulario.");
      },
    });
  });
}

function postLogin() {
  $("#loginForm").on("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        $("#modal-login").hide();
      },
      error: function (error) {
        console.error("Error:", error);
        // Aquí puedes manejar los errores
        alert("Hubo un error al enviar el formulario Login.");
      },
    });
  });
}

function updateLogin() {
  $("#login-update").on("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log("actualizado correctamente");
        alert("Login actualizado correctamente");
      },
      error: function (error) {
        console.error("Error:", error);
        alert("Hubo un error al enviar el formulario Login.");
      },
    });
  });
}
function updatePersonal() {
  $("#update-personal").on("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log("actualizado correctamente");
        alert("Personal actualizado correctamente");
      },
      error: function (error) {
        console.error("Error:", error);
        alert("Hubo un error al enviar el formulario Personal.");
      },
    });
  });
}
function eliminar(){
    $(document).on("click", "#eliminar", function() {
        let id = $(this).parent().parent().attr("id");
        $.ajax({
            type: "POST",
            url: "http://localhost/katariPrice/personal/delete/",
            data: {id},
            success: function (response) {
                alert("Eliminado correctamente");
                tablaPersonal()
            },error:function (error){
                console.log("error:" + error);
            }
        });
    });
}
