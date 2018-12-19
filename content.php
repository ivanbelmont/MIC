<?php
session_start();
include ("config.php");


$g=$_GET['g'];
$modulo = funs_getDatos::ObtenerModuloUnico(strtolower($g));
include ("modules/header.php");

if(isset($_SESSION["id_int"])){
			$s=1;
		}
		else {
			$s=0;
		}

	mic_funciones::Sesiones($s);
?>

<body id="body">

	<!-- Page content -->
	<div class="page-content pt-0">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Main sidebar</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">
				<div class="card card-sidebar-mobile">
					<div id="messages"></div>
					<?php  include ("modules/navigation.php"); ?>

				</div>
			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">
				<!-- Content area -->
			<div class="content">
			<?php

							//DENTRO DE CADA PHP, VAN SUS FUNCIONES ADEMAS DE LOS CSS DE DICHA SECCION
							include "modules/".$modulo.".php";
			//TRAES TODAS LOS MODULOS CON CONSULTA A BASE

			?>
			</div>
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

<?php
include ("modules/footer.php");
include ("functions/functionsJS.php");
?>
<div id="modalBack"  class=""></div>
</body>
</html>
