<?php


define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$6$rounds=4567$abcdefghijklmnop$');
define('SECRET_IV', '101712');

//NOTA PARA IVAN: ¿USAREMOS TOKENS O ESTO YA ESTA AGREGADO?
//SI SE USARA, MAs AUN NO ESTA AGREGADO


class mic_funciones
{
	
	public static function encriptar($param1,$nivel=false)
	{

		$salida=FALSE;
		$key=hash('sha256', SECRET_KEY);
		$iv=substr(hash('sha256', SECRET_IV), 0,16);
		$salida=openssl_encrypt($param1, METHOD, $key, 0, $iv);
		$salida=base64_encode($salida);

		return $salida;

		//return crypt($param1, '$6$rounds=4567$abcdefghijklmnop$');

	}

	////////////////////////////////// END function /////////////////////////////

	public static function desencriptar($param1,$nivel=false)
	{

		$key=hash('sha256', SECRET_KEY);
		$iv=substr(hash('sha256', SECRET_IV), 0, 16);
		$salida=openssl_decrypt(base64_decode($param1), METHOD, $key, 0, $iv);

		return $salida;


	}
	////////////////////////////////// END function /////////////////////////////

	public static function serialzar($param)

	{


		$datos=(serialize($param));

		return $datos;
	}
	////////////////////////////////// END function /////////////////////////////

		public static function deserialzar($param)

	{


		$datos=(unserialize($param));

		return $datos;
	}
	////////////////////////////////// END function /////////////////////////////

	public static function arregloSaca($elArreglo)
{

 //$elArreglo=unserialize(base64_decode($elArreglo));	
	$elArreglo=unserialize($elArreglo);	
	return $elArreglo;
}
////////////////////////////////// END function /////////////////////////////

public static function aleatorio($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;


	}
	////////////////////////////////// END function /////////////////////////////

	public static function Sesiones($s) {

		if($s==0){
			echo '<script type="text/javascript">
	alert("No has iniciado sesion");
	location.href ="'.ROUTE.'";
</script>';
		        }
		return 0;
		//CONFIGURAR ALERTAS CON DISEÑO
	}
	////////////////////////////////// END function /////////////////////////////

	public static function pdf($texto,$param1,$param2,$espacios,$repetidas) {


$buscar=$param1;
$punto0 = strpos($texto,$buscar);
$punto1 = strpos($texto, $buscar, $punto0 + strlen($buscar));


if($repetidas>1){

	$puntox=$punto1;
}
else { $puntox=$punto0; }

///////////////////////////////////


$corte1=substr($texto,$puntox+strlen($buscar));

$buscar=$param2;
$punto2 = strpos($corte1,$buscar);
$corte2=substr($corte1,0,$punto2);



$buscar=" ";
$punto3 = strpos(ltrim($corte2),$buscar);
$corte3=substr($corte2,$punto3+$espacios);



$result=$corte3;


		
		return $result;

	}
	////////////////////////////////// END function /////////////////////////////


public static function creararray($array) {
   $arrayN = array();
$max = sizeof($array);

for ($i=0; $i < $max; $i++) { 
	
	//array_push($arrayN, $array[$i]['id']= $array[$i]['valor']);
	//array_push_assoc($arrayN, $array[$i]['id'], $array[$i]['valor']);
	self::array_push_assoc($arrayN, $array[$i]['id'], $array[$i]['valor']);
}

return $arrayN;
	}
	////////////////////////////////// END function /////////////////////////////



public static function array_push_assoc(&$array, $key, $value) {
 $array[$key] = $value;
return $array;
	}
	////////////////////////////////// END function /////////////////////////////



public static function NomBonitos($valor) {


switch ($valor) {
	case 'apellidop':
	case 'app':
		$nombre="apellido paterno";
		break;

	case 'nombre':
		$nombre="Nombre(s)";
		break;

	case 'apellidom':
	case 'apm':
		$nombre="Apellido Materno";
		break;

	case 'telefono':
	case 'tel':
		$nombre="Teléfono";
		break;

	case 'celular':
		$nombre="Celular";
		break;

	case 'correo':
		$nombre="correo";
		break;

	default:
	$nombre ="sin Dato";
		break;
}



		return ucwords($nombre);
	}
	////////////////////////////////// END function /////////////////////////////



}//END CLASS FUNIONES


class mic_system
{

