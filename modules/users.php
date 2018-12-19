<?php
$usuarios=funs_getDatos::obtenerUsuarios();

while ($fila = $usuarios->fetch_object()) 
          {
          	$datos=$fila->datos;

          	$nombre=funs_getDatos::ObtenerCampoBase($datos,'nombre');
          	$apellidoP=funs_getDatos::ObtenerCampoBase($datos,'app');
          	$apellidoM=funs_getDatos::ObtenerCampoBase($datos,'apm');
          	$telU=funs_getDatos::ObtenerCampoBase($datos,'tel');
          	$celu=funs_getDatos::ObtenerCampoBase($datos,'cel');
          	$correo=funs_getDatos::ObtenerCampoBase($datos,'correo');
          	$rolName=funs_getDatos::ObtenerRol($fila->id_rol,'nom');
          	$rolColor=funs_getDatos::ObtenerRol($fila->id_rol,'color');
          	$status=$fila->estatus;
          	$IdRol=$fila->id_rol;
          	$image=$fila->imagen;
          	$id_interno=$fila->id_interno;

          	$fullname=$nombre." ".$apellidoP." ".$apellidoM;
          	$telCel=$telU." / ".$celu;
          	$rol='<span class="badge '.$rolColor.'">'.$rolName.'</span>';

          	 $datosScript=$id_interno.",".$nombre.",".$apellidoP.",".$apellidoM.",".$correo.",".$telU.",".$celu.",".$IdRol.",".$status.",".$image;

          	 $datosScript=base64_encode($datosScript);

          	$key=mic_funciones::aleatorio(20);
          	$keyI=mic_funciones::aleatorio(5);



          	if($status=="off")
          	{
          		$checked="";
          		$class="badge badge-danger";
          	} else { $checked="checked"; $class="badge badge-success"; }

          	$nombreNice='<div class="media"><div class="mr-3"><a href="#"><img src="'.ASSETS.'/images/users/'.$image.'" class="rounded-circle" alt="" width="42" height="42"></a></div><div class="media-body"><h6 class="mb-0">'.$fullname.'</h6><span class="text-muted">Chief officer</span></div></div>';
/*
          	$Btnswitchery='<input name="V1ROS2JGbFlTakZqTTFab1kyMXNkZz09" id="'.$id_interno.$key.'" type="checkbox" class="form-input-switchery" '.$checked.' data-fouc >';*/

          	$BtnswitcheryS='<span style="font-size: 120%; cursor: pointer;" onclick="FncClick(this.id);" data="'.$id_interno.'" name="V1ROS2JGbFlTakZqTTFab1kyMXNkZz09" id="'.$id_interno.$key.'" class="'.$class.'">'.$status.'</span>';

          	$tools='<i title="¿Eliminar al usuario '.$fullname.'?" data="'.$keyI.$id_interno.$key.' " name="Wld4cGJXbHVZWEoxYzNWaGNtbHY" id="'.$keyI.$id_interno.$key.'" onclick="FncClick(this.id);" class="iconColorRed selection icon-trash mr-3 icon-2x"></i>';
          	$tools.='<i name="WldScGRHRnlkWE4xWVhKcGJ3PT0" onclick="FncClick(this.id);" id="X'.$keyI.$id_interno.$key.'" title="Editar a '.$fullname.'" class="iconColorRed selectionG icon-pencil mr-3 icon-2x" data="'.$datosScript.'"></i>';


 $UsuariosData[]="['".$nombreNice."','".$correo."','".$rol."','".$telCel."','$BtnswitcheryS','".$tools."','']";

          }
          
          $UserObj= mic_funciones::arrayAString($UsuariosData,',');

         // echo $UserObj;
          //print("<pre>".print_r($UsuariosData,true)."</pre>");


//ARRAY DE LOS ROLES QUE NO QUEREMOS QUE SALGAN
$arrNoRol=["0","2"];//$arrNoRol=["0","1"];
$rolesNo=mic_funciones::arrayAString($arrNoRol,",");

     $roles=funs_getDatos::ObtenerRol('x','nom','todos',$rolesNo);
     $rolAll="";
while ($fila = $roles->fetch_object()) 
          {
$rolAll.='<option style="font-weight: bold;" class="'.$fila->font.'" value="'.$fila->id.'">'.$fila->descripcion.'</option>';
}
//echo $rolAll;
?>

