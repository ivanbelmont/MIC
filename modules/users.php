<?php
$usuarios=funs_getDatos::obtenerUsuarios();

while ($fila = $usuarios->fetch_object()) 
          {
          	$nombre=funs_getDatos::ObtenerCampoBase($fila->datos,'nombre')." ".funs_getDatos::ObtenerCampoBase($fila->datos,'app')." ".funs_getDatos::ObtenerCampoBase($fila->datos,'apm');

          	if($fila->estatus=="off")
          	{
          		$checked="";
          	} else { $checked="checked"; }

          	$Btnswitchery='<input name="V1ROS2JGbFlTakZqTTFab1kyMXNkZz09" id="'.$fila->id_interno.$key.'" type="checkbox" class="form-input-switchery" '.$checked.' data-fouc >';
          	$UsuariosData[]="['".$nombre."','".$checked."','3','4','5','$Btnswitchery','']";

          }
          $UserObj= mic_funciones::arrayAString($UsuariosData,',');

          echo $UserObj;
?>

<!-- Generated column content -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Generated content for a column</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
						In some tables you might wish to have some content generated automatically. This examples shows the use of <code>columns.defaultContent</code> to create a button element in the last column of the table. A simple jQuery <code>click</code> event listener is used to watch for clicks on the row, and when activated uses the <code>row().data()</code> method to get the data for the row and show a bit of information about it in an alert box.
					</div>

					<table class="table datatable-generated ">
						<thead>
				            <tr>
				                <th>Name</th>
				                <th>Position</th>
				                <th>Office</th>
				                <th>Extn.</th>
				                <th>Start date</th>
				                <th>Salary</th>
				                <th></th>
				            </tr>
				        </thead>
					</table>
				</div>
				<!-- /generated column content -->


					            <!-- Options modal -->
				<div id="options_modal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Row options</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<form action="">
									<div class="form-group row">
										<label class="font-weight-semibold col-form-label col-sm-3">Allow select:</label>
										<div class="col-sm-9">
											<select class="form-control form-control-select2" data-fouc>
												<option value="single" selected>Single</option>
												<option value="multiple">Multiple</option>
												<option value="disabled">Disabled</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="font-weight-semibold col-form-label col-sm-3">Allow edit:</label>
										<div class="col-sm-9">
											<select class="form-control form-control-select2" data-fouc>
												<option value="inline">Edit inline</option>
												<option value="modal" selected>Edit in modal</option>
												<option value="popover">Edit in popover</option>
												<option value="disabled">Disabled</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="font-weight-semibold col-form-label col-sm-3">Add status:</label>
										<div class="col-sm-9">
											<select class="form-control form-control-select2" data-fouc>
												<option value="completed" selected>Completed</option>
												<option value="progress">In progress</option>
												<option value="assigned">Assigned</option>
												<option value="created">Created</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="font-weight-semibold col-form-label col-sm-3">Set priority:</label>
										<div class="col-sm-9">
											<select class="form-control form-control-select2-actions" data-fouc>
												<option value="urgent" data-icon="radio-checked text-danger" selected>Urgent</option>
												<option value="high" data-icon="radio-checked text-primary">High</option>
												<option value="normal" data-icon="radio-checked text-success">Normal</option>
												<option value="low" data-icon="radio-checked text-info">Low</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="font-weight-semibold col-form-label col-sm-3" for="enable-controls">Enable controls:</label>
										<div class="col-sm-9">
											<div class="form-check form-check-switchery">
												<input type="checkbox" class="form-input-switchery-controls" id="enable_controls" checked data-fouc>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label class="font-weight-semibold col-form-label col-sm-3">Controls:</label>
										<div class="col-sm-9">
											<select class="form-control form-control-select2-actions" id="available_controls" multiple="multiple">
												<option value="edit" data-icon="pencil7" selected>Edit</option>
												<option value="remove" data-icon="trash" selected>Remove</option>
												<option value="options" data-icon="cog4" selected>Options</option>
												<option value="add" data-icon="plus22">Add</option>
												<option value="add" data-icon="versions">Copy</option>
												<option value="select" data-icon="check">Select</option>
												<option value="mark" data-icon="file-download">Export</option>
												<option value="mark" data-icon="file-upload">Import</option>
												<option value="mark" data-icon="printer">Print</option>
											</select>
										</div>
									</div>
								</form>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Save settings</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /options modal -->