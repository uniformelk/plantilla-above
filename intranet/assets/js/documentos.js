function crearDocumento() {
  var id_proyecto = $("#proyectoDoc").val();
  var descripcion = $("#descripcionDoc").val();
  var tipo = $("#tipoDoc").val();
  var url = $("#urlDoc").val();

  $.ajax({
    //async: true,
    type: "POST",
    url: "includes/functions/documentos/query.php",
    data: {
      bandera: 1,
      id_proyecto: id_proyecto,
      descripcion: descripcion,
      tipo: tipo,
      url: url,
    },
    dataType: "json",
    beforeSend: function () {
      $("#crearDocumento").prop("disabled", true);
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
      $("#crearDocumento").prop("disabled", false);
    },
  });
}
$(document).ready(function () {
  $("#crearDocumento").click(function () {
    crearDocumento();
  });
});
