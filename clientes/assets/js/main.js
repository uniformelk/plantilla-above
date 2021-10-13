$(document).ready(function(){
    $("#inicioSesion").click(function(){
        var usuario = $("#user").val();
        var password = $("#pass").val();
        if(usuario=='' || password ==''){
            $("#mensajeAlerta").removeClass("oculto");
            setInterval(ocultar, 5000);
        }else{
            validaLogin(usuario, password);
        }
        
    })
});

function ocultar(){
    $("#mensajeAlerta").addClass("oculto");
}

function validaLogin(user, pass){
    $.ajax({
        async: true,
        type: "POST",
        url: "includes/functions/system/validaLogin.php",
        data: {
            usuario: user,
            password: pass
        },
        dataType: 'json',
        //beforeSend: function (){},
        error: function (request, status, error){
            alert(request.responseText);
        },
        success: function (respuesta){
            switch(respuesta.estado){
                case 1:
                    window.location='paneldecontrol';
                break;
                case 2:
                    $("#mensajeAlerta").removeClass("oculto");
                    setInterval(ocultar, 5000);
                break;
            }
            
            
        },
        
    });
}