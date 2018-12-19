<script>
	var server='<?php echo ROUTE; ?>';
</script>


<script src="<?=ASSETS?>js/mic.js"></script>
<script >
        var functionTrasJS = null;
        $(document).ready(function() {

<?php
switch ($modulo) {
		case 'users':
		?>
		
/*		function switchBtn(clickedID){
			alert(clickedID);

		btnSelected = jQuery('#' + clickedID).val();

		alert(btnSelected);
			}*/
			
		

			var BtnNew=$("#NewUser");
			var DivObscuro=$("#modalBack");

			//Seleccionar por atributo
			var BtnNewClose=$("[fnc='closeNew']");
			var BtnNewCreate=$("[fnc='createUser']");

			var titlewindow=$("#titulo");

			//MODAL
			document.addEventListener('DOMContentLoaded', function() {
			Modals.initComponents();
			});


			 function funJqueyTrans(id){ 
			 	var name=$("#"+id).attr('name');//PROCESS
			 	var value=$("#"+id).text();//ELEMENT TEXT
			 	var data=$("#"+id).attr('data');//ID USER O DATOS

				//alert(data);
				//  alert("Hi from JQueryn ID="+id+"\nProcess="+name+"\nvalue="+value);
				// alert(id);
              	var callprocess=name;
              
				switch (callprocess) {
				case 'V1ROS2JGbFlTakZqTTFab1kyMXNkZz09':
				$.switchBtn(id,name,value);
				break;

				case 'Wld4cGJXbHVZWEoxYzNWaGNtbHY':
				value=$("#"+id).attr('title');
				$.DelBtn(id,name,value);
				break;

				case 'WldScGRHRnlkWE4xWVhKcGJ3PT0':
				$.editUserBtn(id,name,data);
				break;
				
				}
        
        }  
        functionTrasJS = funJqueyTrans;




      	jQuery.switchBtn = function(Vid,Vprocess,Vvalue){
      	   //alert(Vid);// ID
      	   //alert(Vprocess);//PROCESS ID
      	parametros = {

                "Vprocess" : Vprocess,
                "valor" : Vid
        };//END PARAMETROS
        var typeMessage="";
        var MessageTxt="";
        var span=$("#"+Vid);

        if(Vvalue==="off")
        {
        	typeMessage=" alert alert-success alert-styled-left p-0 bg-white";
        	MessageTxt="El usuario se ha habilitado con éxito.";

		 span.removeClass("badge badge-danger",300);
		 span.addClass("badge badge-success",300);
		 span.text("on");


        }
        else {
        	typeMessage=" alert alert-danger alert-styled-left p-0";
        	MessageTxt="El usuario se ha deshabilitado con éxito.";

         span.removeClass("badge badge-success",300);
		 span.addClass("badge badge-danger",300);
		 span.text("off");
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


			jQuery.DelBtn = function(Vid,Vprocess,Vvalue=false)
		{

            bootbox.confirm({
                title: Vvalue,
                message: 'Al eliminar al usuario, toda su información también lo hará',
                buttons: {
                    confirm: {
                        label: 'Si',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-link'
                    }
                  },
                callback: function (result) {
                //CALL NOTIFI

                if(result){

					Vparameters = {
					"Vprocess" : Vprocess,
					"valor" : Vid
					};//END Vparameters

					//mensajeParam="";
					//messages="";

                AjaxProcDB(Vparameters,base_path,method,mensajeParam,messages);

				typeMessage=" alert alert-danger alert-styled-left p-0";
				MessageTxt="El usuario se ha eliminado con éxito.";


				/* reiniciar tabla */
				//var dataSet=[<?=$UserObj; ?>];
				//$('.datatable-generated').dataTable().fnClearTable();//la limpiamos
				//$('.datatable-generated').dataTable().fnAddData(dataSet);// volvemos a cargar los datos
				/* reiniciar tabla */



				//BUSCAR TU DATO EN ARRAY
/*				var quebusco = Vvalue;
                var idx = dataSet.indexOf(quebusco);

					var Vindex = $.grep(dataSet, function(v,i) {
					    return v[0] === Vvalue;
					});

                alert("busco esto "+quebusco);
                alert("Encontre esto "+Vindex);*/

                //BUSCAR PADRE DE ESTE ELEMENTO
                //obj=$("#"+Vid).parent().parent().parent();
                padre=$("#"+Vid).parent().parent();
                padre.css( "background", "yellow" );
                padre.attr({"id":"borrar"})
                //$(selector).attr({atributo1:valor1, atributo2:valor2,...})
               

                //En caso de que este responsivo, borrar hijo
               // var hijo = padre.children('.child');//buscar hijo
               // hijo.css( "background", "green" );


                //En caso de que este responsivo, borrar hermano
               var hermano= $('tr#borrar').siblings('tr.child');//Buscamos el hermano
                //hermano.css( "background", "green" );
                hermano.remove();//Eliminamos el elemento borrado (hermano)


                padre.remove();//Eliminamos el elemento borrado


			 new Noty({
                theme: typeMessage,
                text: MessageTxt,
                type: 'danger',
                progressBar: false,
                closeWith: ['button']
            }).show();
            }}
            });

			}//END DelBtn


			jQuery.editUserBtn = function(Vid,Vprocess,Vvalue){

				$('#modal_remote').addClass('show');
					$('#modal_remote').attr("aria-hidden", "false");
							$('#modal_remote').css({
							'display' : 'block',
							'opacity' : '0',
							'padding-right' : '17px'
							});

							//LOAD DATA WINDOW USER

							var datos=Vvalue;
							datos=b64_to_utf8(Vvalue);

							datos=createArray(datos,",");

							//alert(datos[1]);
							titlewindow.text("Editar usuario "+datos[1]);

							$('#id_int').val(datos[0]);
							$('#nombre').val(datos[1]);
							$('#app').val(datos[2]);
							$('#apm').val(datos[3]);
							$('#correo').val(datos[4]);
							$('#tel').val(datos[5]);
							$('#celular').val(datos[6]);
							$('#contrasena').val("");
							$('#contrasena').attr("placeholder", "Si se deja en blanco,"+
							 "no se modificará la contraseña actual");
							BtnNewCreate.text("Editar");
							BtnNewCreate.attr("fnc", "EditaUser");
							BtnNewCreate=$("[fnc='EditaUser']");

							var selec=$('#rol option[value='+datos[7]+']');
							selec.attr('selected', 'selected');

							obscurece(DivObscuro,"si");

						$( "#modal_remote" ).animate({
							opacity: 1
						}, 1000, function() {
						// Animation complete.
						});
						

			}//END function

			var BtnSwitch=$(".badge");
						BtnSwitch.click(function(){

							alert(this.id);
							alert($("#"+this.id).attr('name'));
							//alert(this.id.text());
							//alert(this.attr('name'));
						 });



			//$.switchBtn(this.element.id,this.element.name,this.element.checked);

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
/*var toolsX='';

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
        ];*/

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

			//MODAL NEW USER
				BtnNew.click(function(){
					console.log("Show");
				$('#modal_remote').addClass('show');
					$('#modal_remote').attr("aria-hidden", "false");
							$('#modal_remote').css({
							'display' : 'block',
							'opacity' : '0',
							'padding-right' : '17px'
							});

							obscurece(DivObscuro,"si");

							titlewindow.text("Nuevo usuario");
							$('#nombre').val("");
							$('#app').val("");
							$('#apm').val("");
							$('#correo').val("");
							$('#tel').val("");
							$('#celular').val("");
							$('#contrasena').val("");
							$('#contrasena').attr("placeholder", "Contraseña"+
								"(si se deja en blanco, el sistema asignara una)");
							BtnNewCreate.text("Crear");
							BtnNewCreate.attr("fnc", "createUser");
							BtnNewCreate=$("[fnc='createUser']");

						$( "#modal_remote" ).animate({
							opacity: 1
						}, 1000, function() {
						// Animation complete.
						});



				});//END CLICK

				BtnNewClose.click(function(){
					console.log("Show");
					$('#modal_remote').removeClass('show');
					$('#modal_remote').attr("aria-hidden", "true");
					//$('#modal_remote').css('display', 'block', 'important');
							$('#modal_remote').css({
							'display' : 'none',
							'padding-right' : '17px'
							});
							obscurece(DivObscuro,"no");
				});//END CLICK


				//BOTONES TECLADO JQUERY
				$(document).keyup(function(e) {
				  //if (e.keyCode === 13) alert("ENTER");     // enter
				  //if (e.keyCode === 27) alert("SCAPE");   // esc
				  if (e.keyCode === 27){
				  	//SCAPE
				  	$('#modal_remote').removeClass('show');
					$('#modal_remote').attr("aria-hidden", "true");
					//$('#modal_remote').css('display', 'block', 'important');
							$('#modal_remote').css({
							'display' : 'none',
							'padding-right' : '17px'
							});

				obscurece(DivObscuro,"no");
				  }//END SCAPE
				});

			/*SELECT CON ICONOS*/
			function iconFormat(icon) {
            var originalOption = icon.element;
            if (!icon.id) { return icon.text; }
            var $icon = '<i class="icon-' + $(icon.element).data('icon') + '"></i>' + icon.text;

            return $icon;
        }


			$('.select-icons').select2({
            templateResult: iconFormat,
            minimumResultsForSearch: Infinity,
            templateSelection: iconFormat,
            escapeMarkup: function(m) { return m; }
        });
			/*SELECT CON ICONOS*/


				function obscurece(Div,activo){

					if(activo==="si"){

					Div.addClass("modal-backdrop");
					Div.addClass("fade");
					Div.addClass("show");
				                       }
				    else{
					Div.removeClass("modal-backdrop");
					Div.removeClass("fade");
					Div.removeClass("show");
				    }
				}//END FUNCTION OBSCURECE


				BtnNewCreate.click(function(){

				var QuePRoceso=BtnNewCreate.attr("fnc");

					switch (QuePRoceso) 
					{
					case 'createUser':
					Vprocess='WTNKbFlXTnBiMjVrWlhWemRXRnlhVzg9';
					typeMessage=" alert alert-success alert-styled-left p-0 bg-white";
					MessageTxt="El usuario se ha creado con éxito.";

					break;


					case 'EditaUser':
					Vprocess='WldScGRHRnlkWE4xWVhKcGJ3PT0';
					typeMessage=" alert alert-success alert-styled-left p-0 bg-white";
					MessageTxt="El usuario se ha editado con éxito.";

					break;


				    }

				var id_int = $('#id_int').val();
				var nombre = $('#nombre').val();
				var app = $('#app').val();
				var apm = $('#apm').val();
				var tel = $('#tel').val();
				var correo = $('#correo').val();
				var celular = $('#celular').val();
				var rol = $('#rol').val();
				var usuario;
				var contrasena = $('#contrasena').val();


				var Vparameters = {
				"id_int" : id_int,
				"nombre" : nombre,
				"app" : app,
				"apm" : apm,
				"tel" : tel,
				"correo" : correo,
				"rol" : rol,
				"celular" : celular,
				"usuario" : correo,
				"contrasena" : contrasena,
				"Vprocess" : Vprocess
				};//END PARAMETROS

                mensajeParam="";
                messages="";

				AjaxProcDB(Vparameters,base_path,method,mensajeParam,messages);
				$('#modal_remote').removeClass('show');
				$('#modal_remote').attr("aria-hidden", "true");
						$('#modal_remote').css({
						'display' : 'none',
						'padding-right' : '17px'
						});
				obscurece(DivObscuro,"no");

			//CALL NOTIFI
			 new Noty({
                theme: typeMessage,
                text: MessageTxt,
                type: 'danger',
                progressBar: false,
                closeWith: ['button']
            }).show();

			 setTimeout("location.reload()", 3000);

				});//END CLICK



		<?php
		break;

		case 'clients':
		echo "clientes";
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

                  //$("#"+messages).append("<b>"+response+"</b>");
                 // alert(response); //TEST

					var str = response; 
					var n = str.search("1062");
					//alert(n);
                  if(n === -1) {
                  	
                  	console.log("done");
                  }
                  else {
                  	//alert(n);
                  	alert("El correo ingresado, ya se encuentra registrado, intente otro");
                  	setTimeout("location.reload()", 10);

                  }

                        },
                error:  function (jqXHR, textStatus, errorThrown) { //si es error devuelve

                      return 0;
                  
                }//END ERROR CATALOGO
        });///////////////////////////////////////////////////////////////////////////END AJAX

return ValidateAjax;
}////////////////////////////////////////////////////////////////////////////////////END FUNCTION
			});// END READY

		function FncClick(id){
				functionTrasJS(id);
			}

</script>