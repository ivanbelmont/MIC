<?php

require('../funciones/PdfParser.php');

$parser= new PdfParser();
//$pdf = $parser->parseFile('https://www.mapfre.com.mx/seguros-mx/images/condiciones-generales-automoviles_tcm584-79084.pdf');
$pdf = $parser->parseFile('poliza.pdf');


echo $pdf;

echo "<br><br><br>";


$buscar="Domicilio: C.P.: Municipio: Estado: Colonia:";
$punto0 = strpos($pdf,$buscar);
$punto1 = strpos($pdf, $buscar, $punto0 + strlen($buscar));



///////////////////////////////////


$corte1=substr($pdf,$punto1+strlen($buscar));

$buscar="DESCRIPCIÓN DEL VEHÍCULO ASEGURADO";
$punto2 = strpos($corte1,$buscar);
$corte2=substr($corte1,0,$punto2);



$buscar=" ";
$punto3 = strpos(ltrim($corte2),$buscar);
$corte3=substr($corte2,$punto3+2);



$asegurado=$corte3;


echo "<h1> El Cliente es:<br> ";
echo $asegurado;
echo "</h1>";

?>