	public static function LoadElements($module) {
		$serieJs=mic_funciones::aleatorio(8);

		switch ($module) {
			case 'users':
				?>
	<!-- JS TABLES -->
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/forms/selects/select2.min.js"></script>

	<!-- JS BUTTONS -->
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/extensions/contextmenu.js"></script>

	<!-- JS NOTIFICATIONS -->
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/notifications/jgrowl.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/notifications/noty.min.js"></script>

    <!-- JS GENERAL -->
	<script src="<?php echo ASSETS; ?>js/app.js"></script>

	
	<script src="<?php echo ASSETS_GLOBAL; ?>js/demo_pages/datatables_responsive.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/demo_pages/table_elements.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/demo_pages/extra_jgrowl_noty.js"></script>

				<?php
				break;

				default:
					?>
<script src="<?php echo ASSETS; ?>js/app.js?u=<?=$serieJs; ?>"></script>

					<?php
					break;
			
		}//END SWITCH
?>
<?php
	}
////////////////////////////////// END function /////////////////////////////

	public static function ActionButtons($icono,$title,$color,$proceso,$name,$modal=false) {

echo '<a  '.$modal.' class="'.$color.'" title="'.$title.'">
				<i id="'.$proceso.'" name="'.$name.'" title="'.$title.'" class="ace-icon fa '.$icono.' fa-2x"></i>
			</a>';
				

					return 0;

	}
////////////////////////////////// END function /////////////////////////////

	public static function ActionButMin($icono,$title,$color,$proceso,$name,$modal=false){


echo '
				<div class="inline pos-rel">
				<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
					<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
				</button>

				<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
				<li>
					<a  href="'.$name.'" id="'.$proceso.'" onclick="javascript:void(0);" class="'.$color.' tooltip-error" data-rel="tooltip" title="'.$title.'">
							<span class="'.$color.'">
								<i class="ace-icon fa '.$icono.'"></i>
							</span>
						</a>
				</li>
					</ul>
					</div>';

					return 0;



	}
	////////////////////////////////// END function /////////////////////////////


	public static function PermisosRol($Modulo,$Permiso,$dato){


		$mysqli = funs_DBclass::getConexion();
     	$query="SELECT * FROM mic_permisos p WHERE p.`modulo`='".$Modulo."' AND permiso_id = '".$Permiso."'";
		$result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
		$result->data_seek(0);

		$fila = $result->fetch_object();

		switch ($dato) {
			case 'icono':
			$resultado=strtoupper($fila->icono);
				break;

			default:
			$resultado=strtoupper("N/A");
			break;
		}
			return $resultado;

	}
	////////////////////////////////// END function /////////////////////////////



}//END CLASS

class ActualizaDatos
{


     public static function ActualizaUsuario($id)
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
		//echo $query;
		//echo "<br>afectadas=".$afectadas;

		return mysqli_affected_rows($mysqli);
//COMPROBAR SI FUE EXITOSA
//ACTUALIZAR TABLA DEPUES DEL UPDATE

     }

public static function AcessosCliente($id,$id_user,$id_rol)
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



      public static function EliminaUsuario($id)
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

     public static function EditaCampo($campo,$id,$tabla,$dato,$camposerial=false)
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



      public static function ActualizaDatosPro($val,$user,$id_int,$tabla)
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


     public static function EliminaCliente($id,$id_user,$id_rol)
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

 class InsertaDatos
{


     public static function InsertaUsuarios($val,$user,$pass)
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


     public static function InsertaClientes($val,$id_interno,$id_user)
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

     public static function InsertaPoliza($poliza,$inf_asegurado,$desc_seguro,$robo,$resp_civil,$gastos_ocupantes,$gatos_legales,$asistencia,$muerte,$materiales,$adicionales,$id_cliente)
     {

		$mysqli = funs_DBclass::getConexion();
		$id_interno=mic_funciones::aleatorio(5);

		$inf_asegurado=mic_funciones::serialzar($inf_asegurado);
		$inf_asegurado=mic_funciones::encriptar($inf_asegurado);

		$desc_seguro=mic_funciones::serialzar($desc_seguro);
		$desc_seguro=mic_funciones::encriptar($desc_seguro);


		$materiales=mic_funciones::serialzar($materiales);
		$materiales=mic_funciones::encriptar($materiales);


		$robo=mic_funciones::serialzar($robo);
		$resp_civil=mic_funciones::serialzar($resp_civil);
		$gastos_ocupantes=mic_funciones::serialzar($gastos_ocupantes);
		$gatos_legales=mic_funciones::serialzar($gatos_legales);
		$asistencia=mic_funciones::serialzar($asistencia);
		$muerte=mic_funciones::serialzar($muerte);

		$robo=mic_funciones::encriptar($robo);
		$resp_civil=mic_funciones::encriptar($resp_civil);
		$gastos_ocupantes=mic_funciones::encriptar($gastos_ocupantes);
		$gatos_legales=mic_funciones::encriptar($gatos_legales);
		$asistencia=mic_funciones::encriptar($asistencia);
		$muerte=mic_funciones::encriptar($muerte);

		$adicionales=mic_funciones::serialzar($adicionales);
		$adicionales=mic_funciones::encriptar($adicionales);

		$poliza=mic_funciones::encriptar($poliza);

		$query="INSERT INTO mic_polizas (id_interno,poliza,inf_asegurado,desc_seguro,robo,resp_civil,gastos_ocupantes,gatos_legales,asistencia,muerte,materiales,adicionales,id_cliente) VALUES 
		('$id_interno','$poliza','$inf_asegurado','$desc_seguro','$robo','$resp_civil','$gastos_ocupantes','$gatos_legales','$asistencia','$muerte','$materiales','$adicionales','$id_cliente') ";
		$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query); 

