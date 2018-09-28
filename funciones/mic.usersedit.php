
<script>

var base_path=window.location.host+'/';
base_path='http://'+base_path+'procesa/procesa.php';
var method='post';
var parametros;
var mensajeParam;
var Mensaje = localStorage.getItem("mensajeDone");


$(document).ready(function() {

//CARGA DATOS

    var parametros;


if(localStorage.getItem("getValor")){


var valor = localStorage.getItem("getValor");


var base_path=window.location.host+'/';
base_path='http://'+base_path+'procesa/procesa.php';

var method='post';
var mensajeParam;

 parametros = {

                "proceso" : "V2xkNGNISlhiSFZaVAVve126SNdlUT86",
                "valor" : valor
        };//END PARAMETROS

AjaxResponse(parametros,base_path,method,mensajeParam);


}//END IF

else{  document.getElementById("resultado").innerHTML = 
    '<div class="well"><i class="ace-icon orange fa fa-exclamation-triangle fa-3x"></i> <h4 class="orange smaller lighter">Datos no encontrados</h4>No se han encontrado datos para esta consulta.<br>Intentelo mas tarde.</div>'; 
$('#V2xkU2NHUkhSbmxrV0U0eFdWaEtjR0ozUFQwPQ').hide();
}

//END CARGA DATOS

//AL DAR CLIC AL BOTON DE ENVIAR

   $("#V2xkU2NHUkhSbmxrV0U0eFdWaEtjR0ozUFQwPQ").click(function(){

        var nombre = $('#nombre').val();
        var app = $('#app').val();
        var apm = $('#apm').val();
        var tel = $('#tel').val();
        var correo = $('#correo').val();
        var usuario = $('#correo').val();
        var celular = $('#celular').val();
        var proceso = $('#V2xkU2NHUkhSbmxrV0U0eFdWaEtjR0ozUFQwPQ').val();
        var id_int = localStorage.getItem("getValor");
        var asset='http://'+window.location.host+'/assets/img/generales/';


var parametros = {
                "nombre" : nombre,
                "app" : app,
                "apm" : apm,
                "tel" : tel,
                "correo" : correo,
                "celular" : celular,
                "usuario" : usuario,
                "proceso" : proceso,
                "id_int" : id_int
        };//END PARAMETROS

         mensajeParam = {

        tipo: "alert-info",
        titulo:   "Exito!",
        mensaje: "Usuario editado con exito"

        };//JSON OBJETOS
$("#procesando").html("<br><img height='5%' width='5%' src='"+asset+"load.gif'> <b>Procesando, espere por favor...</b>").delay(1000).fadeOut();
         AjaxProcess(parametros,base_path,method,mensajeParam);
       // AjaxResponse(parametros,base_path,method,mensajeParam);


});//END CLICK
// ///////////////////// END EDITAR USUARIO


//MENSAJES
if(Mensaje=="alJDMjdneTlQZ2NzUEd0N0dOY0Y1UT09"){

text = localStorage.getItem("mensaje");
obj = JSON.parse(text);


$("#mensajes").append('<div class="alert '+obj.tipo+'"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-check"></i>'+obj.titulo+'<br></strong>'+obj.mensaje+'<br /></div>').delay(5000).fadeOut();


localStorage.mensajeDone="NULL";

}

else
{

    $("#mensajes").append('');

}
//END MENSAJES
  
});//END READY

</script>