<!-- Generated column content -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Administración de usuarios</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
					<div  class="card-body">
							<div data-toggle="modal" id="NewUser" class="col-md-2 col-sm-8 selection">
							<div class="d-flex align-items-center">
							<i class="icon-user-plus mr-3 icon-2x"></i>
							<div   >Nuevo usuario</div>
							</div>
							</div>
					</div>


<!-- 					<div class="card-body">
						In some tables you might wish to have some content generated automatically. This examples shows the use of <code>columns.defaultContent</code> to create a button element in the last column of the table. A simple jQuery <code>click</code> event listener is used to watch for clicks on the row, and when activated uses the <code>row().data()</code> method to get the data for the row and show a bit of information about it in an alert box.
					</div> -->

					<table class="table datatable-generated ">
						<thead>
				            <tr>
				                <th>Nombre</th>
				                <th>Correo/usuario</th>
				                <th>Rol</th>
				                <th>Tel/Cel</th>
				                <th>Habilitado</th>
				                <th>Funciones</th>
				                <th></th>
				            </tr>
				        </thead>
					</table>
				</div>
				<!-- /generated column content -->


				<!-- Remote source -->
				<div id="modal_remote" aria-hidden="true" class="modal" tabindex="-1" style="padding-right: 17px;">
					<div class="modal-dialog modal-full">
						<div class="modal-content">
							<div class="modal-header">
								<h5 id="titulo" class="modal-title">Nuevo usuario</h5>
								<button fnc="closeNew"  type="button" class="close" >&times;</button>
							</div>

							<div class="modal-body">
								<div class="col-lg-10">
										<div class="row">
						<div class="col-md-6">
										
						<div class="form-group form-group-feedback form-group-feedback-left">
							<input id="nombre" type="text" class="form-control form-control-lg" placeholder="Nombre">
							<div class="form-control-feedback form-control-feedback-lg">
								<i class="icon-user"></i>
							</div>
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input id="app" type="text" class="form-control" placeholder="Apellido paterno">
							<div class="form-control-feedback">
								<i class="icon-magazine"></i>
							</div>
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input id="apm" type="text" class="form-control form-control-sm" placeholder="Apellido materno">
							<div class="form-control-feedback form-control-feedback-sm">
								<i class="icon-magazine"></i>
							</div>
						</div>
					</div>

										
					<div class="col-md-6">
					<div class="form-group form-group-feedback form-group-feedback-left">
						<input id="correo" type="email" class="form-control form-control-lg" placeholder="Correo/Usuario">
						<div class="form-control-feedback form-control-feedback-lg">
							<i class="icon-envelop3"></i>
						</div>
					</div>

					<div class="form-group form-group-feedback form-group-feedback-left">
						<input id="tel" type="text" class="form-control" placeholder="Teléfono">
						<div class="form-control-feedback">
							<i class="icon-phone2"></i>
						</div>
					</div>

					<div class="form-group form-group-feedback form-group-feedback-left">
						<input id="celular" type="text" class="form-control form-control-sm" placeholder="Celular">
						<div class="form-control-feedback form-control-feedback-sm">
							<i class="icon-mobile2 "></i>
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group form-group-feedback form-group-feedback-left">
						<input id="contrasena" type="password" class="form-control form-control-lg" placeholder="Contraseña (si se deja en blanco, el sistema asignara una)">
						<div class="form-control-feedback form-control-feedback-lg">
							<i class="icon-eye-blocked "></i>
						</div>
					</div>
					<input type="hidden" id="id_int" name="id_int">
					
					</div>

										</div>
									</div>
									<div class="form-group row">
		                        	<div class="col-lg-10">
			                            <div >
			                    <span style="-moz-user-select: none;">Selecciona un rol de usuario</span>
			                            	<select id="rol" class="form-control form-control-uniform">
			                               <?=$rolAll?>
			                            </select>
			                        </div>
		                            </div>
		                        </div>
									<!-- END DIV MODAL-->
							</div>

							<div class="modal-footer">
								<button fnc="closeNew" type="button" class="btn btn-link" >Close</button>
								<button fnc="createUser" type="button" class="btn bg-primary">Crear</button>
							</div>
						</div>
					</div>
				</div>
<!-- /remote source -->
				