		echo $query;

		return mysqli_affected_rows($mysqli);
//COMPROBAR SI FUE EXITOSA

     }

 }//END CLASS

 class funs_getDatos
{
	/**
	 * @var va a contener la conexión de base de datos
	 */
	public $_con;

     public static function obtenerUsuarios()
     {

		 $mysqli = funs_DBclass::getConexion();
     	
		$result =$mysqli->query("SELECT * FROM mic_users WHERE eliminado=1") or die (mysqli_error($mysqli));
		$result->data_seek(0);
		funs_DBclass::CloseConexion();
        
			return $result;



     }
     ////////////// END FUNCTION //////////////////////

          public static function obtenerDatoUnico($id,$tabla)
     {

		$mysqli = funs_DBclass::getConexion();
     	$query="SELECT * FROM ".$tabla." WHERE id_interno='".$id."'";
		$result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
		$result->data_seek(0);
		return $result;
     }

     ////////////// END FUNCTION //////////////////////

       public static function obtenerPolizas($id,$tabla)
     {

        $mysqli = funs_DBclass::getConexion();
        $query="SELECT * FROM ".$tabla." WHERE id_cliente='".$id."'";
        $result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
        $result->data_seek(0);
        return $result;
     }

     ////////////// END FUNCTION //////////////////////


          public static function ValidaUsuario($user,$pass)
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


      public static function ObtenerModulos()
     {

		$mysqli = funs_DBclass::getConexion();
     	$query="SELECT * FROM mic_modulos WHERE tipo = 'panel' order by orden";
		$result =$mysqli->query($query) or die (mysqli_error($mysqli)."<br>".$query);
		$result->data_seek(0);
        
			return $result;
     }
     ////////////// END FUNCTION //////////////////////


      public static function ObtenerModuloUnico($nombre)
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

      public static function ObtenerCampo($campo)
     {

     	$datos=$_SESSION["datos"];

     	$datos=mic_funciones::desencriptar($datos);

     	$datos=mic_funciones::deserialzar($datos);

     	$datosN[]=$datos;

     	return $datosN[0][$campo];


     }
     ////////////// END FUNCTION //////////////////////

      public static function ObtenerCampoBase($datos,$campo)
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

      public static function ObtenerCampoSimple($dato)
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

      public static function obtenerArrayDatos($datos)
     {

     	
		//ABRIMOS LOS DATOS
		$datos = mic_funciones::desencriptar($datos);

		//QUITAMOS EN SERIAL
		$datos=mic_funciones::deserialzar($datos);

     	return $datos;


     }
     ////////////// END FUNCTION //////////////////////

      public static function obtenerClientes()
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

      public static function obtenerPermisos()
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

           public static function obtenerNomPermisos($permiso)
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

     public static function ObtenerRol($id_rol,$complement=false)
     {
		 $mysqli = funs_DBclass::getConexion();
     	
		$result =$mysqli->query("SELECT descripcion,color FROM mic_rols WHERE id=".$id_rol) or die (mysqli_error($mysqli));
		$result->data_seek(0);
        $fila = $result->fetch_object();

        switch ($complement) {
        	case 'nom':
        		$result=$fila->descripcion;
        		break;
        	case 'color':
        		$result=$fila->color;
        			break;
        	
        	default:
        	$result=$fila->descripcion;
        		break;
        }
        




			return $result;
     }
     ////////////// END FUNCTION //////////////////////


 }//END CLASS
?>
