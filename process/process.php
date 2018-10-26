<?php 
include ("../config.php");
session_start();

$Vprocess=$_POST['Vprocess'];
$id_user=$_SESSION["id_intV"];
$id_rol=$_SESSION["id_rol"];

switch ($Vprocess) {
	case 'V1ROS2JGbFlTakZqTTFab1kyMXNkZz09':

	$idUser=$_POST['valor'];
	$idUser=substr($idUser,0,-20);
	ActualizaDatos::ActualizaUsuario($idUser);

	break;//DISABLE AND ENABLE USER

		default:
		echo "Opción invalida";
		die();
		break;

		
}

?>