<script >

var server='<?php echo ROUTE; ?>';
base_path=server+'process/process.php';

var method='post';
var parametros;
var mensajeParam;
//alert(base_path);
Vprocess="V1ROS2JGbFlTakZqTTFab1kyMXNkZz09";
valor="test";



        mensajeParam = {

        tipo: "alert-info",
        titulo:   "Exito!",
        mensaje: "Operacion exitosa!!!"

        };//JSON OBJETOS

        messages="messages";

<?php
switch ($modulo) {
		case 'users':
		?>
		
/*		function switchBtn(clickedID){
			alert(clickedID);

		btnSelected = jQuery('#' + clickedID).val();

		alert(btnSelected);
			}*/
			
		$(document).ready(function() {
      		jQuery.switchBtn = function(param,param2,param3){
      	   //alert(param);//U ID
      	    //alert(param2);//PROCESS ID
      	parametros = {

                "Vprocess" : param2,
                "valor" : param
        };//END PARAMETROS
        var typeMessage="";
        var MessageTxt="";

        if(param3===true)
        {
        	typeMessage=" alert alert-success alert-styled-left p-0 bg-white";
        	MessageTxt="El usuario se ha habilitado con éxito.";
        }
        else {
        	typeMessage=" alert alert-danger alert-styled-left p-0";
        	MessageTxt="El usuario se ha deshabilitado con éxito.";
        }

			 AjaxProcDB(parametros,base_path,method,mensajeParam,messages);

			 //CALL NOTIFI
			 new Noty({
                theme: typeMessage,
                text: MessageTxt,
                type: 'danger',
                progressBar: false,
                closeWith: ['button']
            }).show();


			}//END function



		<?php
		break;
	
	default:
		# code...
		break;
}//END SWITCH
?>

function AjaxProcDB(parametros,base_path,method,mensajeParam,messages)
{
	console.log("Ajax"+base_path);
    var ValidateAjax;
    $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   base_path, //archivo que recibe la peticion
                type:  method, //método de envio
                success:  function (response) {

                  $("#"+messages).append("<b>"+response+"</b>");

                        },
                error:  function (jqXHR, textStatus, errorThrown) { //si es error devuelve

                      return 0;
                  
                }//END ERROR CATALOGO
        });///////////////////////////////////////////////////////////////////////////END AJAX

return ValidateAjax;
}////////////////////////////////////////////////////////////////////////////////////END FUNCTION
			});// END READY

</script>