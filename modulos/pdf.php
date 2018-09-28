

	<!-- dropzone -->
	<link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>css/dropzone.min.css" />
	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<!-- 	<form action="<?php echo BASE_PATH; ?>/inicio/Archivos" class="dropzone" id="my-dropzone" > -->
			<form  	enctype="multipart/form-data" method="POST" action="<?php echo BASE_PATH; ?>/inicio/Archivos" class="dropzone" id="my-dropzone" >
	
		<div class="fallback">
			<input name="file" type="file" id="subir_archivo" multiple="" />
		</div>
	</form>
	<div class="text-center">
		<button id="submit-all" class="btn btn-primary">Convertir Poliza</button>
	</div>
		


	<?php

		if(!empty($_FILES)){
			$temp =$_FILES['file']['tmp_name'];
			$dir_separator= DIRECTORY_SEPARATOR;
			$folder = "../pdf/polizas/";
			$destination_path = dirname(__FILE__).$dir_separator.$folder.$dir_separator;

			$target_path = $destination_path.$_FILES['file']['name'];
			move_uploaded_file($temp, $target_path);

		}

	?>
	<div id="formulario-poliza">
    </div>



	
