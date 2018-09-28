<?php
session_start();
include ("config.php");
$g=$_GET['g'];


//echo "Carga Completa ".$g;
//echo BASE_PATH_ASSETS;
if(isset($_SESSION["id_int"])){
			$s=1;
		}
		else {
			$s=0;
		}

mic_funciones::Sesiones($s);
?>

<!DOCTYPE html>
<html lang="en">
	<?php

	//AQUI VAN LOS CSS GENERALES DE TODO EL SISTEMA
	include "modulos/header.php";

	?>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

	<?php

	mic_system::barraazul(1);

	?>
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<?php mic_system::barramenu(1); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="Inicio">Home</a>
							</li>

							<li>
								<i class="fa fa-backward"></i>
								<a onclick="history.back()" href="#">Regresar</a>
							</li>
							<!-- <li class="active">Blank Page</li> -->
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

							<!-- 	AQUI INICIA<br> -->
							<?php

							//DENTRO DE CADA PHP, VAN SUS FUNCIONES ADEMAS DE LOS CSS DE DICHA SECCION
							$modulo = funs_getDatos::ObtenerModuloUnico(strtolower($g));
							include "modulos/".$modulo.".php";
							//TRAES TODAS LOS MODULOS CON CONSULTA A BASE

							?>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo BASE_PATH_ASSETS; ?>js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo BASE_PATH_ASSETS; ?>js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo BASE_PATH_ASSETS; ?>js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?php echo BASE_PATH_ASSETS; ?>js/ace-elements.min.js"></script>
		<script src="<?php echo BASE_PATH_ASSETS; ?>js/ace.min.js"></script>

		<?php

		$serieJs=mic_funciones::aleatorio(8);
		?>
		
		<script type="text/javascript" src="<?php echo BASE_PATH_ASSETS; ?>js/tablas/jquery.js"></script>
		<script type="text/javascript" src="<?php echo BASE_PATH_ASSETS; ?>js/tablas/jquery-migrate.js" ></script>
		<script type="text/javascript" src="<?php echo BASE_PATH_ASSETS; ?>js/tablas/datatables.min.js" ></script>
		<!-- <script type="text/javascript" src="<?php echo BASE_PATH; ?>mic.procesos.js?u=<?=$serieJs; ?>" ></script> -->
		<script src="<?php echo BASE_PATH_ASSETS; ?>js/completar/jquery.easy-autocomplete.min.js"></script> 
		<?php 
		 include_once 'funciones/mic.procesos.js.php';//PARA ACTUALIZAR TODO TIPO DE DATOS
		?>

		<!-- inline scripts related to this page -->
	</body>
</html>
