function generarNuevoColor() {
  var simbolos, color;
  simbolos = "0123456789ABCDEF";
  color = "#";

  for (var i = 0; i < 6; i++) {
    color = color + simbolos[Math.floor(Math.random() * 16)];
  }

  return color;
}

function consultarDatos(encabezado, id_proyecto, bandera) {
  var modalidad = encabezado;
  var id_proyecto = id_proyecto;
  var bandera = bandera;
  $.ajax({
    //async: false,
    type: "POST",
    url: "includes/functions/estadisticas/query.php",
    data: {
      bandera: bandera,
      modalidad: modalidad,
      id_proyecto: id_proyecto,
    },
    dataType: "json",
    //beforeSend: function (){},
    error: function (request, status, error) {
      alert(request.responseText);
    },
    success: function (respuesta) {
      switch (respuesta.estado) {
        case 1:
          var limite = 0;
          new Array((colores = []));
          respuesta.data.series.forEach((element) => {
            colores.push(generarNuevoColor());
            if (limite < element) {
              limite = element;
            }
          });
          // Set new default font family and font color to mimic Bootstrap's default styling
          (Chart.defaults.global.defaultFontFamily = "Nunito"),
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
          Chart.defaults.global.defaultFontColor = "#858796";

          function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + "").replace(",", "").replace(" ", "");
            var n = !isFinite(+number) ? 0 : +number,
              prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
              sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
              dec = typeof dec_point === "undefined" ? "." : dec_point,
              s = "",
              toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return "" + Math.round(n * k) / k;
              };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
            if (s[0].length > 3) {
              s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || "").length < prec) {
              s[1] = s[1] || "";
              s[1] += new Array(prec - s[1].length + 1).join("0");
            }
            return s.join(dec);
          }

          // Bar Chart Example
          $("#chartEstadisticas").remove();
          $("#contenedorChart").html(
            '<canvas id="chartEstadisticas"></canvas>'
          );
          var ctx = document.getElementById("chartEstadisticas");
          var myBarChart = new Chart(ctx, {
            type: "bar",
            data: {
              labels: respuesta.data.categories,
              datasets: [
                {
                  label: "Registros",
                  backgroundColor: colores,
                  hoverBackgroundColor: "#2e59d9",
                  borderColor: "#4e73df",
                  data: respuesta.data.series,
                },
              ],
            },
            options: {
              maintainAspectRatio: false,
              layout: {
                padding: {
                  left: 10,
                  right: 25,
                  top: 35,
                  bottom: 0,
                },
              },
              scales: {
                xAxes: [
                  {
                    time: {
                      unit: "month",
                    },
                    gridLines: {
                      display: false,
                      drawBorder: false,
                    },
                    ticks: {
                      maxTicksLimit: limite,
                    },
                    maxBarThickness: 25,
                  },
                ],
                yAxes: [
                  {
                    ticks: {
                      min: 0,
                      max: limite,
                      maxTicksLimit: 12,
                      padding: 10,
                      // Include a dollar sign in the ticks
                      callback: function (value, index, values) {
                        return number_format(value);
                      },
                    },
                    gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2],
                    },
                  },
                ],
              },
              legend: {
                display: false,
              },
              tooltips: {
                titleMarginBottom: 10,
                titleFontColor: "#6e707e",
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: true,
                caretPadding: 10,
                callbacks: {
                  label: function (tooltipItem, chart) {
                    var datasetLabel =
                      chart.datasets[tooltipItem.datasetIndex].label || "";
                    return datasetLabel + number_format(tooltipItem.yLabel);
                  },
                },
              },
            },
          });

          break;
        case 2:
          break;
        default:
          break;
      }
    },
    complete: function () {},
  });
  return false;
}
function consultaFiltro(id_proyecto, bandera, fechaI, fechaF) {
  $.ajax({
    //async: false,
    type: "POST",
    url: "includes/functions/estadisticas/query.php",
    data: {
      bandera: bandera,
      fechaI: fechaI,
      fechaF: fechaF,
      id_proyecto: id_proyecto,
    },
    dataType: "json",
    //beforeSend: function (){},
    error: function (request, status, error) {
      alert(request.responseText);
    },
    success: function (respuesta) {
      switch (respuesta.estado) {
        case 1:
            console.log(respuesta.data);
            $("#registros1").text(respuesta.data[0]['registros1']);
            $("#registros2").text(respuesta.data[0]['registros2']);
            $("#registros3").text(respuesta.data[0]['registros3']);
            $("#resultadoTotalEstadisticas").removeClass("oculto");
          break;
        case 2:
          break;
        default:
          break;
      }
    },
    complete: function () {},
  });
  return false;
}

$(document).ready(function () {
  $("#modalidad1").click(function () {
    var encabezado = $("#encabezado1").val();
    var proyecto = $("#id_proyecto").text();
    var bandera = 1;
    $("#cabezeraDatos").html(encabezado);
    $("#datos").removeClass("oculto");
    //console.log(encabezado);
    consultarDatos(encabezado, proyecto, bandera);
  });
  $("#modalidad2").click(function () {
    var encabezado = $("#encabezado2").val();
    var proyecto = $("#id_proyecto").text();
    var bandera = 1;
    $("#cabezeraDatos").html(encabezado);
    $("#datos").removeClass("oculto");
    consultarDatos(encabezado, proyecto, bandera);
  });
  $("#modalidad3").click(function () {
    var encabezado = $("#encabezado3").val();
    var proyecto = $("#id_proyecto").text();
    var bandera = 1;
    $("#cabezeraDatos").html(encabezado);
    $("#datos").removeClass("oculto");
    consultarDatos(encabezado, proyecto, bandera);
  });

  $("#tipo1").click(function () {
    var encabezado = $("#tabla1").val();
    var proyecto = $("#id_proyecto").text();
    var bandera = 2;
    console.log(encabezado);
    $("#cabezeraDatos").html("Pregrado");
    $("#datos").removeClass("oculto");
    consultarDatos(encabezado, proyecto, bandera);
  });
  $("#tipo2").click(function () {
    var encabezado = $("#tabla2").val();
    var proyecto = $("#id_proyecto").text();
    var bandera = 2;
    console.log(encabezado);
    $("#cabezeraDatos").html("Posgrado");
    $("#datos").removeClass("oculto");
    consultarDatos(encabezado, proyecto, bandera);
  });
  $("#tipo3").click(function () {
    var encabezado = $("#tabla3").val();
    var proyecto = $("#id_proyecto").text();
    var bandera = 2;
    console.log(encabezado);
    $("#cabezeraDatos").html("Virtual");
    $("#datos").removeClass("oculto");
    consultarDatos(encabezado, proyecto, bandera);
  });

  $("#start").change(function () {
    var fechaI = $("#start").val();
    $("#end").attr("min", fechaI);
    $("#end").attr("disabled", false);
    $("#end").val("");
  });

  $("#end").change(function(){
    var fechaI = $("#start").val();
    var fechaF = $("#end").val();
    var proyecto = $("#id_proyecto").text();
    var bandera = 3;
    //console.log("fecha inicial: "+fechaI+" fecha final: "+fechaF);
    consultaFiltro(proyecto, bandera, fechaI, fechaF);
  });
});
