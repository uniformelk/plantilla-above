function crearProyecto() {
  
  var cliente = $("#cliente").val();
  var proyecto = $("#proyecto").val();
  var descripcion = $("#descripcion").val();
  var alcance = $("#alcance").val();
  var numeroUno = $("#numero1").val();
  var descripcionServicioUno = $("#descripcionServicio1").val();
  var valorUno = $("#valor1").val();
  var numeroDos = $("#numero2").val();
  var descripcionServicioDos = $("#descripcionServicio2").val();
  var valorDos = $("#valor2").val();
  var numeroTres = $("#numero1").val();
  var descripcionServicioTres = $("#descripcionServicio3").val();
  var valorTres = $("#valor3").val();
  var valorT = $("#valorT").val();

  $.ajax({
    //async: true,
    type: "POST",
    url: "includes/functions/proyectos/query.php",
    data: {
      bandera: 1,
      cliente: cliente,
      proyecto: proyecto,
      descripcion: descripcion,
      alcance: alcance,
      numeroUno: numeroUno,
      descripcionServicioUno: descripcionServicioUno,
      valorUno: valorUno,
      numeroDos: numeroDos,
      descripcionServicioDos: descripcionServicioDos,
      valorDos: valorDos,
      numeroTres: numeroTres,
      descripcionServicioTres: descripcionServicioTres,
      valorTres: valorTres,
      valorT: valorT
    },
    dataType: "json",
    beforeSend: function () {
      $("#crearProyecto").prop("disabled", true);
    },
    error: function (request, status, error) {
      alert(request.responseText);
    },
    success: function (respuesta) {
      switch (respuesta.estado) {
        case 1:
          $("#myModalSuccessBody").html(respuesta.mensaje);
          $("#myModalSuccess").modal("show");
          break;
        case 2:
          $("#myModalWarningBody").html(respuesta.mensaje);
          $("#myModalWarning").modal("show");
          break;
        default:
          alert("Se ha producido un error");
          break;
      }
    },
    complete: function (){
      $("#crearProyecto").prop("disabled", false);
    }
  });
}

$(document).ready(function () {
  $("#crearProyecto").click(function () {
    //console.log("hola mundo");
    crearProyecto();
    //console.log("2");
  });

  $("#valor1").change(function () {
    var valorTotal = 0;
    var valor1 = "";
    var valor2 = "";
    var valor3 = "";
    valor1 = parseInt($("#valor1").val());
    valor2 = parseInt($("#valor2").val());
    valor3 = parseInt($("#valor3").val());
    valorTotal = valor1 + valor2 + valor3;
    $("#valorT").val(valorTotal);
  });

  $("#valor2").change(function () {
    var valorTotal = 0;
    var valor1 = "";
    var valor2 = "";
    var valor3 = "";
    valor1 = parseInt($("#valor1").val());
    valor2 = parseInt($("#valor2").val());
    valor3 = parseInt($("#valor3").val());
    valorTotal = valor1 + valor2 + valor3;
    $("#valorT").val(valorTotal);
  });

  $("#valor3").change(function () {
    var valorTotal = 0;
    var valor1 = "";
    var valor2 = "";
    var valor3 = "";
    valor1 = parseInt($("#valor1").val());
    valor2 = parseInt($("#valor2").val());
    valor3 = parseInt($("#valor3").val());
    valorTotal = valor1 + valor2 + valor3;
    $("#valorT").val(valorTotal);
  });

  $("#completarCrearcion").click(function(){
    document.location = 'proyectos.php';
  });
});
