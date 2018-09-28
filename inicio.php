<?php  
  error_reporting(0);
  session_start();
  include ("config.php");


  $res6 = funs_getDatos::obtenerUsuarios();

   while ($fila = $res6->fetch_assoc()) 
  {
    echo
     $datos= $fila['datos'];
     echo "<br>";

  $datosN[]=mic_funciones::arregloSaca($fila['datos']);
  }

  echo mic_funciones::encriptar("hola");

  echo InsertaDatos::InsertaUsuarios(1);

 ?>