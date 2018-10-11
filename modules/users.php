<?php
$usuarios=funs_getDatos::obtenerUsuarios();
?>
	<!-- Theme JS files -->
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script src="<?php echo ASSETS_GLOBAL; ?>js/plugins/forms/selects/select2.min.js"></script>

	<script src="<?php echo ASSETS_GLOBAL; ?>js/demo_pages/datatables_responsive.js"></script>
	<!-- /theme JS files -->
		<!-- Control position -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Control position</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
						When using the <code>column</code> child row control type, Responsive has the ability to use any column or element as the show/hide control for the row details. This is provided through the <code>responsive.details.target</code> option, which can be either a column index, or a jQuery selector. This example shows the <code>last</code> column in the table being used as the control column.
					</div>

					<table class="table datatable-responsive-control-right">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Job Title</th>
								<th>DOB</th>
								<th>Status</th>
								<th>Status2</th>
								<th class="text-center">Actions</th>
								<th></th>
							</tr>
						</thead>
						<tbody>

							<?php

while ($fila = $usuarios->fetch_object()) 
          {
          	echo '<tr>
								<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'nombre').'</td>
								<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'app').' '.funs_getDatos::ObtenerCampoBase($fila->datos,'apm').'</td>
								<td>'.funs_getDatos::ObtenerCampoBase($fila->datos,'tel').'</td>
								<td>'.$fila->usuario.'</td>
								<td>'.$fila->usuario.'</td>
								<td><span class="badge badge-success">Active</span></td>
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
												<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
												<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
											</div>
										</div>
									</div>
								</td>
								<td></td>
							</tr>';

          }


          	?>
						</tbody>
					</table>
				</div>
				<!-- /control position -->