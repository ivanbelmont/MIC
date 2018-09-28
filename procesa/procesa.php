 <div class="form_status"  align="center" id="test"></div>
<?php 
include ("../config.php");
session_start();

$proceso=$_POST['proceso'];
$id_user=$_SESSION["id_intV"];
$id_rol=$_SESSION["id_rol"];

/*echo 

$nombre.
$app.
$apm.
$tel.
$correo;
*/

//echo "proceso Id=".$proceso;
//echo "<br>".substr($proceso,0,-5);



switch ($proceso) {
	case 'V1ROS2JGbFlTakZqTTFab1kyMXNkZz09':


		$nombre=$_POST['nombre'];
		$app=$_POST['app'];
		$apm=$_POST['apm'];
		$tel=$_POST['tel'];
		$correo=$_POST['correo'];
		$celular=$_POST['celular'];
		$usuario=$_POST['correo'];//ES EL MISMO USUARIO Y CORREO PARA INGRESAR
		//$contrasena=$_POST['contrasena'];
		$contrasena=mic_funciones::aleatorio(5);


		$array_datos['nombre']=$nombre;
		$array_datos['app']=$app;
		$array_datos['apm']=$apm;
		$array_datos['tel']=$tel;
		$array_datos['celular']=$celular;
		$array_datos['correo']=$correo;

InsertaDatos::InsertaUsuarios($array_datos,$usuario,$contrasena);
// 		if($nombre=="ivan"){

// 			$done=0;
// 		}

// else
// {

// InsertaDatos::InsertaUsuarios($array_datos,$usuario,$contrasena);


// }


break;
// ////////////////////////////////// END CASE CREATE USER


case "HabilitaUser":

$valor=$_POST['valor'];
echo "Se cambia el ID=".substr($valor,-5);
ActualizaDatos::ActualizaUsuario(substr($valor,-5));
	
break;

// ////////////////////////////////// END CASE UPDATE USER

case 'ZGVzaGFiaWxpdGFyY2xpZW50ZQ':


$valor=$_POST['valor'];
echo "Se cambia el ID=".substr($valor,-5);
ActualizaDatos::AcessosCliente(substr($valor,-5),$id_user,$id_rol);

break;
// /////////////////////////////////  DESHABILITA O HABILITA USER

	case 'V2xkNGNHSlhiSFZaV0VveFl6SldlUT09':
		

	$valor=$_POST['valor'];
echo "Se cambia el ID=".substr($valor,-5);
ActualizaDatos::EliminaUsuario(substr($valor,-5));

break;


//ELIMINA CLIENTES
case 'c2Vwcm9jZWRlYWxpbWluYXJ1c2Vy':
		

	$valor=$_POST['valor'];
echo "Se cambia el ID=".substr($valor,-5);
ActualizaDatos::EliminaCliente(substr($valor,-5),$id_user,$id_rol);

break;

case 'V2xkNGNISlhiSFZaVAVve126SNdlUT86':
//OBTENER USUARIO PARA EDITAR


	$valor=$_POST['valor'];
	$rest = funs_getDatos::obtenerDatoUnico(substr($valor,-5),'mic_users');
   	$fila = $rest->fetch_object();

   //	echo "id= ".$fila->id_interno."<br>";
   	//echo '<label><b>Usuario</b></label><input id="usuario" name="usuario" type="text" value="'.$fila->usuario.'">';
   //	echo "rol= ".$fila->id_rol."<br>";
    //echo "imagen= ".$fila->imagen."<br>";
    $arrDatos=funs_getDatos::obtenerArrayDatos($fila->datos);
		//OBTENEMOS LAS CABECERAS
		$cabeceras=array_keys($arrDatos);

		//RECORREMOS EL ARRAY DE DATOS, CON SUS CABECERAS

		for ($i=0; $i<sizeof($cabeceras);$i++)
		{
			$NomCampo=mic_funciones::NomBonitos($cabeceras[$i]);

		//echo '<label><b>'.$cabeceras[$i].'</b></label><input id="'.$cabeceras[$i].'" name="array_datos" type="text" value="'.$arrDatos[$cabeceras[$i]].'">';
		//echo '<label><b>'.$cabeceras[$i].'</b></label><input id="'.$cabeceras[$i].'" name="array_datos'.$cabeceras[$i].'" type="text" value="'.$arrDatos[$cabeceras[$i]].'">';
		//echo '<label><b>'.$cabeceras[$i].'</b></label><input id="'.$cabeceras[$i].'" name="'.$cabeceras[$i].'" type="text" value="'.$arrDatos[$cabeceras[$i]].'">';
		//${"v".$cabeceras[$i]}=$cabeceras[$i];

		echo '
	<div class="form-group has-success">
	<label for="nombre" class="col-xs-12 col-sm-1 control-label no-padding-right">'.ucwords($cabeceras[$i]).'</label>
	<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
	<input type="text" id="'.$cabeceras[$i].'" name="'.$cabeceras[$i].'" placeholder="'.$NomCampo.'" class="width-100" value="'.$arrDatos[$cabeceras[$i]].'" required>
	<i class="ace-icon fa fa-check-circle"></i>
	</span>
	</div>
	<div class="help-block col-xs-12 col-sm-reset inline"> 
	</div>
	</div>
	<div class="space-8"></div>';

		}

		

	break;

// //////////////////// EDITAR CLIENTE
	case 'ZWRpdGFyY2xpZW50ZXByb2Nlc28':

$valor=$_POST['valor'];
	$rest = funs_getDatos::obtenerDatoUnico(substr($valor,-5),'mic_clientes');
   	$fila = $rest->fetch_object();
    $arrDatos=funs_getDatos::obtenerArrayDatos($fila->datos);
		//OBTENEMOS LAS CABECERAS
		$cabeceras=array_keys($arrDatos);

		//RECORREMOS EL ARRAY DE DATOS, CON SUS CABECERAS
		echo "<h2>Editar Cliente</h2>";
		for ($i=0; $i<sizeof($cabeceras);$i++)
		{
			$NomCampo=mic_funciones::NomBonitos($cabeceras[$i]);
		echo '
	<div class="form-group has-success">
	<label for="nombre" class="col-xs-12 col-sm-1 control-label no-padding-right">'.ucwords($cabeceras[$i]).'</label>
	<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
	<input type="text" id="'.$cabeceras[$i].'" name="'.$cabeceras[$i].'" placeholder="'.$NomCampo.'" class="width-100" value="'.$arrDatos[$cabeceras[$i]].'" required>
	<i class="ace-icon fa fa-check-circle"></i>
	</span>
	</div>
	<div class="help-block col-xs-12 col-sm-reset inline"> 
	</div>
	</div>
	<div class="space-8"></div>';

		}

		break;



// //////////////////// OBTENER LAS POLIZAS DEL CLIENTE
	case 'ZXN0ZWVzdW5saW5rcGFyYW1vc3RyYXJwb2xpemFzZGVsY2xpZW50ZQ':
	echo "<h1>Polizas</h1>";
	$valor=$_POST['valor'];
	//echo substr($valor,-5);

	$clienteData=funs_getDatos::obtenerDatoUnico(substr($valor,-5),'mic_clientes');
	$filaCliente=$clienteData->fetch_object();

	//echo $filaCliente->datos;
	$NomCampo="";
	$arrDatos=funs_getDatos::obtenerArrayDatos($filaCliente->datos);
	//var_dump($arrDatos);
	$cabeceras=array_keys($arrDatos);
			for ($i=0; $i<sizeof($cabeceras);$i++)
		{
		$NomCampo.='<address>
		<strong>'.mic_funciones::NomBonitos($cabeceras[$i]).'</strong>
		<br />
		'.$arrDatos[$cabeceras[$i]].'
		</address>';
		}

	echo '<div class="col-sm-6">
				<div class="widget-box">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title smaller">
							<i class=""></i>
							Cliente
						</h4>
					</div>
					<div class="widget-body">
						 <div class="widget-main">
							<!-- <div class="row">
								<div class="col-xs-12">
									<blockquote class="pull-left">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
										<small>
											Someone famous
											<cite title="Source Title">Source Title</cite>
										</small>
									</blockquote>
								</div>
							</div>

							<hr /> -->
							'.$NomCampo.'
						</div>
					</div>
				</div>
			</div><br>';
			$NomCampoN="";
//$NomCampoN.='<div class="form-group row">';
	$rest = funs_getDatos::obtenerPolizas(substr($valor,-5),'mic_polizas');
   	while ($fila = $rest->fetch_object()){
   		//echo $fila->id_interno."<br>";
   		$arrDatos=funs_getDatos::obtenerArrayDatos($fila->inf_asegurado);
   		$cabeceras=array_keys($arrDatos);
			for ($i=0; $i<sizeof($cabeceras);$i++)
		{
/*		$NomCampoN.='<address>
		<strong>'.mic_funciones::NomBonitos($cabeceras[$i]).'</strong>
		<br />
		'.$arrDatos[$cabeceras[$i]].'
		</address>';*/

$NomCampoN.='<div class="col-md-3">'.
            '<label for="ex1"><b>'.mic_funciones::NomBonitos($cabeceras[$i]).'</b></label>: '.
            $arrDatos[$cabeceras[$i]].
          '</div>';
        
		}
//$NomCampoN.='</div>';

echo '<div class="row">
		<div class="col-xs-12 col-sm-12 widget-container-col">
			<div class="widget-box collapsed">
				<div class="widget-header">
					<h5 class="widget-title">Poliza <b>'.mic_funciones::desencriptar($fila->poliza).'</b></h5>

					<div class="widget-toolbar">
						<div class="widget-menu">
							<a href="#" data-action="settings" data-toggle="dropdown">
								<i class="ace-icon fa fa-bars"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
								<li>
									<a data-toggle="tab" href="#dropdown1">Option#1</a>
								</li>

								<li>
									<a data-toggle="tab" href="#dropdown2">Option#2</a>
								</li>
							</ul>
						</div>

						<a href="#" data-action="fullscreen" class="orange2">
							<i class="ace-icon fa fa-expand"></i>
						</a>

						<a href="#" data-action="reload">
							<i class="ace-icon fa fa-refresh"></i>
						</a>

						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-down"></i>
						</a>

						<a href="#" data-action="close">
							<i class="ace-icon fa fa-times"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					<br />
					<div class="form-group row">
					'.$NomCampoN.'
					</div>
					</address>
					</div>
				</div>
			</div>
		</div>
	</div>';
	$NomCampoN="";
   	}//END WHILE

   	break;

/////////////////////////////////////////////////////////////7
	case 'WlhOMGIyVnpkVzV3Y205alpYTnZaR1ZsWkdsMFlYSndZV3BoY21WMFpYTT0':

	//echo "LLEGUE";
	$valor=$_POST['valor'];

	echo json_decode($valor);



		break;

		case 'ZXN0ZWVzZWxwcm9jZXNvcGFyYWVkaXRhcmFsdXN1YXJpbw':
		//EDITAR USUARIO
		

		$nombre=$_POST['nombre'];
		$app=$_POST['app'];
		$apm=$_POST['apm'];
		$tel=$_POST['tel'];
		$correo=$_POST['correo'];
		$celular=$_POST['celular'];
		$usuario=$_POST['usuario'];
		$id_int=$_POST['id_int'];


		$array_datos['nombre']=$nombre;
		$array_datos['app']=$app;
		$array_datos['apm']=$apm;
		$array_datos['tel']=$tel;
		$array_datos['celular']=$celular;
		$array_datos['correo']=$correo;

		ActualizaDatos::ActualizaDatosPro($array_datos,$usuario,$id_int,'mic_users');



			break;

		case 'cHJvY2Vzb3BhcmFlZGl0YXJjbGllbnRl':
		//EDITAR CLIENTE PROCESO
		$usuario="n/a";
		$nombre=$_POST['nombre'];
		$apellidop=$_POST['apellidop'];
		$apellidom=$_POST['apellidom'];
		$telefono=$_POST['telefono'];
		$celular=$_POST['celular'];
		$correo=$_POST['correo'];
		$id_int=$_POST['id_int'];


		$array_datos['nombre']=$nombre;
		$array_datos['apellidop']=$apellidop;
		$array_datos['apellidom']=$apellidom;
		$array_datos['telefono']=$telefono;
		$array_datos['celular']=$celular;
		$array_datos['correo']=$correo;

		ActualizaDatos::ActualizaDatosPro($array_datos,$usuario,$id_int,'mic_clientes');

			break;


			case 'WTNKbFlYSnVkV1YyYjJOc2FXVnVkR1U9':
				
				$nombre = $_POST['nombre'];
				$apellidop = $_POST['apellidop'];
				$apellidom = $_POST['apellidom'];
				$telefono = $_POST['telefono'];
				$celular = $_POST['celular'];
				$correo = $_POST['correo'];
				

				//START ARRAY OBJECT
				$materieles=$_POST['dmateriales'];
				$materialesN=mic_funciones::creararray($materieles);
				print("<pre>".print_r($materialesN,true)."</pre>");//MUESTRA ARRAY

			    //START ARRAY OBJECT
				$robo=$_POST['robo'];
				$roboN=mic_funciones::creararray($robo);
				print("<pre>".print_r($roboN,true)."</pre>");//MUESTRA ARRAY

                //START ARRAY OBJECT
				$respciv=$_POST['respciv'];
				$respcivN=mic_funciones::creararray($respciv);
				print("<pre>".print_r($respcivN,true)."</pre>");//MUESTRA ARRAY

                //START ARRAY OBJECT
				$gastmed=$_POST['gastmed'];
				$gastmedN=mic_funciones::creararray($gastmed);
				print("<pre>".print_r($gastmedN,true)."</pre>");//MUESTRA ARRAY

                //START ARRAY OBJECT
				$gastleg=$_POST['gastleg'];
				$gastlegN=mic_funciones::creararray($gastleg);
				print("<pre>".print_r($gastlegN,true)."</pre>");//MUESTRA ARRAY

                //START ARRAY OBJECT
				$asistv=$_POST['asistv'];
				$asistvN=mic_funciones::creararray($asistv);
				print("<pre>".print_r($asistvN,true)."</pre>");//MUESTRA ARRAY

                //START ARRAY OBJECT
				$muerte=$_POST['muerte'];
				$muerteN=mic_funciones::creararray($muerte);
				print("<pre>".print_r($muerteN,true)."</pre>");//MUESTRA ARRAY

                //START ARRAY OBJECT
				$vinfaseg=$_POST['vinfaseg'];
				$vinfasegN=mic_funciones::creararray($vinfaseg);
				print("<pre>".print_r($vinfasegN,true)."</pre>");//MUESTRA ARRAY


				//START ARRAY OBJECT
				$descvehi=$_POST['descvehi'];
				$descvehiN=mic_funciones::creararray($descvehi);
				print("<pre>".print_r($descvehiN,true)."</pre>");//MUESTRA ARRAY



				//START ARRAY OBJECT
				$fcalculos=$_POST['fcalculos'];
				$fcalculosN=mic_funciones::creararray($fcalculos);
				print("<pre>".print_r($fcalculosN,true)."</pre>");//MUESTRA ARRAY


				$array_datos['nombre'] = $nombre;
				$array_datos['apellidop'] = $apellidop;
				$array_datos['apellidom'] = $apellidom;
				$array_datos['telefono'] = $telefono;
				$array_datos['celular'] = $celular;
				$array_datos['correo'] = $correo;
				print("<pre>".print_r($array_datos,true)."</pre>");
				$id_user=$_SESSION["id_intV"];

				$id_interno=mic_funciones::aleatorio(5);
				$poliza=$vinfasegN['basics'];

				InsertaDatos::InsertaClientes($array_datos,$id_interno,$id_user);
				InsertaDatos::InsertaPoliza($poliza,$vinfasegN,$descvehiN,$materialesN,$fcalculosN,$id_interno);
				break;


				//CASO PARA VALIDAR SI UN CAMPO EXISTE
				case 'ZW52aWFtb3NwYXJhdmFsaWRhcg==':

				$campovalidar=$_POST['campovalidar'];
				$result = funs_getDatos::ObtenerCampoSimple($campovalidar);
				$fila = $result->fetch_object();

				if($fila->cont>=1)
				{
					echo "La poliza ".$campovalidar."\nya existe, se actualizara la informaci¨®n<br>";
				}
				break;
	
	default:
		echo "Opci¨®n invalida";
		die();
		break;
}



/*function creararray($array){

$arrayN = array();
$max = sizeof($array);

for ($i=0; $i < $max; $i++) { 
	
	//array_push($arrayN, $array[$i]['id']= $array[$i]['valor']);
	array_push_assoc($arrayN, $array[$i]['id'], $array[$i]['valor']);
}

return $arrayN;

}


function array_push_assoc(&$array, $key, $value){
$array[$key] = $value;
return $array;
}*/



?>