<?php

require('../funciones/PdfParser.php');
include ("../config.php");

$parser= new PdfParser();
//$pdf = $parser->parseFile('https://www.mapfre.com.mx/seguros-mx/images/condiciones-generales-automoviles_tcm584-79084.pdf');
$pdf = $parser->parseFile('poliza.pdf');


echo $pdf;

echo "<br><br><br>";


echo mic_funciones::pdf($pdf,'Domicilio: C.P.: Municipio: Estado: Colonia:','DESCRIPCIÓN DEL VEHÍCULO ASEGURADO',2,2);
?>