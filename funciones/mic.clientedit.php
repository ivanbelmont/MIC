

<script>



// var base_path=window.location.host+'/';

// base_path='http://'+base_path+'procesa/procesa.php';

var method='post';

var parametros;

var mensajeParam;

var Mensaje = localStorage.getItem("mensajeDone");





$(document).ready(function() {



//CARGA DATOS



    var parametros;





if(localStorage.getItem("getValorCli")){





var valor = localStorage.getItem("getValorCli");





var base_path=window.location.host+'/';

base_path='http://'+base_path+'procesa/procesa.php';



var method='post';

var mensajeParam;



 parametros = {



                "proceso" : "ZWRpdGFyY2xpZW50ZXByb2Nlc28",

                "valor" : valor

        };//END PARAMETROS



AjaxResponse(parametros,base_path,method,mensajeParam);





}//END IF



else{  document.getElementById("resultado").innerHTML = 

    '<div class="well"><i class="ace-icon orange fa fa-exclamation-triangle fa-3x"></i> <h4 class="orange smaller lighter">Datos no encontrados</h4>No se han encontrado datos para esta consulta.<br>Intentelo mas tarde.</div>'; 

$('#Ym90b25wYXJhaWRlbnRpZmljYXJjbGllbnRlZWRpdGFy').hide();

}



//END CARGA DATOS



//AL DAR CLIC AL BOTON DE ENVIAR



   $("#Ym90b25wYXJhaWRlbnRpZmljYXJjbGllbnRlZWRpdGFy").click(function(){



        var nombre = $('#nombre').val();

        var apellidop = $('#apellidop').val();

        var apellidom = $('#apellidom').val();

        var telefono = $('#telefono').val();

        var correo = $('#correo').val();

        var celular = $('#celular').val();

        var usuario = "N/A";

        var proceso = $('#Ym90b25wYXJhaWRlbnRpZmljYXJjbGllbnRlZWRpdGFy').val();

        var id_int = localStorage.getItem("getValorCli");

        var asset='http://'+window.location.host+'/assets/img/generales/';





var parametros = {

                "nombre" : nombre,

                "apellidop" : apellidop,

                "apellidom" : apellidom,

                "telefono" : telefono,

                "correo" : correo,

                "celular" : celular,

                "usuario" : usuario,

                "proceso" : proceso,

                "id_int" : id_int

        };//END PARAMETROS



         mensajeParam = {



        tipo: "alert-info",

        titulo:   "Exito!",

        mensaje: "Cliente editado con exito"



        };//JSON OBJETOS

$("#procesando").html("<br><img height='5%' width='5%' src='"+asset+"load.gif'> <b>Procesando, espere por favor...</b>").delay(1000).fadeOut();

       AjaxProcess(parametros,base_path,method,mensajeParam);

       //AjaxResponse(parametros,base_path,method,mensajeParam);





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



