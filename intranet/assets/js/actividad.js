function mostrarDatos() {
  $.ajax({
    //async: true,
    type: "POST",
    url: "includes/functions/actividad/query.php",
    data: {
      bandera: 1,
    },
    dataType: "json",
    error: function (request, status, error) {
      alert(request.responseText);
    },
    success: function (respuesta) {
      var mydata = respuesta.data;
      //console.log(mydata);

      // Set new default font family and font color to mimic Bootstrap's default styling
      (Chart.defaults.global.defaultFontFamily = "Nunito"),
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#858796";

      // Pie Chart Example
      var ctx = document.getElementById("myPieChart");
      var myPieChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: ["Fallidos", "Correctos"],
          datasets: [
            {
              data: mydata[0],
              backgroundColor: ["#e74a3b", "#1cc88a"],
              hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false,
          },
          cutoutPercentage: 80,
        },
      });
    },
  });
}

$(document).ready(function () {
  mostrarDatos();
});
