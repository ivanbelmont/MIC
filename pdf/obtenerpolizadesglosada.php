<?php
require('../modulos/PdfParser.php');
include ("../config.php");
$parser= new PdfParser();
$estados = [ 
    'AG' => 'AGUASCALIENTES',
    'BN' => 'BAJA CALIFORNIA NORTE',
    'BS' => 'BAJA CALIFORNIA SUR',
    'CH' => 'COAHUILA',
    'CI' => 'CHIHUAHUA',
    'CL' => 'COLIMA',
    'CP' => 'CAMPECHE',
    'CS' => 'CHIAPAS',
    'DF' => 'DISTRITO FEDERAL',
    'DG' => 'DURANGO',
    'GE' => 'GUERRERO',
    'GJ' => 'GUANAJUATO',
    'HD' => 'HIDALGO',
    'JA' => 'JALISCO',
    'MC' => 'MICHOACAN',
    'MR' => 'MORELOS',
    'MX' => 'MEXICO',
    'NA' => 'NAYARIT',
    'NL' => 'NUEVO LEON',
    'OA' => 'OAXACA',
    'PU' => 'PUEBLA',
    'QE' => 'QUERETARO',
    'QI' => 'QUINTANA ROO',
    'SI' => 'SINALOA',
    'SL' => 'SAN LUIS POTOSI',
    'SO' => 'SONORA',
    'TA' => 'TAMAULIPAS',
    'TB' => 'TABASCO',
    'TL' => 'TLAXCALA',
    'VC' => 'VERACRUZ',
    'YU' => 'YUCATAN',
    'ZA' => 'ZACATECAS',

];

//FUNCION PARA OBTENER LA CADENA QUE HAY EN MEDIO DE DOS PALABRAS
function obtenerCadena($contenido,$inicio,$fin){
    $r = explode($inicio, $contenido);
    if (isset($r[1])){
        $r = explode($fin, $r[1]);
        return $r[0];
    }
    return '';
}


//$poliza=$_POST["poliza"];
$poliza = json_decode($_POST['poliza']);


