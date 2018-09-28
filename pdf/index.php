<?php

require('../funciones/PdfParser.php');

function ultimo_modificado($dir='uploads/', $type=0) {
    $ignore = array(
                '.',
                '..'
                );
    if(substr($dir, -1)!='/') {
        $dir .= '/';
    }
    if($handle = opendir($dir)) {
        $mas_nuevo = 0;
        $ultimo_nombre = false;
        while (false !== ($curfile = readdir($handle))) {
            if(in_array($curfile, $ignore)) continue;
            if(is_file($dir.$curfile) && $type==2) continue;
            if(is_dir($dir.$curfile) && $type==1) continue;
            if(filemtime($dir.$curfile)>$mas_nuevo) {
                $mas_nuevo = filemtime($dir.$curfile);
                $ultimo_nombre = $curfile;
            }
        }
        return $ultimo_nombre;
    }
    return false;
}
echo $ultimo_archivo = ultimo_modificado();
 
echo $arhivo = "uploads/".$ultimo_archivo;




$parser= new PdfParser();
//$pdf = $parser->parseFile('https://www.mapfre.com.mx/seguros-mx/images/condiciones-generales-automoviles_tcm584-79084.pdf');
$pdf = $parser->parseFile($ultimo_archivo);




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

//echo $corte1;
echo "<h1> El Cliente es:<br> ";
echo $asegurado;
echo "</h1>";

//FUNCION PARA OBTENER LA CADENA QUE HAY EN MEDIO DE DOS PALABRAS
function obtenerCadena($contenido,$inicio,$fin){
    $r = explode($inicio, $contenido);
    if (isset($r[1])){
        $r = explode($fin, $r[1]);
        return $r[0];
    }
    return '';
}


 



echo "Datos del vehiculo asegurado: <br>";
// ESTO SACA OCUPANTES, PLACAS DEL AUTO Y NUMERO DE SERIE DEL AUTO
$datos2= obtenerCadena($corte1,'Ocupantes:','VIGENCIA');

$datosauto = explode(" ", $datos2);

echo $datosauto[1]; 
echo "<BR>";
echo $datosauto[2]; 
echo "<br>";
echo $datosauto[3];
echo "<br>";
/*---------------------------------------- */

// SACA EL INICIO DE LA VIGENCIA , NO ES NECESARIO HACER EXPLODE PORQUE SOLO ES UN DATO
echo $iniciovigencia= obtenerCadena($corte1,'VIGENCIA','del:');
echo "<br>";
/*--------------------------------------- */

// SACA EL INICIO DE LA VIGENCIA , NO ES NECESARIO HACER EXPLODE PORQUE SOLO ES UN DATO
echo $finvigencia= obtenerCadena($corte1,'del:','del:');
echo "<br>";
/*--------------------------------------- */

// SACA FECHA INICIO VIGENCIA, FECHA FIN VIGENCIA, FECHA VENCIMIENTO DE PAGO, PLAZO DE PAGO, USO, SERVICIO, MOVIMIENTO
$datos5= obtenerCadena($corte1,'Plazo de pago: Uso: Servicio: Movimiento:','COBERTURAS CONTRATADAS');
$datosauto1 = explode(" ", $datos5);
echo $datosauto1[1]; 
echo "<BR>";
echo $datosauto1[2]; 
echo "<br>";
echo $datosauto1[3];
echo "<br>";
echo $datosauto1[4];
echo "<br>";
echo $datosauto1[5];
echo "<br>";
echo $datosauto1[6];
echo "<br>";
echo $datosauto1[7];
echo "<br>";
echo $datosauto1[8];
echo "<br>";
/*----------- */
//DESCRIPCION DEL VEHICULO ASEGURADO
echo $descripcionvehiculo= obtenerCadena($pdf,$asegurado,$datosauto1[1]);
/*----------- */
//TIPO CARRO, MODELO CARRO, AÑO CARRO
$datos1= obtenerCadena($corte1,$descripcionvehiculo,'Ocupantes:');
echo "<br>";
$caracteristicasauto = explode(" ", $datos1);
    echo $caracteristicasauto[0];
	echo "<br>";
 	echo $caracteristicasauto[1]; 
	echo "<BR>";
	echo $caracteristicasauto[2]; 
	echo "<br>";
	
