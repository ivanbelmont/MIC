<?php 
include ("../config.php");
session_start();

$Vprocess=$_POST['Vprocess'];
$id_user=$_SESSION["id_intV"];
$id_rol=$_SESSION["id_rol"];

switch ($Vprocess) {


	//ENABLE AND DISABLE USER
	case 'V1ROS2JGbFlTakZqTTFab1kyMXNkZz09':

	$idUser=$_POST['valor'];
	$idUser=substr($idUser,0,-20);
	ActualizaDatos::ActualizaUsuario($idUser);
	break;//DISABLE AND ENABLE USER


	//DELETE USER
	case 'Wld4cGJXbHVZWEoxYzNWaGNtbHY':

		$idUser=$_POST['valor'];
		$idUser=substr($idUser,0,-20);
		$idUser=substr($idUser,5);

		ActualizaDatos::DeleteUser($idUser);
		break;

	//CREATE USER
	case 'WTNKbFlXTnBiMjVrWlhWemRXRnlhVzg9':

		$nombre=$_POST['nombre'];
		$app=$_POST['app'];
		$apm=$_POST['apm'];
		$tel=$_POST['tel'];
		$correo=$_POST['correo'];
		$celular=$_POST['celular'];
		$rol=$_POST['rol'];
		$usuario=$_POST['correo'];//ES EL MISMO USUARIO Y CORREO PARA INGRESAR
		$contrasena=$_POST['contrasena'];


		$array_datos['nombre']=$nombre;
		$array_datos['app']=$app;
		$array_datos['apm']=$apm;
		$array_datos['tel']=$tel;
		$array_datos['cel']=$celular;
		$array_datos['correo']=$correo;
		InsertaDatos::InsertaUsuarios($array_datos,$usuario,$contrasena,$rol);
		break;

	//EDITAR USER
	case 'WldScGRHRnlkWE4xWVhKcGJ3PT0':

		$id_int=$_POST['id_int'];
		$nombre=$_POST['nombre'];
		$app=$_POST['app'];
		$apm=$_POST['apm'];
		$tel=$_POST['tel'];
		$correo=$_POST['correo'];
		$celular=$_POST['celular'];
		$rol=$_POST['rol'];
		$usuario=$_POST['correo'];//ES EL MISMO USUARIO Y CORREO PARA INGRESAR
		$contrasena=$_POST['contrasena'];


		$array_datos['nombre']=$nombre;
		$array_datos['app']=$app;
		$array_datos['apm']=$apm;
		$array_datos['tel']=$tel;
		$array_datos['cel']=$celular;
		$array_datos['correo']=$correo;
		ActualizaDatos::UpdateUser($id_int,$array_datos,$usuario,$contrasena,$rol);
		break;

		

		default:
			echo "Opción invalida";
			die();
			break;
		
}//ENDF SWITCH

?>