//$pdf = $parser->parseFile('https://www.mapfre.com.mx/seguros-mx/images/condiciones-generales-automoviles_tcm584-79084.pdf');
$max = sizeof($poliza);
$data="";
$data.='<form class="form-horizontal" id="validation-form" role="form">';
for($i = 0; $i < $max;$i++)
{
$pdf = $parser->parseFile(BASE_PATH_POLIZAS.$poliza[$i]); 




$buscar="Domicilio: C.P.: Municipio: Estado: Colonia:";
$punto0 = strpos($pdf,$buscar);
$punto1 = strpos($pdf, $buscar, $punto0 + strlen($buscar));

/*$data.='<div class="form-group"> 
		<label for="numero_poliza" class="control-label">Numero de Poliza</label>
		<input type="text" class="form-control" id="numero_poliza" name="numero_poliza" placeholder="" value="'.$data.'">
	</div>';*/



///////////////////////////////////


$corte1=substr($pdf,$punto1+strlen($buscar));

$buscar="DESCRIPCIÓN DEL VEHÍCULO ASEGURADO";
$punto2 = strpos($corte1,$buscar);
$corte2=substr($corte1,0,$punto2);

$buscar=" ";
$punto3 = strpos(ltrim($corte2),$buscar);
$corte3=substr($corte2,$punto3+2);

$asegurado=$corte3;


// ESTO SACA OCUPANTES, PLACAS DEL AUTO Y NUMERO DE SERIE DEL AUTO
$datos2= obtenerCadena($corte1,'Ocupantes:','VIGENCIA');

$datosauto = explode(" ", $datos2);
/*---------------------------------------- */

// SACA EL INICIO DE LA VIGENCIA , NO ES NECESARIO HACER EXPLODE PORQUE SOLO ES UN DATO
 $iniciohoravigencia= obtenerCadena($corte1,'VIGENCIA','del:');
 
/*--------------------------------------- */

// SACA EL INICIO DE LA VIGENCIA , NO ES NECESARIO HACER EXPLODE PORQUE SOLO ES UN DATO
 $finhoravigencia= obtenerCadena($corte1,'del:','del:');
 
/*--------------------------------------- */

// SACA FECHA INICIO VIGENCIA, FECHA FIN VIGENCIA, FECHA VENCIMIENTO DE PAGO, PLAZO DE PAGO, USO, SERVICIO, MOVIMIENTO
$datos5= obtenerCadena($corte1,'Plazo de pago: Uso: Servicio: Movimiento:','COBERTURAS CONTRATADAS');
$datosautop = explode(" ", $datos5);
/*----------- */

//DESCRIPCION DEL VEHICULO ASEGURADO
 $descripcionvehiculo= obtenerCadena($pdf,$asegurado,$datosautop[1]);
/*----------- */
//TIPO CARRO, MODELO CARRO, COLOR CARRO
$datos1= obtenerCadena($corte1,$descripcionvehiculo,'Ocupantes:');
$caracteristicasauto = explode(" ", $datos1);
	
/*----------- */

//TIPO CARRO, MODELO CARRO, COLOR CARRO
$tipocobertura= obtenerCadena($pdf,'PLAN:','PÓLIZA DE SEGURO DE AUTOMÓVILES ');

// SI EL PLAN DE LA POLIZA ES AMPLIA, CAPTURA LO QUE HAY EN MEDIO DE ESTAS PALABRAS
if (strpos($pdf, 'AMPLIA') !== false) {
	$Danosm= obtenerCadena($corte1,'Daños materiales La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Robo total La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
 	$danosm1 = explode(" ", $Danosm);

     

}
// SI LA PLAN DE LA POLIZA ES LIMITADA, CAPTURA LO QUE HAY EN MEDIO DE ESTAS PALABRAS
if (strpos($pdf, 'AMPLIA') !== false OR strpos($pdf, 'LIMITADA') ) {
 $Robo= obtenerCadena($corte1,'Robo total La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Responsabilidad Civil por Daños a Terceros La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
 	$robo1 = explode(" ", $Robo);
}

//RESPONSABILIDAD CIVIL
$Responsabilidad= obtenerCadena($corte1,'Responsabilidad Civil por Daños a Terceros La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Gastos Médicos Ocupantes La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
$responsabilidad1 = explode(" ", $Responsabilidad);

//CONCATENO LOS 3 STRINGS YA QUE LA RESPUESTA QUE ES SUMA ASEGURADA CONTIENE POR EVENTO Y ESO SON 3 PALABRAS (PRECIO + POR + EVENTO)
$SumaAseguradaResponsabilidad=$responsabilidad1[2]." ".$responsabilidad1[3]." ".$responsabilidad1[4];

//GASTOS MEDICOS
$Gastosm= obtenerCadena($corte1,'Gastos Médicos Ocupantes La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Gastos Legales La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
$gastosm1 = explode(" ", $Gastosm);
//CONCATENO LOS 3 STRINGS YA QUE LA RESPUESTA QUE ES SUMA ASEGURADA CONTIENE POR EVENTO Y ESO SON 3 PALABRAS (PRECIO + POR + EVENTO)
$SumaAseguradaGastosmedicos=$gastosm1[2]." ".$gastosm1[3]." ".$gastosm1[4];
//GASTOS LEGALES
$Gastosle= obtenerCadena($corte1,'Gastos Legales La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Asistencia Vial Quálitas Servicios de Asistencia Vial: CDMX y Area Metropolitana: 3300 4534 ; Interior de la República : 01 800 253 0553 La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.');
$gastosle1 = explode(" ", $Gastosle);
$Asistencia= obtenerCadena($corte1,'Asistencia Vial Quálitas Servicios de Asistencia Vial: CDMX y Area Metropolitana: 3300 4534 ; Interior de la República : 01 800 253 0553 La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Muerte del Conductor por Accidente Automovilístico La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia. ');
$Asistencia1 = explode(" ", $Asistencia);
$Muerte= obtenerCadena($corte1,'Muerte del Conductor por Accidente Automovilístico La Unidad de Medida y Actualización (UMA) sustituye al Salario Mínimo como medida de Referencia.','Textos: Forma de: Pago:');
$muerte1 = explode(" ", $Muerte);

//INFORMACIÓN DEL ASEGURADO
 $InformacionA= obtenerCadena($pdf,'INFORMACIÓN DEL ASEGURADO R.F.C.: RENUEVA A: Domicilio: C.P.: Municipio: Estado: Colonia:','DESCRIPCIÓN DEL VEHÍCULO ASEGURADO');
 

//NUMERO DE POLIZA
 $NumeroPoliza= obtenerCadena($pdf,'RENUEVA A: Domicilio: C.P.: Municipio: Estado: Colonia:',$asegurado);
 
//Calle (parte1)
 $Calle= obtenerCadena($pdf,$NumeroPoliza."".$asegurado,'INT.');

//Calle (parte2)
 //$Calle2= obtenerCadena($pdf,"INT.".$asegurado,'INT.');
 //DATOS CLIENTE (NUMERO POSTAL, MUNICIPIO, COLONIA RFC)
 $DatosCliente= obtenerCadena($pdf,'INT.','DESCRIPCIÓN DEL VEHÍCULO ASEGURADO');
  foreach ($estados as &$valorestados) {

 	//RECORRO TODO EL ARRAY PARA VER SI ENCUENTRO UNA COINCIDENCIA ENTRE EL ESTADO QUE TENGO EN LOS DATOS CLIENTES Y EN MI ARRAY 
   $posicion_coincidencia = strpos($DatosCliente, $valorestados);
   //SI ENCUENTRO LA POSICION DESEADA LO AGREGO A LA VARIABLE ESTADOD PARA IMPRIMIRLO EN EL FORMULARIO
   if ($posicion_coincidencia === false) {
    } 
    else {
    	 $Estado = $valorestados;
    }
   }
   //BUSCO EL CODIGO POSTAL
   $CodigoP= obtenerCadena($pdf,'INT.',$Estado);
   //SACO EL CODIGO POSTAL DE ENTRE TODO EL TEXTO
  $CodigoPostal = explode(" ", $CodigoP);
  //BUSCO EL MUNICIPIO ENTRE LA DIVISION QUE HICE (ENTRE LA POSICION 1 QUE ES EL CODIGO POSTAL) Y EL ESTADO
  $Municipio= obtenerCadena($pdf,$CodigoPostal[1],$Estado);
  //BUSCO EL RFC Y LA COLONIA (JUNTANTO MUNICIPIO Y ESTADO YA QUE SI PONGO SOLO ESTADO EL RESULTADO NO SALE CORRECTO, Y tuve que poner un espacio en descipción del vehiculo asegurado a continuación pondre porque)
  $Colorf= obtenerCadena($pdf,$Municipio."".$Estado,' DESCRIPCIÓN DEL VEHÍCULO ASEGURADO');

  //CONVIERTO EN ARRAY EL RESULTADO PARA OBTENER LA ULTIMA POSICIÓN (QUE ES EL RFC, SI NO PONIA LA DESCRIPCIÓN DE
  // VEHICULO ASEGUROADO CON UN ESPACIO LA ULTIMA POSICIÓN LA AGARRABA CON EL ESPACIO Y NO ME SALIA EL RFC CORRECTAMENTE)
  $Colorf1 = explode(" ", $Colorf);
   //OBTENGO LA ULTIMA POSICIÓN QUE CONTIENE EL RFC
  $RFC =  end($Colorf1);
  //OBTENGO LA COLONIA
  $Colonia= obtenerCadena($pdf,$Municipio."".$Estado,$RFC);
 
//PRIMA NETA, TASA FINANCIAMIENTO, GASTOS DE EXPEDICION
 $total= obtenerCadena($pdf,'IMPORTE TOTAL Tarifa Aplicada:','Funcionario Autorizado');
$total1 = explode(" ", $total);

//Fecha de EXPEDICION DEL DOCUMENTO 
 $FechacreacionPoliza= obtenerCadena($pdf,$total1[7],'Funcionario Autorizado El asegurado recibe la impresión de la póliza junto con las condiciones generales aplicables');

 //PLAZO DE PAGO
 $Plazopago= obtenerCadena($pdf,$datosautop[3],$datosautop[6]);


 //USO, SERVICIO, CARGA
 $USC= obtenerCadena($pdf,$Plazopago,'COBERTURAS CONTRATADAS');
 $DVehiculoA = explode(" ", $USC);

$data.='<legend class="header smaller lighter green">Poliza Numero "'.$i.'"</Legend>';
$data.='<div class="form-group has-success">

			<label for="numero_poliza" class="col-xs-12 col-sm-1 control-label no-padding-right">Numero de Poliza</label>
			<div class="col-xs-12 col-sm-4">
				<span class="block input-icon input-icon-right">
					<input type="text" class="width-100" id="numero_poliza" name="numero_poliza" placeholder="" value="'.$NumeroPoliza.'">
					<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
			</div>
		</div>';
$data.='<legend class="header smaller lighter green">Información del Asegurado </legend>
	     <div class="form-group has-success">
	     	<label for="aseguradora" class="col-xs-12 col-sm-1 control-label no-padding-right">Aseguradora</label>
			<div class="col-xs-12 col-sm-4">
				<span class="block input-icon input-icon-right">
					<input type="text" class="width-100" id="aseguradora" name="aseguradora" placeholder="" value="'.$asegurado.'">
					<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="dato" class="col-xs-12 col-sm-1 control-label no-padding-right">Descripcion Vehiculo</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100"  name="dato" id="Cdecripcion" autocomplete="off" placeholder="" value="'.$descripcionvehiculo.'">
			<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="inicio" class="col-xs-12 col-sm-1 control-label no-padding-right">Vigencia del:</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input data-date-format="dd-mm-yyyy" class="form-control date-picker width-100" type="text" id="id-date-picker-1" name="vigencia" placeholder="Vigencia" value="'.$datosautop[1].'">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="fin" class="col-xs-12 col-sm-1 control-label no-padding-right">Hasta:</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input data-date-format="dd-mm-yyyy" class="form-control date-picker width-100" type="text" id="id-date-picker-1" name="hasta" placeholder="hasta" value="'.$datosautop[2].'">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="rfc" class="col-xs-12 col-sm-1 control-label no-padding-right">RFC</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="rfc" name="rfc" placeholder="" value="'.$RFC.'" required>
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.=	'<div class="form-group has-success"> 
		<label for="domicilio" class="col-xs-12 col-sm-1 control-label no-padding-right">Domicilio</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="domicilio" name="domicilio" placeholder="" value="'.$Calle.'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';

$data.=	'<div class="form-group has-success"> 
		<label for="estado" class="col-xs-12 col-sm-1 control-label no-padding-right">Estado</label>
		<div class="col-xs-12 col-sm-4">
				<select type="text" class="width-100" id="estadosr" name="estado">
				<option value="'.$Estado.'">"'.$Estado.'"</option>
				</select>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="municipio" class="col-xs-12 col-sm-1 control-label no-padding-right">Municipio</label>
		<div class="col-xs-12 col-sm-4">
			
				<select type="text" class="width-100" id="municipio" name="municipio" placeholder="" value="">
				<option value="'.$Municipio.'">'.$Municipio.'</option>
				</select>
				
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';

$data.='<div class="form-group has-success"> 
		<label for="colonia" class="col-xs-12 col-sm-1 control-label no-padding-right">Colonia</label>
		<div class="col-xs-12 col-sm-4">
			
			<select type="text" class="width-100" id="colonia" name="colonia" placeholder="" value="">
				<option value="'.$Colonia.'">'.$Colonia.'</option>
				</select>
				
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.=	'<div class="form-group has-success"> 
		<label for="codigo_postal" class="col-xs-12 col-sm-1 control-label no-padding-right">Codigo Postal</label>
		<div class="col-xs-12 col-sm-4">
				<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="codigo_postal" name="codigo_postal" placeholder="" value="'.$CodigoPostal[1].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 		</div>
	</div>';
$data.=	'<legend class="header smaller lighter green">Descripción del Vehiculo Asegurado </legend>
	<div class="form-group has-success"> 
		<label for="tipo" class="col-xs-12 col-sm-1 control-label no-padding-right">tipo</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="tipo" name="tipo" placeholder="" value="'.$caracteristicasauto[0].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="modelo" class="col-xs-12 col-sm-1 control-label no-padding-right">modelo</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="modelo" name="modelo" placeholder="" value="'.$caracteristicasauto[1].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="color" class="col-xs-12 col-sm-1 control-label no-padding-right">color</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="color" name="color" placeholder="" value="'.$caracteristicasauto[2].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.=	'<div class="form-group has-success"> 
		<label for="ocupantes" class="col-xs-12 col-sm-1 control-label no-padding-right">ocupantes</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="ocupantes" name="ocupantes" placeholder="" value="'.$datosauto[1].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="serie" class="col-xs-12 col-sm-1 control-label no-padding-right">serie</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="serie" name="serie" placeholder="" value="'.$datosauto[3].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="motor" class="col-xs-12 col-sm-1 control-label no-padding-right">motor</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="motor" name="motor" placeholder="" value="">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="repuve" class="col-xs-12 col-sm-1 control-label no-padding-right">REPUVE</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="repuve" name="repuve" placeholder="" value="">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="placas" class="col-xs-12 col-sm-1 control-label no-padding-right">placas</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="placas" name="placas" placeholder="" value="'.$datosauto[2].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';

$data.='<div class="form-group has-success"> 
		<label for="fecha_pago" class="col-xs-12 col-sm-1 control-label no-padding-right">fecha de pago</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input data-date-format="dd-mm-yyyy" class="form-control date-picker width-100" type="text" id="id-date-picker-1" value="'.$datosautop[3].'">
				<i class="ace-icon fa fa-calendar"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="plazo" class="col-xs-12 col-sm-1 control-label no-padding-right">plazo de pago</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="plazo" name="plazo" placeholder="" value="'.$Plazopago.'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>

	</div>';
$data.='<div class="form-group has-success"> 
		<label for="uso" class="col-xs-12 col-sm-1 control-label no-padding-right">uso</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="uso" name="uso" placeholder="" value="'.$DVehiculoA[1].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>

	</div>';
$data.='<div class="form-group has-success"> 
		<label for="servicio" class="col-xs-12 col-sm-1 control-label no-padding-right">servicio</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="servicio" name="servicio" placeholder="" value="'.$DVehiculoA[2].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>

	</div>';
$data.='<div class="form-group has-success"> 
		<label for="movimiento" class="col-xs-12 col-sm-1 control-label no-padding-right">movimiento</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="movimiento" name="movimiento" placeholder="" value="'.$DVehiculoA[0].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>

	</div>';

$data.='<legend class="header smaller lighter green">COBERTURAS</legend>';

$data.=	'<div class="form-group has-success"> 
		<label for="codigo_postal" class="col-xs-12 col-sm-1 control-label no-padding-right">Cobertura</label>
		<div class="col-xs-12 col-sm-4">
			
				<select type="text" class="width-100" id="cobertura" name="cobertura" placeholder="" value="" disabled>
				<option value="'.$tipocobertura.'">'.$tipocobertura.'</option>
				<option value="Amplia">AMPLIA</option>
				<option value="Limitada">LIMITADA</option>
				<option value="Responsabilidad Civil">RESPONSABILIDAD CIVIL</option>
				</select>
				
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';



$data.='<div class="form-group row">
		  <div class="col-md-3">
		    <label for="ex1" style="color: #8bad4c;">COBERTURAS CONTRATADAS</label>
		  </div>
		  <div class="col-md-3">
		    <label for="ex2" style="color: #8bad4c;">SUMA ASEGURADA</label>
		  </div>
		  <div class="col-md-3">
		    <label for="ex3" style="color: #8bad4c;">DEDUCIBLE</label>
		  </div>
		   <div class="col-md-3">
		    <label for="ex3" style="color: #8bad4c;">PRIMAS</label>
		  </div>
		</div>';
// SI LA PLAN DE LA POLIZA ES AMPLIA, CAPTURA LO QUE HAY EN MEDIO DE ESTAS PALABRAS, NO EMPIEZO DE LAS PRIMERAS POSICIONES DE LA VARIABLE PORQUE ME BRINCO LOS $
if (strpos($pdf, 'AMPLIA') !== false) {
$data.='<div class="form-group row">
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex1" type="text" value="Daños Materiales">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex2" type="text" value="'.$danosm1[2].'">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="'.$danosm1[3].'">
		  </div>
		   <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="'.$danosm1[4].'">
		  </div>
		</div>';
}	
// SI LA PLAN DE LA POLIZA ES LIMITADA, CAPTURA LO QUE HAY EN MEDIO DE ESTAS PALABRAS
if (strpos($pdf, 'AMPLIA') !== false OR strpos($pdf, 'LIMITADA') ) {
	$data.='<div class="form-group row">
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex1" type="text" value="Robo Total">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex2" type="text" value="'.$robo1[2].'">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="'.$robo1[3].'">
		  </div>
		   <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="'.$robo1[4].'">
		  </div>
		</div>';

}
$data.='<div class="form-group row">
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex1" type="text" value="Responsabilidad Civil por Daños a Terceros">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex2" type="text" value="'.$SumaAseguradaResponsabilidad.'">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="">
		  </div>
		   <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="'.$responsabilidad1[5].'">
		  </div>
		</div>';
$data.='<div class="form-group row">
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex1" type="text" value="Gastos Médicos Ocupantes">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex2" type="text" value="'.$SumaAseguradaGastosmedicos.'">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="">
		  </div>
		   <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="'.$gastosm1[5].'">
		  </div>
		</div>';
$data.='<div class="form-group row">
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex1" type="text" value="Gastos Legales">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex2" type="text" value="'.$gastosle1[1].'">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="">
		  </div>
		   <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="'.$gastosle1[2].'">
		  </div>
		</div>';
$data.='<div class="form-group row">
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex1" type="text" value="Asistencia Vial Quálitas">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex2" type="text" value="'.$Asistencia1[1].'">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="">
		  </div>
		   <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="'.$Asistencia1[2].'">
		  </div>
		</div>';
$data.='<div class="form-group row">
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex1" type="text" value="Muerte del Conductor por Accidente Automovilístico">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex2" type="text" value="'.$muerte1[2].'">
		  </div>
		  <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="">
		  </div>
		   <div class="col-md-3">
		    <input class="form-control" style="border-color: #9cc573;color: #8bad4c;" id="ex3" type="text" value="'.$muerte1[3].'">
		  </div>
		</div>';
$data.='<div class="form-group has-success"> 
		<label for="prima_neta" class="col-xs-12 col-sm-1 control-label no-padding-right">Prima Neta</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
			<input type="text" class="width-100" id="prima_neta" name="prima_neta" placeholder="" value="'.$total1[1].'">
			<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="gastos_financiamiento" class="col-xs-12 col-sm-1 control-label no-padding-right">Gastos de Financiamiento</label>
		<div class="col-xs-12 col-sm-4">
			<span class="block input-icon input-icon-right">
				<input type="text" class="width-100" id="gastos_financiamiento" name="gastos_financiamiento" placeholder="" value="'.$total1[2].'">
				<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="gastos_expedicion" class="col-xs-12 col-sm-1 control-label no-padding-right">Gastos por Expedición</label>
		<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
		<input type="text" class="width-100" id="gastos_expedicion" name="gastos_expedicion" placeholder="" value="'.$total1[3].'">
		<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="subtotal" class="col-xs-12 col-sm-1 control-label no-padding-right">Subtotal</label>
		<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
		<input type="text" class="width-100" id="subtotal" name="subtotal" placeholder="" value="'.$total1[4].'">
		<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="iva" class="col-xs-12 col-sm-1 control-label no-padding-right">IVA</label>
		<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
		<input type="text" class="width-100" id="iva" name="iva" placeholder="" value="'.$total1[5].'">
		<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="importe_total" class="col-xs-12 col-sm-1 control-label no-padding-right">Importe Total</label>
		<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
		<input type="text" class="width-100" id="importe_total" name="importe_total" placeholder="" value="'.$total1[6].'">
		<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="tarifa" class="col-xs-12 col-sm-1 control-label no-padding-right">Tarifa Aplicada</label>
		<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
		<input type="text" class="width-100" id="tarifa" name="tarifa" placeholder="" value="'.$total1[7].'">
		<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';
$data.='<div class="form-group has-success"> 
		<label for="fecha_creacion" class="col-xs-12 col-sm-1 control-label no-padding-right">Fecha de Creación</label>
		<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
		<input type="text" class="width-100" id="fecha_creacion" name="fecha_creacion" placeholder="" value="'.$FechacreacionPoliza.'">
		<i class="ace-icon fa fa-check-circle"></i>
				</span>
			</div>
			<div class="help-block col-xs-12 col-sm-reset inline"> 

 			</div>
	</div>';

}	
$data.='<div class="form-group"> <!-- Submit button !-->
		<button type="" class="btn btn-primary">Subir Poliza</button>
	</div>';
$data.='</form>';
echo $data;


?>

<script >
$(document).ready(function() {


	var jsonRut='http://'+window.location.host+'/mic-agentes.com/'+'pdf/';

	function ordenarSelect(id_componente)
    {
      var selectToSort = jQuery('#' + id_componente);
      var optionActual = selectToSort.val();
      selectToSort.html(selectToSort.children('option').sort(function (a, b) {
        return a.text === b.text ? 0 : a.text < b.text ? -1 : 1;
      })).val(optionActual);

      ////alert("done Select");
    }

    console.log(jsonRut+'estados.json');
 $.getJSON(jsonRut+'estados.json', function (data) {
                var items = [];
                var valorestado = $("#estadosr").val()
                if (valorestado == '')
                  var options = '<option value="">Selecciona un estado</option>';
                else
                  var options = '<option value="'+valorestado+'">'+valorestado+'</option>';

                $.each(data, function (key, val) {
                    options += '<option value="' + val.nombre + '">' + val.nombre + '</option>';
                });//END each(data)         
                $("#estadosr").html(options); 
            
            });//END getJSON ////////////////////////////////////////////////////////////////////////////




//START getJSON ////////////////////////////////////////////////////////////////////////////
 $( "#estadosr" ).change( function(valor_select ){
                 var estado = $( "#estadosr" ).val();
                 console.log(estado);


                $.getJSON(jsonRut+'municipios.json', function (data) {
                var items = [];
                var options = '<option value="">Selecciona un municipio</option>';
                var Valoresciudades = '';

                $.each(data, function (key, val) {


                    if(val.estado == estado) {  

                            $.each(val.ciudades, function (key_municipio, val_muni) {
                                Valoresciudades += '<option value="' + val_muni + '">' + val_muni + '</option>';
                            });                 
                        }
                    
                });//END each(data)       
                //alert(Valoresciudades);  
                $("#municipio").html(Valoresciudades);
                 ordenarSelect('municipio');
            
            });//END getJSON ////////////////////////////////////////////////////////////////////////////
            });//END change


 //START getJSON ////////////////////////////////////////////////////////////////////////////
 $( "#municipio" ).change( function(valor_select ){//DETECTAMOS LOS CAMBIOS A MUNICIPIOS
                 var municipio = $( "#municipio" ).val();//CAPTURAMOS EL VALOR DEL SELECT
                 console.log(municipio);


                //CAPTURAMOS EL JSON
                $.getJSON(jsonRut+'colonias2.json', function (data) {
                var items = [];
                var options = '<option value="">Selecciona una colonia</option>';
                var Valorescolonias = '';

                $.each(data, function (key, val) {
                  //RECORREMOS EL JSON

                    if(val.municipio == municipio) {
                      //COMPARAMOS LLAVE municipio CON municipio valor select

                      //recorrer json con val.colonia que contiene las colonias
                            $.each(val.colonia, function (key_colonia, val_cols) {
                              //RECORREMOS TODAS LAS COLONIAS QUE COINCIDAN
                              // Y LO CARGAMOS A LA VARIABLE
                                Valorescolonias += '<option value="' + val_cols + '">' + val_cols + '</option>';
                            });                 
                        }
                    
                });//END each(data)
                //LO CARGAMOS AL SELECT   
                //alert(Valorescolonias);      
                $("#colonia").html(Valorescolonias);
                //PARA DESPUES REORDENAR EL SELECT
                      ordenarSelect('colonia');
            
            });//END getJSON ////////////////////////////////////////////////////////////////////////////
            });//END change


 //START getJSON ////////////////////////////////////////////////////////////////////////////
 $( "#colonia" ).change( function(valor_select ){//DETECTAMOS LOS CAMBIOS A COLONIAS
                 var colonia = $( "#colonia" ).val();//CAPTURAMOS EL VALOR DEL SELECT
                 console.log(colonia);


                //CAPTURAMOS EL JSON
                $.getJSON(jsonRut+'codpostal.json', function (data) {
                var items = [];
                var options = '<option value="">Selecciona una CP</option>';
                var ValoresCP = '';

                $.each(data, function (key, val) {
                  //RECORREMOS EL JSON

                    if(val.colonia == colonia) {
                      //COMPARAMOS LLAVE colonia CON colonia valor select

                      console.log("codPotsla="+val.codpostal);
                       $("#codigo_postal").val(val.codpostal);
                      //recorrer json con val.codpostal que contiene los Codigos postales
                          /*  $.each(val.codpostal, function (key_cp, val_cps) {
                                $("#codigopr").val(val_cps);
                            });  */               
                        }
                    
                });//END each(data)
            
            });//END getJSON ////////////////////////////////////////////////////////////////////////////
            });//END change



         $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
			});//END READY IVAN
</script>
