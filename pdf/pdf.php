
<!DOCTYPE html>
<html>
<head>
	<!-- dropzone -->
	<link rel="stylesheet" href="../assets/css/dropzone.min.css" />
	<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.min.js"></script>

	<title></title>
</head>
<body>
	<button id="submit-all">Convertir Poliza</button>
	<form action="pdf.php" class="dropzone" id="my-dropzone">
		<div class="fallback">
			<input name="file" type="file" multiple="" />
		</div>
	</form>

	<?php
		if(!empty($_FILES)){
			$temp =$_FILES['file']['tmp_name'];
			$dir_separator= DIRECTORY_SEPARATOR;
			$folder = "uploads";
			$destination_path = dirname(__FILE__).$dir_separator.$folder.$dir_separator;

			$target_path = $destination_path.$_FILES['file']['name'];
			move_uploaded_file($temp, $target_path);
			
		}

	?>
<!--[if !IE]> -->
		<script src="../assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/dropzone.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,


  init: function() {
    var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function() {
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
      location.href = 'index.php';  // this will redirect you when the file is added to dropzone
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("addedfile", function() {
     
    });

  }
};
var myDropzone = new Dropzone("#my-dropzone" , {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 10, // MB

	addRemoveLinks : true,
	dictDefaultMessage :
	'<span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i> Arrastra pdf </span> a subir \
	<span class="smaller-80 grey">(o dar click)</span> <br /> \
	<i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>'
,
	dictResponseError: 'Error while uploading file!',
	
	//change the previewTemplate to use Bootstrap progress bars
	previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
  });
		</script>
</body>
</html>