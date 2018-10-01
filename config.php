<?php
//error_reporting(0);


//$puerto = $_SERVER['HTTPS'] ? 'https://' : 'http://';
$puerto = 'http://';
define( 'BASE_PATH', $puerto .  $_SERVER['SERVER_NAME'] .'/');//Ruta base donde se encuentra la carpeta
$CONF = $_SERVER['SERVER_NAME'].'/';

define( 'DB_HOST', 'localhost' );//Servidor de la base de datos
define( 'DB_USERNAME', 'micagent_user');//Usuario de la base de datos
define( 'DB_PASSWORD', 'rNQTWEKsSJeHu24d');//Contraseña de la base de datos
define( 'DB_NAME', 'micagent_mic');//Nombre de la base de datos
define('BASE_PATH_ASSETS', $puerto.$CONF.'/assets/');
define('BASE_PATH_POLIZAS', $puerto.$CONF.'/pdf/polizas/');


include 'funciones/DBclass.php';//CONEXIONES DEL SISTEMA
include 'funciones/GeneralClass.php';//DIVBERSAS FUNCIONES DEL SISTEMA
include 'funciones/ObtenerDatos.php';//PARA OBTENER TODO TIPO DE DATOS
include 'funciones/InsertarDatos.php';//PARA INSERTAR TODO TIPO DE DATOS
include 'funciones/ActualizaDatos.php';//PARA ACTUALIZAR TODO TIPO DE DATOS





//FUNCION QUE BUSCA EN TODO EL DIRECTORIO DE NUESTRA CARPETA LOS ARCHIVOS DE LAS CLASES 
/*function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once  $path . '.php';
}*/
?>