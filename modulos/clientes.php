
<link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>js/tablas/datatables.min.css" />
<link href="<?php echo BASE_PATH_ASSETS; ?>css/tablas/style.css?u=d53" rel="stylesheet" type="text/css" />

<?php
$clientes=funs_getDatos::obtenerClientes();
//$funcion = funs_getDatos::ObtenerModuloUnico(strtolower('Nuevo Usuario'));
?>

<a class="btn btn-success" href="Nuevo_Cliente"><i class="ace-icon fa fa-plus align-top bigger-125"> Crear Cliente Manual</i></a>
<a class="btn btn-danger" href="Nuevo_Cliente"><i class="ace-icon fa fa-file align-top bigger-125"> Crear Cliente Archivo</i></a>
<!-- DIV DE VENTANA EMERGENTE PARA ELIMINAR  INICIO -->
                           <!-- Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <span id="resultadoVentana">
  </span><br>

       <div id="mensajemodal"></div>
      </div>
      <div id="botones" class="modal-footer">
        <!-- <button type="button" id="YESBUTTON" class="btn btn-primary"></button> -->
        <!-- <button type="button" id="NONUTTON" class="btn btn-secondary" data-dismiss="modal"></button> -->
      </div>
    </div>
  </div>
</div>
<!-- DIV DE VENTANA EMERGENTE PARA ELIMINAR  FIN -->
<span id="resultado">
</span><br>
<div id="mensajes"></div>
<div id="TblUsers" class="table-responsive">
<div class="div"></div>

<table id="tablesorter" class="table table-borderless" style="font-size: 12px;" >
<thead>
<tr>
<td><b>Nombre <i class="ace-icon fa fa-user fa-2x"></i></b></td>
<td><b>Apellido Paterno</b></td>
<td><b>Apellido Materno</b></td>
<td><b>Telefono</b></td>
<td><b>Correo</b></td>
<td><b>creado</b></td>
<td><b>Funciones</b></td>

</tr>
</thead>
<?php

while ($fila = $clientes->fetch_object()) 
          {

        echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'nombre').'</td>';
        echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'apellidop').'</td>';
        echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'apellidom').'</td>';
        echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'telefono').'</td>';
        echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'correo').'</td>';
        echo '<td>'.$fila->creado.'</td>';
                        echo '<td>
                        <div id="comandos" class="hidden-sm hidden-xs action-buttons">';
mic_system::ActionButtons('fa-toggle-'.$fila->estatus,"Habilitar","blue","ZGVzaGFiaWxpdGFyY2xpZW50ZQ",mic_funciones::aleatorio(32).$fila->id_interno);
mic_system::ActionButtons('fa-trash',"Eliminar","red","c2Vwcm9jZWRlYWxpbWluYXJ1c2Vy",mic_funciones::aleatorio(32).$fila->id_interno,' data-toggle="modal" data-target="#DeleteModal" ');
mic_system::ActionButtons('fa-pencil',"Editar","green","ZWRpdGFyY2xpZW50ZXByb2Nlc28",mic_funciones::aleatorio(32).$fila->id_interno,' href="Editar_Cliente"');
mic_system::ActionButtons('fa-file-text',"Polizas","purple","ZXN0ZWVzdW5saW5rcGFyYW1vc3RyYXJwb2xpemFzZGVsY2xpZW50ZQ",mic_funciones::aleatorio(32).$fila->id_interno,' href="PolizasClientes"');
          echo '</div>';

          echo '<div class="hidden-md hidden-lg">';
          mic_system::ActionButtons('fa-toggle-'.$fila->estatus,"Habilitar","blue","ZGVzaGFiaWxpdGFyY2xpZW50ZQ",mic_funciones::aleatorio(32).$fila->id_interno);
          mic_system::ActionButtons('fa-trash',"Eliminar","red","c2Vwcm9jZWRlYWxpbWluYXJ1c2Vy",mic_funciones::aleatorio(32).$fila->id_interno,' data-toggle="modal" data-target="#DeleteModal" ');
          mic_system::ActionButtons('fa-pencil',"Editar","green","ZWRpdGFyY2xpZW50ZXByb2Nlc28",mic_funciones::aleatorio(32).$fila->id_interno,' href="Editar_Cliente"');
          mic_system::ActionButtons('fa-file-text',"Polizas","purple","ZXN0ZWVzdW5saW5rcGFyYW1vc3RyYXJwb2xpemFzZGVsY2xpZW50ZQ",mic_funciones::aleatorio(32).$fila->id_interno,' href="PolizasClientes"');
          echo '</div>';

          echo '</td></tr>';

                       // echo $fila->datos."<br>";
          }
?>
</table>
</div>

