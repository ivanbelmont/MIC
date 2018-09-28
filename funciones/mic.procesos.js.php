
<!-- EN ESTE BLOQUE DEBE IR LOS JS GENERALES PARA TODO EL SISTEMA -->
<link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>css/completar/easy-autocomplete.min.css"> 
<link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>css/completar/easy-autocomplete.themes.min.css"> 
<link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>css/datepicker.min.css" />
<link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>css/jquery-ui.custom.min.css" />
<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery.validate.min.js"></script>
<script src="<?php echo BASE_PATH_ASSETS; ?>js/mic.proces.ajax.js"></script>
<script src="<?php echo BASE_PATH_ASSETS; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery-ui.custom.min.js"></script>



<?php
//header("Content-Type: text/javascript");  
$modulo = funs_getDatos::ObtenerModuloUnico(strtolower($g));

//DENTRO DE CADA *JS.PHP DEBEN IR LOS JS PROPIOS DE CASA SECCION ASI COMO SUS FUNCIONES SCRIPT

switch ($modulo) {
      case 'pdf':

      include "mic.pdf.js.php";

      break;

      case 'usuarios':

      include "mic.users.js.php";
      break;

      case 'nuevouser':

      include "mic.usersnew.php";
      break;

      case 'editauser':

      include "mic.usersedit.php";
      break;

      case 'editacliente':

      include "mic.clientedit.php";
      break;

      case 'clientes':

      include "mic.clientes.js.php";
      break;


      case 'nuevcliente':

      include "mic.clientenew.js.php";
      break;

      case 'pdfs':

      include "mic.pdfs.js.php";
      break;

      case 'polizas':

      include "mic.polizas.js.php";
      break;

    default:
    echo "";
    break;
    }
?>