<?php

class ActualizaDatos
{


     public function ActualizaUsuario($id)
     {
     //ANTES DE ACTUALIZAR, VER SI SE TIENE LOS PERMISOS DE SUPER ADMIN
     	//UN SUPER ADMIN, NO SE PUEDE PONER EN SUSPENCION 

		$mysqli = funs_DBclass::getConexion();


		$query="UPDATE mic_users SET id_status=0, estatus='off' WHERE id_interno='".$id."'";//CUIDAR EL SQL INYECTION
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		

		$afectadas=mysqli_affected_rows($mysqli);

		if($afectadas==0){

		$query="UPDATE mic_users SET id_status=1, estatus='on' WHERE id_interno='".$id."'";//CUIDAR EL SQL INYECTION
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		
		}
		echo $query;

		echo "<br>afectadas=".$afectadas;

		return mysqli_affected_rows($mysqli);
//COMPROBAR SI FUE EXITOSA
//ACTUALIZAR TABLA DEPUES DEL UPDATE

     }

public function AcessosCliente($id,$id_user,$id_rol)
     {
		$mysqli = funs_DBclass::getConexion();

		if($id_rol==0)
     	{ $param=""; }
     	else { $param="AND id_user='".$id_user."'";  }


		$query="UPDATE mic_clientes SET id_status=0, estatus='off' WHERE id_interno='".$id."' ".$param;//CUIDAR EL SQL INYECTION
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		$afectadas=mysqli_affected_rows($mysqli);

		if($afectadas==0){

		$query="UPDATE mic_clientes SET id_status=1, estatus='on' WHERE id_interno='".$id."' ".$param;//CUIDAR EL SQL INYECTION
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		
		}
		echo $query;

		echo "<br>afectadas=".$afectadas;

		return mysqli_affected_rows($mysqli);

     }// END FUNCTION



      public function EliminaUsuario($id)
     {
     //ANTES DE ACTUALIZAR, VER SI SE TIENE LOS PERMISOS DE SUPER ADMIN
     	//UN SUPER ADMIN, NO SE PUEDE PONER EN SUSPENCION 

		$mysqli = funs_DBclass::getConexion();


		$query="UPDATE mic_users SET eliminado=0 WHERE id_interno='".$id."'";//CUIDAR EL SQL INYECTION
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		$afectadas=mysqli_affected_rows($mysqli);
		echo $query;

		echo "<br>afectadas=".$afectadas;

		return mysqli_affected_rows($mysqli);
//COMPROBAR SI FUE EXITOSA
//ACTUALIZAR TABLA DEPUES DEL UPDATE

     }

     public function EditaCampo($campo,$id,$tabla,$dato,$camposerial=false)
     {

     	//VALIDAR TOKEN

     	if($camposerial)
     	{
     		

		$data = mic_funciones::desencriptar($dato);//ABRIR LOS DATOS

		$nuevo=mic_funciones::deserialzar($data);//QUITAR SERIAL Y HACER ARRAY

		$nuevo["nombre"] = 'NuevoNombre';//CAMBIAR POR MEDIO DE LA LLAVE EL VALOR DEL ARRAY

		$serializar=mic_funciones::serialzar($nuevo);//PONER SERIAL

		$proteger=mic_funciones::encriptar($serializar);// CERRAR LOS DATOs

		$dato=$proteger;
     	}

     	$mysqli = funs_DBclass::getConexion();
		$query="UPDATE ".$tabla." SET ".$campo."='".$dato."' WHERE id_interno='".$id."'";//CUIDAR EL SQL INYECTION
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		$afectadas=mysqli_affected_rows($mysqli);
		echo $query;

     	


     	return 1;
     }



      public function ActualizaDatosPro($val,$user,$id_int,$tabla)
     {
     	//COMPROBAR SI YA ESXISTE
     	//COMPROBAR PAQUETE O PLAN

		$mysqli = funs_DBclass::getConexion();
		$array_datos=$val;
//		var_dump($array_datos);
		$id_interno=$id_int;
		$id_interno=substr($id_interno, 32);

		$datos=mic_funciones::serialzar($array_datos);
		$datos=mic_funciones::encriptar($datos);

		echo $query="UPDATE ".$tabla." 
		SET usuario= '".$user."', datos= '".$datos."', editado= DEFAULT WHERE  id_interno = '".$id_interno."'";
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		echo $query;

		return mysqli_affected_rows($mysqli);
//COMPROBAR SI FUE EXITOSA

     }


     public function EliminaCliente($id,$id_user,$id_rol)
     {

		$mysqli = funs_DBclass::getConexion();
		if($id_rol==0)
     	{ $param=""; }
     	else { $param="AND id_user='".$id_user."'";  }


		$query="UPDATE mic_clientes SET eliminado=0 WHERE id_interno='".$id."' ".$param;//CUIDAR EL SQL INYECTION
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		$afectadas=mysqli_affected_rows($mysqli);
		echo $query;

		echo "<br>afectadas=".$afectadas;

		return mysqli_affected_rows($mysqli);
//COMPROBAR SI FUE EXITOSA
//ACTUALIZAR TABLA DEPUES DEL UPDATE

     }


 }//END CLASS
