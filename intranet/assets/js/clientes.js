function crearCliente() {
  var id_cliente = $("#id_cliente").val();
  var nombre_cliente = $("#nombre_cliente").val();

  $.ajax({
    //async: true,
    type: "POST",
    url: "includes/functions/clientes/query.php",
    data: {
      bandera: 1,
      id_cliente: id_cliente,
      nombre_cliente: nombre_cliente,
    },
    dataType: "json",
    beforeSend: function () {
      $("#crearCliente").prop("disabled", true);
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
    complete: function () {
      $("#crearCliente").prop("disabled", false);
    },
  });
}
$(document).ready(function () {
  $("#crearCliente").click(function () {
    crearCliente();
  });
});
