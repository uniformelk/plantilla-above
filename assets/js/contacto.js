$(document).ready(function(){
    function ocultar() {
        $("#mensajeAlerta").addClass("oculto");
    }
    function ocultarS(){
        $("#mensajeSuccess").addClass("oculto");
    }
    function enviarCorreo(nombre, correo, asunto, mensaje){
        $.ajax({
            async: true,
            type: "POST",
            url: "includes/functions/system/queryMail.php",
            data: {
                nombre: nombre,
                correo: correo,
                asunto: asunto,
                mensaje: mensaje
            },
            dataType: 'json',
            //beforeSend: function (){},
            error: function (request, status, error){
                alert(request.responseText);
            },
            success: function (respuesta){
                switch(respuesta.estado){
                    case 1:
                        
                    break;
                    case 2:
                        console.log("no enviado");
                    break;
                }
                
                
            },
            
        });
    }
    $("#contacto").click(function(){
        var nombre = $("#nombre").val();
        var correo = $("#email").val();
        var asunto  = $("#asunto").val();
        var mensaje = $("#mensaje").val();
        if(nombre=='' || correo =='' || mensaje == ''){
            $("#mensajeAlerta").removeClass("oculto");
            setInterval(ocultar, 5000);
        }else{
            enviarCorreo(nombre, correo, asunto, mensaje);
            $("#nombre").val('');
            ("#email").val('');
            $("#asunto").val('');
            $("#mensaje").val('');
            $("#mensajeSuccess").removeClass("oculto");
            setInterval(ocultarS, 5000);
        }
        
    })
});