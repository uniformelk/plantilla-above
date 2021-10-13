function iniciarProyecto(tareasR, id) {
  var tareas = tareasR;
  var idProyecto = id;

  $.ajax({
    //async: true,
    type: "POST",
    url: "includes/functions/proyectos/query.php",
    data: {
      bandera: 2,
      tareas: tareas,
      idProyecto: idProyecto,
    },
    dataType: "json",
    beforeSend: function () {
      $("#btnIniciarProyecto").prop("disabled", true);
    },
    error: function (request, status, error) {
      alert(request.responseText);
    },
    success: function (respuesta) {
      switch (respuesta.estado) {
        case 1:
          document.location = "detalle_proyecto.php?id=" + idProyecto;
          break;
        case 2:
          console.log(respuesta.mensaje);
          break;
        default:
          alert("Se ha producido un error");
          break;
      }
    },
    complete: function () {
      $("#btnIniciarProyecto").prop("disabled", false);
    },
  });
}

function terminarProyecto(id) {
  var idProyecto = id;

  $.ajax({
    //async: true,
    type: "POST",
    url: "includes/functions/proyectos/query.php",
    data: {
      bandera: 3,
      idProyecto: idProyecto,
    },
    dataType: "json",
    beforeSend: function () {
      $("#terminarProyecto").prop("disabled", true);
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
      $("#terminarProyecto").prop("disabled", false);
    },
  });
}

$(document).ready(function () {
  $("#btnIniciarProyecto").click(function () {
    var tareaUno = $("#tareaUno").val();
    var tareaDos = $("#tareaDos").val();
    var tareaTres = $("#tareaTres").val();
    var tareaCuatro = $("#tareaCuatro").val();
    var tareaCinco = $("#tareaCinco").val();
    var idProyecto = $("#idProyecto").val();
    var tareas = [];

    if (tareaUno != "") {
      tareas.push(tareaUno);
    }
    if (tareaDos != "") {
      tareas.push(tareaDos);
    }
    if (tareaTres != "") {
      tareas.push(tareaTres);
    }
    if (tareaCuatro != "") {
      tareas.push(tareaCuatro);
    }
    if (tareaCinco != "") {
      tareas.push(tareaCinco);
    }
    if (tareas.length > 0) {
      iniciarProyecto(tareas, idProyecto);
    } else {
      $("#errorIniciarProyecto").removeClass("oculto");
    }
  });

  $("#terminarProyecto").click(function () {
    var id = "";
    id = $("#idProyecto").val();
    terminarProyecto(id);
  });
});
