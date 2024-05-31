$(document).ready(function () {
    datos();
    proyectos();
});
// DATOS 
function datos(){
    $.ajax({
        type: "GET",
        url: "http://localhost/katariPrice/dashboard/datos",
        success: function (response) {
            let data = JSON.parse(response);
            $("#total-cotizaciones").html(data.cotizaciones);
            $("#total-proyectos").html(data.proyectos);
            let recaudado = parseFloat(data.recaudado);
            $("#total-recaudado").html(recaudado.toFixed(2));
        },error:function (error){
            console.log("ERROR EN LA PETICION: " + error);
        }
    });
}
function proyectos(){
  let id = $("#idpersonal").val();
  $.ajax({
    type: "POST",
    url: "http://localhost/katariPrice/dashboard/proyectos",
    data: {id},
    success: function (response) {
      let data = JSON.parse(response);
      html = "";
      data.forEach(element => {
        html += `
            <div class="grid-x align-spaced">
              <p>${element.proyecto}</p><a href="http://localhost/katariPrice/listado/proyectoNaturalDetalle/${element.idproyecto}"><i class="fa-solid fa-arrow-right"></i></a>
            </div>
                `;
      });
      $("#mis-proyectos").html(html);
    },error:function (error){
      console.log("ERROR EN LA PETICION: " + error);
    }
  });
}
// DATOS END


// ///////////////////////////////GRAFICOS////////////////////////////////////////////
// BARRAS END*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
const data = {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [
      {
        label: "# of Votes",
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
      },
    ],
  };
  const config = {
    type: "bar",
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  };
  new Chart($("#barras"), config);
  // BARRAS END*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
  // PASTEL --------------------------------------------------
  const data1 = {
      labels: [
        'Red',
        'Blue',
        'Yellow'
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
      }]
    };
  const config1 = {
      type: 'doughnut',
      data: data1,
    };
  new Chart($("#pastel"), config1);
  // PASTEL END--------------------------------------------------
  // LINEAS *******************************************************
  const labels = ['january', 'february', 'march', 'april', 'may', 'june', 'july'];
  const data2 = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: [65, 59, 80, 81, 56, 55, 40],
      fill: false,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    }]
  };
  const config2 = {
      type: 'line',
      data: data2,
    };
  new Chart($("#lineal"), config2);
  // LINEAS END*******************************************************
  // AREA /*/*/*/*/*/*/*/*/*/*/*/*/*/**/*/*/*/*/*/*/*/*/*/*/*/*/*/* */
  const data3 = {
      labels: [
        'Red',
        'Green',
        'Yellow',
        'Grey',
        'Blue'
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [11, 16, 7, 3, 14],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(75, 192, 192)',
          'rgb(255, 205, 86)',
          'rgb(201, 203, 207)',
          'rgb(54, 162, 235)'
        ]
      }]
    };
  const config3 = {
      type: 'polarArea',
      data: data3,
      options: {}
    };
  new Chart($("#area"), config3);
  // AREA END/*/*/*/*/*/*/*/*/*/*/*/*/*/**/*/*/*/*/*/*/*/*/*/*/*/*/*/*
///////////////////////////////////////GRAFICOS END//////////////////////////////////