<?php
class funs_getDatos
{
	/**
	 * @var va a contener la conexión de base de datos
	 */
	public $_con;

     public function obtenerUsuarios()
     {

		 $mysqli = funs_DBclass::getConexion();
     	
		$result =$mysqli->query("SELECT * FROM mic_users WHERE eliminado=1") or die (mysqli_error($mysqli));
		$result->data_seek(0);
		funs_DBclass::CloseConexion();
        
			return $result;



     }
     ////////////// END FUNCTION //////////////////////

          public function obtenerDatoUnico($id,$tabla)
     {

		$mysqli = funs_DBclass::getConexion();
     	$query="SELECT * FROM ".$tabla." WHERE id_interno='".$id."'";
		$result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
		$result->data_seek(0);
		return $result;
     }

     ////////////// END FUNCTION //////////////////////

       public function obtenerPolizas($id,$tabla)
     {

        $mysqli = funs_DBclass::getConexion();
        $query="SELECT * FROM ".$tabla." WHERE id_cliente='".$id."'";
        $result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
        $result->data_seek(0);
        return $result;
     }

     ////////////// END FUNCTION //////////////////////


          public function ValidaUsuario($user,$pass)
     {

		$mysqli = funs_DBclass::getConexion();
		$pass= mic_funciones::encriptar($pass);
		$query="SELECT id_interno id_int FROM mic_users WHERE usuario='".$user."' AND contrasena='".$pass."'";
     	$result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
     	//echo $query;
     	$numero=mysqli_num_rows($result);
		$result->data_seek(0);
		$fila = $result->fetch_object();

		
		if($numero!=0){
		$result=$fila->id_int;
		$encontrados=$numero;
	}
	else
	{
		$result=0;
		$encontrados=0;
	}

		//echo $query;

		return array($result, $encontrados);
     }

     ////////////// END FUNCTION //////////////////////


      public function ObtenerModulos()
     {

		$mysqli = funs_DBclass::getConexion();
     	$query="SELECT * FROM mic_modulos WHERE tipo = 'panel' order by orden";
		$result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
		$result->data_seek(0);
        
			return $result;
     }
     ////////////// END FUNCTION //////////////////////


      public function ObtenerModuloUnico($nombre)
     {

		$mysqli = funs_DBclass::getConexion();
     	$query="SELECT * FROM mic_modulos WHERE mostrar='$nombre'";
		$result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
		$result->data_seek(0);
		//echo $query;
		$numero=mysqli_num_rows($result);

		if($numero!=0){
			$fila = $result->fetch_object();
			

            $dato='icono';
            $PerRol=$_SESSION["id_rol"];
            $permisos=mic_system::PermisosRol($fila->nombre,$PerRol,$dato);
                    if($permisos=="M"){
                    $resultado=strtolower($fila->nombre);
                    }
                    elseif($permisos=="N") {
                        $resultado="error";
                    }
                    elseif ($permisos=="D") {
                        $resultado="bloqueado";
                    }



			return $resultado;
		}
		else
		{

		return "error";

		}
		


     }
     ////////////// END FUNCTION //////////////////////

      public function ObtenerCampo($campo)
     {

     	$datos=$_SESSION["datos"];

     	$datos=mic_funciones::desencriptar($datos);

     	$datos=mic_funciones::deserialzar($datos);

     	$datosN[]=$datos;

     	return $datosN[0][$campo];


     }
     ////////////// END FUNCTION //////////////////////

      public function ObtenerCampoBase($datos,$campo)
     {

     	$datos=mic_funciones::desencriptar($datos);

     	$datos=mic_funciones::deserialzar($datos);

     	$datosN[]=$datos;

        if(isset($datosN[0][$campo])){

     	return $datosN[0][$campo];
     }

     else {
        return "";
     }


     }
     ////////////// END FUNCTION //////////////////////

      public function ObtenerCampoSimple($dato)
     {
     	//CONVERTIMOS DATO A ENTERO PARA EVITAR SQL INYECCION
		$mysqli = funs_DBclass::getConexion();

	//$dato=mic_funciones::desencriptar('SWFYY1BjblpkMGQzODV5V0hqNlQydz09');
	$dato=mic_funciones::encriptar($dato);

		//echo $query="SELECT COUNT(poliza) cont FROM mic_polizas WHERE poliza=".intval($dato);
	    $query="SELECT COUNT(poliza) cont FROM mic_polizas WHERE poliza='".$dato."'";
     	$result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
		$result->data_seek(0);
        
			return $result;
     }
     ////////////// END FUNCTION //////////////////////

      public function obtenerArrayDatos($datos)
     {

     	
		//ABRIMOS LOS DATOS
		$datos = mic_funciones::desencriptar($datos);

		//QUITAMOS EN SERIAL
		$datos=mic_funciones::deserialzar($datos);

     	return $datos;


     }
     ////////////// END FUNCTION //////////////////////

      public function obtenerClientes()
     {
     	$id_user=$_SESSION["id_intV"];
     	$id_rol=$_SESSION["id_rol"];

     	if($id_rol==0)
     	{ $param=""; }
     	else { $param="id_user='".$id_user."' AND";  }




		$mysqli = funs_DBclass::getConexion();
     	
		$result =$mysqli->query("SELECT * FROM mic_clientes WHERE ".$param." eliminado=1") or die (mysqli_error($mysqli));
		$result->data_seek(0);
		funs_DBclass::CloseConexion();
        
			return $result;



     }
     ////////////// END FUNCTION //////////////////////

      public function obtenerPermisos()
     {
        $mysqli = funs_DBclass::getConexion();
        
        $result =$mysqli->query("SELECT p.`modulo`,r.`descripcion` rol,CONCAT('En ',m.`tipo`) ubicado,
p.`icono` permiso,m.`mostrar`
FROM mic_permisos p, mic_rols r,mic_modulos m
WHERE p.`permiso_id`=r.`id`
AND m.`nombre`= p.`modulo`
ORDER BY p.`permiso_id`") or die (mysqli_error($mysqli));
        $result->data_seek(0);
        funs_DBclass::CloseConexion();
        
            return $result;
     }
     ////////////// END FUNCTION //////////////////////

           public function obtenerNomPermisos($permiso)
     {
        switch ($permiso) {
            case 'M':
                $result="Visible";
                break;
            case 'N':
                $result="No Visible";
                break;
            case 'D':
                $result="Bloqueado";
                break;
            
            default:
                # code...
                break;
        }
            return $result;
     }
     ////////////// END FUNCTION //////////////////////


 }
