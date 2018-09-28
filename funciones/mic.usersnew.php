
<script>

var base_path=window.location.host+'/';
base_path='http://'+base_path+'procesa/procesa.php';
var method='post';
var parametros;
var mensajeParam;
var Mensaje = localStorage.getItem("mensajeDone");

if(Mensaje=="alJDMjdneTlQZ2NzUEd0N0dOY0Y1UT09"){

//$("#mensajes").append('<h1 id="mensajecont" class="text-success texto-azul">Usuario Existente</h1><div class="espacio2"></div>').delay(5000).fadeOut();

text = localStorage.getItem("mensaje");
obj = JSON.parse(text);


$("#mensajes").append('<div class="alert '+obj.tipo+'"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-check"></i>'+obj.titulo+'<br></strong>'+obj.mensaje+'<br /></div>').delay(5000).fadeOut();


localStorage.mensajeDone="NULL";

}

else
{

    $("#mensajes").append('');

}


$(document).ready(function() {

   $("#btnenviar").click(function(){

        var nombre = $('#nombre').val();
        var app = $('#app').val();
        var apm = $('#apm').val();
        var tel = $('#tel').val();
        var correo = $('#correo').val();
        var celular = $('#celular').val();
        var usuario = $('#usuario').val();
        var contrasena = $('#contrasena').val();
        var proceso = $('#btnenviar').val();


var parametros = {
                "nombre" : nombre,
                "app" : app,
                "apm" : apm,
                "tel" : tel,
                "correo" : correo,
                "celular" : celular,
                "usuario" : usuario,
                "contrasena" : contrasena,
                "proceso" : proceso
        };//END PARAMETROS

         mensajeParam = {

        tipo: "alert-info",
        titulo:   "Exito!",
        mensaje: "Operacion exitosa!!!"

        };//JSON OBJETOS


       AjaxProcess(parametros,base_path,method,mensajeParam);



});//END CLICK
// ///////////////////// END ENVIAR DATOS PARA CREAR USUARIOS
  
});//END READY

</script>

