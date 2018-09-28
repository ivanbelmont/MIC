function AjaxProcess(parametros,base_path,method,mensajeParam)
{
    var responseAjax;
    var asset='http://'+window.location.host+'/assets/img/generales/';

   $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   base_path, //archivo que recibe la peticion
                type:  method, //método de envio
                beforeSend: function () {
                 // $("#resultado").append("");
                  $("#resultado").html("<br><i style='color:#6fb3e0;' class='fa-li fa fa-spinner fa-spin fa-2x'></i> <b>Procesando, espere por favor...</b>").delay(2000).fadeOut();
                  $("#resultadoVentana").html("<br><i style='color:#6fb3e0;' class='fa-li fa fa-spinner fa-spin fa-2x'></i> <b>Procesando, espere por favor...</b>").delay(2000).fadeOut();
                  $("#procesando").html("<br><i style='color:#6fb3e0;' class='fa-li fa fa-spinner fa-spin fa-2x'></i> <b>Procesando, espere por favor...</b>").delay(2000).fadeOut();

                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                     //   $("#tablesorter").load('http://localhost/mic-agentes.com/inicio/Usuarios');//CARGAR
                     //  responseAjax= $("#resultado").html(response);
                       //$( "#TblUsers" ).load(window.location.href + "#TblUsers" );

                       localStorage.mensajeDone = "alJDMjdneTlQZ2NzUEd0N0dOY0Y1UT09";

                        let mensaje = mensajeParam;
                        localStorage.setItem("mensaje", JSON.stringify(mensaje));

                       // location.reload();
                        setTimeout(location.reload.bind(location), 2500);
     

                },
                error:  function (jqXHR, textStatus, errorThrown) { //si es error devuelve

                        if (jqXHR.status === 0) {

                    $("#resultado").html('Not connect: Verify Network.');

                  } else if (jqXHR.status == 404) {

                    $("#resultado").html('Requested page not found [404]');

                  } else if (jqXHR.status == 500) {

                    $("#resultado").html('Internal Server Error [500].');

                  } else if (textStatus === 'parsererror') {

                    $("#resultado").html('Requested JSON parse failed.');

                  } else if (textStatus === 'timeout') {

                    $("#resultado").html('Time out error.');

                  } else if (textStatus === 'abort') {

                    $("#resultado").html('Ajax request aborted.');

                  } else {

                    $("#resultado").html('Uncaught Error: ' + jqXHR.responseText);

                  }
                }//END ERROR CATALOGO
        });///////////////////////////////////////////////////////////////////////////END AJAX

return responseAjax;
}////////////////////////////////////////////////////////////////////////////////////END FUNCTION

function ajaxStringSn(url1,data1,Meto,Sys){

    /*Ajax estandar
    -Ajax que recibe una cadena de string 
    -URL1:PPagina destino del archivo
    -DATA1:cString con info a procesar 
    -METO:Metrodo por el que se enviara (Opcional, por default POST)
    -SYS:Determinar si es sincrtonico o asincronico (Opcional, por default false para obtener la variable antes de enviarla)
    */
    if(Meto==null){
        Meto="post";
    }//End if 
    
    if(Sys=null){
        Sys=false;
    }//End if 
    var res;//declaración de Respuesta
    $.ajax({
        url:url1,
        data:data1,
        cache:false,
        type:Meto,
        //async:Sys,
        async:false
        //esto sirve para el mandado de archivos (para que no se encripten)
       // processData:false,
        //dataType: "json",
        //contentType:false
    }).done(function(msj){
        res=msj;
        
    });//End ajax
    
    return res;
}
////////////////////////////////////////////////////////////////

function AjaxResponse(parametros,base_path,method,mensajeParam)
{
    var responseAjax;
    var asset='http://'+window.location.host+'/assets/img/generales/';

   $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   base_path, //archivo que recibe la peticion
                type:  method, //método de envio
                beforeSend: function () {
                 // $("#resultado").append("");

$("#resultado").html("<br><i style='color:#6fb3e0;' class='fa-li fa fa-spinner fa-spin fa-2x'></i> <b>Obteniendo informacion...</b>").delay(1000).fadeOut();
$("#resultadoVentana").html("<br><i style='color:#6fb3e0;' class='fa-li fa fa-spinner fa-spin fa-2x'></i> <b>Obteniendo informacion...</b>").delay(1000).fadeOut();

                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                     //   $("#tablesorter").load('http://localhost/mic-agentes.com/inicio/Usuarios');//CARGAR
                     //  responseAjax= $("#resultado").html(response);
                       //$( "#TblUsers" ).load(window.location.href + "#TblUsers" );

                       $("#mensajemodal").html(response);
                        },
                error:  function (jqXHR, textStatus, errorThrown) { //si es error devuelve

                        if (jqXHR.status === 0) {

                    $("#resultado").html('Not connect: Verify Network.');

                  } else if (jqXHR.status == 404) {

                    $("#resultado").html('Requested page not found [404]');

                  } else if (jqXHR.status == 500) {

                    $("#resultado").html('Internal Server Error [500].');

                  } else if (textStatus === 'parsererror') {

                    $("#resultado").html('Requested JSON parse failed.');

                  } else if (textStatus === 'timeout') {

                    $("#resultado").html('Time out error.');

                  } else if (textStatus === 'abort') {

                    $("#resultado").html('Ajax request aborted.');

                  } else {

                    $("#resultado").html('Uncaught Error: ' + jqXHR.responseText);

                  }
                }//END ERROR CATALOGO
        });///////////////////////////////////////////////////////////////////////////END AJAX

return responseAjax;
}////////////////////////////////////////////////////////////////////////////////////END FUNCTION

function AjaxValidate(parametros,base_path,method,mensajeParam,elemensaje)
{
    var ValidateAjax;
    $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   base_path, //archivo que recibe la peticion
                type:  method, //método de envio
                success:  function (response) {

                  $("#"+elemensaje).html("<b>"+response+"</b>");

                        },
                error:  function (jqXHR, textStatus, errorThrown) { //si es error devuelve

                      return 0;
                  
                }//END ERROR CATALOGO
        });///////////////////////////////////////////////////////////////////////////END AJAX

return ValidateAjax;
}////////////////////////////////////////////////////////////////////////////////////END FUNCTION