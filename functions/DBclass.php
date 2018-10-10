<?php

class funs_DBclass

{

	/**

	 * @var $con llevará a cabo la conexión de base de datos

	 */

	//public $con;

	public $mysqli;

	public static function getConexion(){

	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die (mysqli_connect_error());
	return $mysqli;

	}


	public function CloseConexion(){

		$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die (mysqli_connect_error());

		$mysqli->close();

		echo "SE LIBERO LA conexión?";

		echo "\nPara seguridad, poner un 'no click derecho para ver codigo fuente con javascript'";

		return $mysqli;

	}

}