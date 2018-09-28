<?php
  session_start();
  include ("config.php");


  $pass = $_POST["pass"];
  $user = $_POST["user"];


//ANTES DE VALIDARLO, LIMPIAR CATERES O INYECCION SQL
//ANTES DE VALIDAR USAR TOKEN

  $valida=funs_getDatos::ValidaUsuario($user,$pass);


  //echo "Id=".$valida[0]."<br>";
  //echo "Validador=".$valida[1]."<br>";


   if($valida[1]!=0){

   	$rest = funs_getDatos::obtenerDatoUnico($valida[0],'mic_users');
   	$fila = $rest->fetch_object();

   	$_SESSION["id_int"]=$valida[1];
    $_SESSION["id_intV"]=$valida[0];
   	$_SESSION["usuario"]=$fila->usuario;
   	$_SESSION["datos"]=$fila->datos;
   	$_SESSION["id_rol"]=$fila->id_rol;
   	$_SESSION["id_status"]=$fila->id_status; 
    $_SESSION["imagen"]=$fila->imagen;
    $_SESSION["nombre"]=funs_getDatos::ObtenerCampo("nombre");
    $_SESSION["app"]=funs_getDatos::ObtenerCampo("app");

   	header("location: inicio/inicio");


   }
   else
   {


   	header("location: index.html");
   	//AVISAR DE USUARIO O CONTRASEÑA INCORRECTOS O CUALQUIER TIPO DE FALLO
   	//CONTRA LOS INTENTOS FALLIDOS PARA BLOQUEAR

   }


?>