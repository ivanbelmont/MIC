
<link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>js/tablas/datatables.min.css" />
<link href="<?php echo BASE_PATH_ASSETS; ?>css/tablas/style.css?u=d53" rel="stylesheet" type="text/css" />

<?php
$usuarios=funs_getDatos::obtenerUsuarios();



$buscamos=strtolower("ivan");
 $liberar="";

while ($fila = $usuarios->fetch_object()) 
					{
	


                        $datosNuevos=mic_funciones::desencriptar($fila->datos);
                      
                        $datosNuevos=strtolower($datosNuevos);

                        //$datosNuevosS=strtolower(funs_getDatos::ObtenerCampoBase($fila->datos,"nombre"));//TEST 

                        $pos = strpos($datosNuevos, $buscamos);

                        if ($pos === false) {
    //echo "La cadena '$buscamos' no fue encontrada en la cadena";

      //echo "<br>";
} else {
    echo "La cadena <h4><b>'$buscamos'</b></h4> fue encontrada en la cadena";
    echo " y existe en la posición $pos <br>".funs_getDatos::ObtenerCampoBase($fila->datos,"nombre")."<br>";
    echo $datosNuevos."<br>";
    $liberar[]=mic_funciones::deserialzar($datosNuevos);
      echo "<br>";
}
echo "<br>";
					}//END WHILE

                    print("<pre>".print_r($liberar,true)."</pre>");


                    for ($i=0; $i < sizeof($liberar); $i++) { 
                     
                     echo $liberar[$i]['nombre'];
                     echo "<br>";
                     echo $liberar[$i]['app'];
                     echo "<br>";
                     echo $liberar[$i]['apm'];
                     echo "<br>";
                     echo $liberar[$i]['tel'];
                     echo "<br>";
                     echo $liberar[$i]['correo'];
                     echo "<br><br>";
                     //echo $_GET['htls'];
                     
                    }
                
                    ?>
</body>
</html>