/*----------- */

// SI LA PLAN DE LA POLIZA ES AMPLIA, CAPTURA LO QUE HAY EN MEDIO DE ESTAS PALABRAS
if (strpos($pdf, 'AMPLIA') !== false) {
	$Danosm= obtenerCadena($corte1,'Daños materiales La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Robo total La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
 	$danosm1 = explode(" ", $Danosm);

 	echo $danosm1[1]; 
	echo "<BR>";
	echo $danosm1[2]; 
	echo "<br>";
	echo $danosm1[3];
	echo "<br>";
	echo $danosm1[4];
    echo "<br>";

}
// SI LA PLAN DE LA POLIZA ES LIMITADA, CAPTURA LO QUE HAY EN MEDIO DE ESTAS PALABRAS
elseif (strpos($pdf, 'AMPLIA') !== false OR strpos($pdf, 'LIMITADA') ) {
 $Robo= obtenerCadena($corte1,'Robo total La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Responsabilidad Civil por Daños a Terceros La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
}
//RESPONSABILIDAD CIVIL
$Responsabilidad= obtenerCadena($corte1,'Responsabilidad Civil por Daños a Terceros La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Gastos Médicos Ocupantes La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');

//GASTOS MEDICOS
$Gastosm= obtenerCadena($corte1,'Gastos Médicos Ocupantes La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Gastos Legales La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
//GASTOS LEGALES
$Gastosle= obtenerCadena($corte1,'Gastos Legales La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Asistencia Vial Quálitas Servicios de Asistencia Vial: CDMX y Area Metropolitana: 3300 4534 ; Interior de la República : 01 800 253 0553 La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
$Asistencia= obtenerCadena($corte1,'Asistencia Vial Quálitas Servicios de Asistencia Vial: CDMX y Area Metropolitana: 3300 4534 ; Interior de la República : 01 800 253 0553 La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Muerte del Conductor por Accidente Automovilístico La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
$Muerte= obtenerCadena($corte1,'Muerte del Conductor por Accidente Automovilístico La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Textos: Forma de: Pago:');

//INFORMACIÓN DEL ASEGURADO
echo $InformacionA= obtenerCadena($pdf,'INFORMACIÓN DEL ASEGURADO R.F.C.: RENUEVA A: Domicilio: C.P.: Municipio: Estado: Colonia:','DESCRIPCIÓN DEL VEHÍCULO ASEGURADO');
echo "<br>";

//NUMERO DE POLIZA
echo $NumeroPoliza= obtenerCadena($pdf,'RENUEVA A: Domicilio: C.P.: Municipio: Estado: Colonia:',$asegurado);
echo "<br>";
//Calle
echo $Calle= obtenerCadena($pdf,$NumeroPoliza."".$asegurado,'INT.');
echo "<br>";

echo $total= obtenerCadena($pdf,'IMPORTE TOTAL Tarifa Aplicada:','Funcionario Autorizado');
$total1 = explode(" ", $total);
 	echo $total1[0]; 
	echo "<BR>";
	echo $total1[1]; 
	echo "<br>";
	echo $total1[2];
	echo "<br>";
	echo $total1[3];
    echo "<br>";
    echo $total1[4];
	echo "<br>";
	echo $total1[5];
    echo "<br>";
    echo $total1[6];
    echo "<br>";
    echo $total1[7];
    echo "<br>";

//Fecha de EXPEDICION DEL DOCUMENTO 
echo $FechacreacionPoliza= obtenerCadena($pdf,$total1[7],'Funcionario Autorizado El asegurado recibe la impresión de la póliza junto con las condiciones generales aplicables');
echo "<br>";

//Calle
//echo $Calle= obtenerCadena($pdf,$NumeroPoliza."".$asegurado,'INT.');











?>