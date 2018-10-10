<?php
session_start();
include ("config.php");
include ("modules/header.php");
$g=$_GET['g'];

if(isset($_SESSION["id_int"])){
			$s=1;
		}
		else {
			$s=0;
		}

	mic_funciones::Sesiones($s);
?>

<body>

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
				Work Area
			</div>
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

<?php
include ("modules/footer.php");
?>	
</body>
</html>
