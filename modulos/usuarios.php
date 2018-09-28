

<?php
$usuarios=funs_getDatos::obtenerUsuarios();
//$funcion = funs_getDatos::ObtenerModuloUnico(strtolower('Nuevo Usuario'));
?>

<a class="btn btn-success" href="Nuevo_Usuario"><i class="ace-icon fa fa-plus align-top bigger-125"> Crear Usuario</i></a>
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
<td><b>Usuario <i class="ace-icon fa fa-user fa-2x"></i></b></td>
<td><b>Nombre <i class="ace-icon fa fa-user fa-2x"></i></b></td>
<td><b>Apellido Paterno</b></td>
<td><b>Apellido Materno</b></td>
<td><b>Telefono</b></td>
<td><b>Celular</b></td>
<td><b>creado</b></td>
<td><b>Funciones</b></td>

</tr>
</thead>
<?php

while ($fila = $usuarios->fetch_object()) 
          {
            echo '<tr><td>'.$fila->usuario.'</td>';
            echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'nombre').'</td>';
                        echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'app').'</td>';
                        echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'apm').'</td>';
                        echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'tel').'</td>';
                        echo '<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'celular').'</td>';
                        echo '<td>'.$fila->creado.'</td>';
                        echo '<td>
                        <div id="comandos" class="hidden-sm hidden-xs action-buttons">';
mic_system::ActionButtons('fa-toggle-'.$fila->estatus,"Habilitar","blue","HabilitaUser",mic_funciones::aleatorio(32).$fila->id_interno);
mic_system::ActionButtons('fa-trash',"Eliminar","red","V2xkNGNHSlhiSFZaV0VveFl6SldlUT09",mic_funciones::aleatorio(32).$fila->id_interno,' data-toggle="modal" data-target="#DeleteModal" ');
mic_system::ActionButtons('fa-pencil',"Editar","green","V2xkNGNISlhiSFZaVAVve126SNdlUT86",mic_funciones::aleatorio(32).$fila->id_interno,' href="Editar_Usuario"');
// echo '<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
//   Launch demo modal
// </a>';
          echo '</div>';

          echo '<div class="hidden-md hidden-lg">';
          mic_system::ActionButtons('fa-toggle-'.$fila->estatus,"Habilitar","blue","HabilitaUser",mic_funciones::aleatorio(32).$fila->id_interno);
          mic_system::ActionButtons('fa-trash',"Eliminar","red","V2xkNGNHSlhiSFZaV0VveFl6SldlUT09",mic_funciones::aleatorio(32).$fila->id_interno,' data-toggle="modal" data-target="#DeleteModal" ');
          mic_system::ActionButtons('fa-pencil',"Editar","green","V2xkNGNISlhiSFZaVAVve126SNdlUT86",mic_funciones::aleatorio(32).$fila->id_interno,' href="Editar_Usuario"');

          echo '</div>';

          echo '</td></tr>';

                       // echo $fila->datos."<br>";
          }
?>
</table>
</div>

