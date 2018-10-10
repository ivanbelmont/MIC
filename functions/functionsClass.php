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


	public static function barraazul($s) {

		echo '<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							MIC Sistema
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo BASE_PATH_ASSETS; ?>avatars/avatar.png" class="msg-photo" alt="Alexs Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo BASE_PATH_ASSETS; ?>avatars/avatar3.png" class="msg-photo" alt="Susans Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo BASE_PATH_ASSETS; ?>avatars/avatar4.png" class="msg-photo" alt="Bobs Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo BASE_PATH_ASSETS; ?>avatars/avatar2.png" class="msg-photo" alt="Kates Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php echo BASE_PATH_ASSETS; ?>avatars/avatar5.png" class="msg-photo" alt="Freds Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="'.BASE_PATH_ASSETS.'img/usuarios/'.$_SESSION["imagen"].'" 
								onerror="src=&#39;'.BASE_PATH_ASSETS.'img/usuarios/user.png&#39;"
								alt="User" />
								<span class="user-info">
									<small>Hola,</small>
									'.$_SESSION["nombre"]." ".$_SESSION["app"].'
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->';
		return 0;
	}
	////////////////////////////////// END function /////////////////////////////

		public static function barramenu($s) {


			?><div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div> --><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<?php

					$modulosr=funs_getDatos::ObtenerModulos();
					$dato='icono';
					$PerRol=$_SESSION["id_rol"];

					while ($fila = $modulosr->fetch_object()) 
					{

					$permisos=mic_system::PermisosRol($fila->nombre,$PerRol,$dato);
					//echo $permisos." - ".$PerRol;

					if($permisos=="M"){
						$estilo="";
					}
					elseif($permisos=="N") {
						$estilo="display:none;";
					}
					elseif ($permisos=="D") {
						$estilo="opacity:0.5;";
					}

					echo '<li style="'.$estilo.'" class="">
						<a href="'.$fila->mostrar.'">
							<i class="menu-icon fa '.$fila->icon.'"></i>
							<span class="menu-text"> '.ucfirst($fila->mostrar).' </span>
						</a>

						<b class="arrow"></b>
					</li>';
					}

					?>

				</ul><!-- end menu -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div><?php

				return 0;
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
		echo $query;

		echo "<br>afectadas=".$afectadas;

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


 }//END CLASS
?>
