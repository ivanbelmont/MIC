<div class="row">
									<div class="col-sm-12">
										<div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#home">
														<i class="green ace-icon fa fa-check-square-o bigger-120"></i>
														Permisos
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#messages">
														Messages
														<span class="badge badge-danger">4</span>
													</a>
												</li>

												<li class="dropdown">
													<a data-toggle="dropdown" class="dropdown-toggle" href="#">
														Dropdown &nbsp;
														<i class="ace-icon fa fa-caret-down bigger-110 width-auto"></i>
													</a>

													<ul class="dropdown-menu dropdown-info">
														<li>
															<a data-toggle="tab" href="#dropdown1">@fat</a>
														</li>

														<li>
															<a data-toggle="tab" href="#dropdown2">@mdo</a>
														</li>
													</ul>
												</li>
											</ul>

											<div class="tab-content">
												<div id="home" class="tab-pane fade in active">
													
<!-- 



											<h3 class="row header smaller lighter purple">
											<span class="col-sm-6"> Default Buttons </span>

											<span class="col-sm-6">
												<label class="pull-right inline">
													<small class="muted smaller-90">Border:</small>

													<input id="id-button-borders" checked="" type="checkbox" class="ace ace-switch ace-switch-5" />
													<span class="lbl middle"></span>
												</label>
											</span>
										</h3> -->




<link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>js/tablas/datatables.min.css" />
<link href="<?php echo BASE_PATH_ASSETS; ?>css/tablas/style.css?u=d53" rel="stylesheet" type="text/css" />

<?php
$clientes=funs_getDatos::obtenerPermisos();
?>

<!-- <a class="btn btn-success" href="Nuevo_Cliente"><i class="ace-icon fa fa-plus align-top bigger-125"> Crear Rol</i></a>
DIV DE VENTANA EMERGENTE PARA ELIMINAR  INICIO -->
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
<td><b>Modulo</i></b></td>
<td><b>Rol</b></td>
<td><b>Ubicado</b></td>
<td><b>Permiso</b></td>

</tr>
</thead>
<?php

function selecciona($valor,$valor2){

if($valor==$valor2){
	return "selected";
}


}

while ($fila = $clientes->fetch_object()) 
          {

        echo '<td><a style="color: #438eb9;" href="'.$fila->mostrar.'" target="_BLANK" >'.$fila->modulo.'</a></td>';
        echo '<td>'.$fila->rol.'</td>';
        echo '<td>'.$fila->ubicado.'</td>';
        echo '<td> <select>
        <option style="color:#438eb9;" '.selecciona("M",$fila->permiso).'>'.funs_getDatos::obtenerNomPermisos("M").'</option>
        <option style="color:RED;" '.selecciona("N",$fila->permiso).'>'.funs_getDatos::obtenerNomPermisos("N").'</option>
        <option style="color:GREEN;" '.selecciona("D",$fila->permiso).'>'.funs_getDatos::obtenerNomPermisos("D").'</option>
        </select></td>';
        echo '</div>';
        echo '</td></tr>';

                       // echo $fila->datos."<br>";
          }
?>
</table>
</div>

</div>

												<div id="messages" class="tab-pane fade">
													<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
												</div>

												<div id="dropdown1" class="tab-pane fade">
													<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
												</div>

												<div id="dropdown2" class="tab-pane fade">
													<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.</p>
												</div>
											</div>
										</div>
									</div><!-- /.col -->

									<div class="vspace-12-sm"></div>
								</div><!-- /.row -->