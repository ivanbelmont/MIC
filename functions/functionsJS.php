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

			/*var BtnSwitch=$(".badge");
			BtnSwitch.click(function(){

				alert(this.id);
				alert($("#"+this.id).attr('name'));
				//alert(this.id.text());
				//alert(this.attr('name'));
			 });

			$('.BtnSwitch').each(function (){
			alert($(this).attr('name'));
			});
*/
			/*jQuery.switchBtnAdd = function(param)
			{
				console.log(param);
		    }//END function*/
			//var BtnSwitch=$("div.datatable-footer").find('a.paginate_button');


/*			BtnSwitch.click(function(){
        $("div.BtnSwitch").each(function(){
            //alert($(this).text())
            this.append('<input name="V1ROS2JGbFlTakZqTTFab1kyMXNkZz09" id="1" type="checkbox" >');
        });
    });*/

			//BtnSwitch.trigger('click');
var toolsX='';

			var dataSetXXX = [
            ['Trident','Internet Explorer 4.0','Win 95+','4','X','HIS',toolsX],
            ['Trident','Internet Explorer 5.0','Win 95+','5','C','HIS',toolsX],
            ['Trident','Internet Explorer 5.5','Win 95+','5.5','A','HIS',toolsX],
            ['Trident','Internet Explorer 6','Win 98+','6','A','HIS',toolsX],
            ['Gecko','Firefox 1.0','Win 98+ / OSX.2+','1.7','A','HIS',toolsX],
            ['Gecko','Firefox 1.5','Win 98+ / OSX.2+','1.8','A','HIS',toolsX],
            ['Gecko','Firefox 2.0','Win 98+ / OSX.2+','1.8','A','HIS',toolsX],
            ['Gecko','Firefox 3.0','Win 2k+ / OSX.3+','1.9','A','HIS',toolsX],
            ['Gecko','Camino 1.0','OSX.2+','1.8','A','HIS',toolsX],
            ['Gecko','Camino 1.5','OSX.3+','1.8','A','HIS',toolsX],
            ['Webkit','Safari 1.2','OSX.3','125.5','A','HIS',toolsX],
            ['Webkit','Safari 1.3','OSX.3','312.8','A','HIS',toolsX],
            ['Webkit','Safari 2.0','OSX.4+','419.3','A','<input name="V1ROS2JGbFlTakZqTTFab1kyMXNkZz09" id="X" type="checkbox" >',toolsX],
            ['Presto','Opera 7.0','Win 95+ / OSX.1+','-','A','HIS',toolsX],
            ['Presto','Opera 7.5','Win 95+ / OSX.2+','-','A','HIS',toolsX],
            ['Misc','NetFront 3.1','Embedded devices','-','C','HIS',toolsX],
            ['Misc','NetFront 3.4','Embedded devices','-','A','HIS',toolsX],
            ['Misc','Dillo 0.8','Embedded devices','-','TEst','<input name="V1ROS2JGbFlTakZqTTFab1kyMXNkZz09" id="X" type="checkbox" >',toolsX],
            ['Garrett Winters','Edinburgh','Tokyo','8422','<span class="badge badge-info">$320,800</span>','HIS',toolsX]
        ];

        var dataSet=[<?=$UserObj; ?>];


        

                // Table config
        var table = $('.datatable-generated').DataTable({
           data: dataSet,
           responsive: {
                details: {
                    type: 'column',
                    target: -1
                }
            },
            columnDefs: [
                {
                    className: 'control',
                    orderable: false,
                    targets: -1
                }
            ]
        });

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