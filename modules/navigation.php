<!-- Header -->
					<div class="card-header header-elements-inline">
						<h6 class="card-title">Navegación</h6>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>
					
					<!-- User menu -->
					<div class="sidebar-user">
						<div class="card-body">
							<div class="media">
								<div class="mr-3">
									<a href="#"><img src="<?php echo ASSETS.'images/users/'.$_SESSION["imagen"]; ?>" width="38" height="38" class="rounded-circle" alt=""></a>
								</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
    $("#usconutry").html("&nbsp;"+data.address.country);
});
</script>
								<div class="media-body">
									<div class="media-title font-weight-semibold"><?php echo $_SESSION["nombre"]." ".$_SESSION["app"]; ?></div>
									<div class="font-size-xs opacity-50">
										<i id="usconutry" class="icon-pin font-size-sm"></i>
									</div>
								</div>

								<div class="ml-3 align-self-center">
									<a href="#" class="text-white"><i class="icon-cog3"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->

					
					<!-- Main navigation -->
					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">

					<?php
					$modulosr=funs_getDatos::ObtenerModulos();
					$dato='icono';
					$PerRol=$_SESSION["id_rol"];

					while ($fila = $modulosr->fetch_object()) 
					{

					$permisos=mic_system::PermisosRol($fila->nombre,$PerRol,$dato);
					//echo $permisos." - ".$PerRol;

					if($permisos=="M"){
						$estilo="";
					}
					elseif($permisos=="N") {
						$estilo="display:none;";
					}
					elseif ($permisos=="D") {
						$estilo="opacity:0.5;";
					}

					echo '<li style="'.$estilo.'" class="nav-item"><a href="'.$fila->mostrar.'" class="nav-link"><i class="'.$fila->icon.'"></i> <span>'.ucfirst($fila->mostrar).'</span></a></li>';

					}//END WHILE

					?>
								
						</ul>
					</div>
					<!-- /main navigation -->