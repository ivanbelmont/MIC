
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

   $("#tablesorter").DataTable( {

        //AL OPRIMIR EL BOTON
        "fnDrawCallback": function( oSettings ) {

            console.log("Load Table is Done");
                    $( "table tbody tr td div a" ).on( "click", "#ZGVzaGFiaWxpdGFyY2xpZW50ZQ",function() {

/* event.preventDefault();
 console.log("Block"+event.type);*/

       var proceso = $('#ZGVzaGFiaWxpdGFyY2xpZW50ZQ').attr('id');
       var valor =  $(this).attr('name');
       console.log(proceso);
       console.log(valor);
         var responseAjax;

         parametros = {

                "proceso" : proceso,
                "valor" : valor
        };//END PARAMETROS

        mensajeParam = {

        tipo: "alert-info",
        titulo:   "Exito!",
        mensaje: "Operacion exitosa!!!"

        };//JSON OBJETOS

        AjaxProcess(parametros,base_path,method,mensajeParam);


});// ///////////////////////////////////////////////////END CLICK HABILITA/DESHABILITA USER

////ELIMINAR USER
$( "table tbody tr td div a" ).on( "click", "#c2Vwcm9jZWRlYWxpbWluYXJ1c2Vy",function() {

       var proceso = $('#c2Vwcm9jZWRlYWxpbWluYXJ1c2Vy').attr('id');
       var valor =  $(this).attr('name');
       console.log(proceso);
       console.log(valor);
         var responseAjax;

         parametros = {

                "proceso" : proceso,
                "valor" : valor
        };//END PARAMETROS

        mensajeParam = {

        tipo: "alert-warning",
        titulo:   "Eliminado!",
        mensaje: "Se eliminado el cliente con exito!"

        };//JSON OBJETOS

//AjaxProcess(parametros,base_path,method);
$("#botones").html('');
$("#exampleModalLabel").html("");
$("#exampleModalLabel").html('Confirmar operacion <i class="ace-icon red fa fa-info-circle fa-1x"></i>');

$("#mensajemodal").html("");
$("#mensajemodal").html(' Se eliminara el cliente y sus polizas<br>¿Continuar?');

/*$("#YESBUTTON").html("");
$("#YESBUTTON").html('SI');*/

$("#botones").html('<button type="button" id="YESBUTTON" class="btn btn-danger">SI</button><button type="button" id="NONUTTON" class="btn btn-secondary" data-dismiss="modal">NO</button>');

/*$("#NONUTTON").html("");
$("#NONUTTON").html('NO');
*/
});//END CLICK

$( "div" ).on( "click", "#YESBUTTON",function()
{

console.log("HAS SELECCIONADO UN SI A LOS PARAMETROS: "+parametros+" BASE PATH:"+base_path+" METODO:"+method);
//alert("HAS SELECCIONADO UN SI A LOS PARAMETROS: "+parametros+" BASE PATH:"+base_path+" METODO:"+method);
AjaxProcess(parametros,base_path,method,mensajeParam);
$("#exampleModalLabel").html("");
$("#mensajemodal").html("");
$("#NONUTTON").html("");
$("#YESBUTTON").html("");
});//END CLICK
//// ///////////////////////////////////////////////////////////////////////////////////////ELIMNINAR USER END


//////////////////////////////////////// EDITAR CLIENTE
$( "table tbody tr td div a" ).on( "click", "#ZWRpdGFyY2xpZW50ZXByb2Nlc28",function() {

       var proceso = $('#ZWRpdGFyY2xpZW50ZXByb2Nlc28').attr('id');
       var valor =  $(this).attr('name');
       console.log(proceso);
       console.log(valor);

       localStorage.getValorCli = valor;

});//END CLICK

//////////////////////////////////////// CARGA  POLIZA
$( "table tbody tr td div a" ).on( "click", "#ZXN0ZWVzdW5saW5rcGFyYW1vc3RyYXJwb2xpemFzZGVsY2xpZW50ZQ",function() {

       var proceso = $('#ZXN0ZWVzdW5saW5rcGFyYW1vc3RyYXJwb2xpemFzZGVsY2xpZW50ZQ').attr('id');
       var valor =  $(this).attr('name');
       console.log(proceso);
       console.log(valor);

       localStorage.getValorPoliza = valor;

});//END CLICK



                },
    "order": [[ 0, "desc" ]],
    //dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                title: 'Usuarios Report' 
            },
            {
                extend: 'copy' 
            }
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "todo"]]
} );
  
});//END READY

</script>

