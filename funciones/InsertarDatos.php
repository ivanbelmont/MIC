<?php


class InsertaDatos
{


     public function InsertaUsuarios($val,$user,$pass)
     {
     	//COMPROBAR SI YA ESXISTE
     	//COMPROBAR PAQUETE O PLAN

		$mysqli = funs_DBclass::getConexion();
		$id_interno=mic_funciones::aleatorio(5);
		$contrasena=mic_funciones::encriptar($pass);
		$array_datos=$val;

		$datos=mic_funciones::serialzar($array_datos);
		$datos=mic_funciones::encriptar($datos);

		$query="INSERT INTO mic_users (id_interno,usuario,contrasena,datos,id_rol,id_status) VALUES 
		('$id_interno','$user','$contrasena','$datos',0,1) ";
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		echo $query;

		return mysqli_affected_rows($mysqli);
//COMPROBAR SI FUE EXITOSA

     }


     public function InsertaClientes($val,$id_interno,$id_user)
     {

		$mysqli = funs_DBclass::getConexion();
		//$id_interno=mic_funciones::aleatorio(5);
		$array_datos=$val;

		$datos=mic_funciones::serialzar($array_datos);
		$datos=mic_funciones::encriptar($datos);

		$query="INSERT INTO mic_clientes (id_interno,datos,id_user) VALUES 
		('$id_interno','$datos','$id_user')";
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		echo $query;

		return mysqli_affected_rows($mysqli);
//COMPROBAR SI FUE EXITOSA

     }

     public function InsertaPoliza($poliza,$inf_asegurado,$desc_seguro,$coberturas,$adicionales,$id_cliente)
     {

		$mysqli = funs_DBclass::getConexion();
		$id_interno=mic_funciones::aleatorio(5);

		$inf_asegurado=mic_funciones::serialzar($inf_asegurado);
		$inf_asegurado=mic_funciones::encriptar($inf_asegurado);

		$desc_seguro=mic_funciones::serialzar($desc_seguro);
		$desc_seguro=mic_funciones::encriptar($desc_seguro);


		$coberturas=mic_funciones::serialzar($coberturas);
		$coberturas=mic_funciones::encriptar($coberturas);

		$adicionales=mic_funciones::serialzar($adicionales);
		$adicionales=mic_funciones::encriptar($adicionales);

		$adicionales=mic_funciones::serialzar($adicionales);
		$adicionales=mic_funciones::encriptar($adicionales);

		$poliza=mic_funciones::encriptar($poliza);

		$query="INSERT INTO mic_polizas (id_interno,poliza,inf_asegurado,desc_seguro,coberturas,adicionales,id_cliente) VALUES 
		('$id_interno','$poliza','$inf_asegurado','$desc_seguro','$coberturas','$adicionales','$id_cliente') ";
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		echo $query;

		return mysqli_affected_rows($mysqli);
//COMPROBAR SI FUE EXITOSA

     }

 }
