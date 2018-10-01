

<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery.2.1.1.min.js"></script>

<script type="text/javascript">

window.jQuery || document.write("<script src='<?php echo BASE_PATH_ASSETS; ?>js/jquery.min.js'>"+"<"+"/script>");

</script>

<script type="text/javascript">

if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");

</script>

<script src="<?php echo BASE_PATH_ASSETS; ?>js/bootstrap.min.js"></script>

<script src="<?php echo BASE_PATH_ASSETS; ?>js/dropzone.min.js"></script>

<script src="<?php echo BASE_PATH_ASSETS; ?>js/ace-elements.min.js"></script>

<script src="<?php echo BASE_PATH_ASSETS; ?>js/ace.min.js"></script>

<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery.validate.min.js"></script>





<script>





$(document).ready(function() {





Dropzone.options.myDropzone = {



  // Prevents Dropzone from uploading dropped files immediately

  autoProcessQueue: false,

   acceptedFiles: ".pdf",

   maxFiles: 2,


  init: function() {



    var base_pathPdf=window.location.host+'/'+server;

    base_pathPdf='http://'+base_pathPdf+'pdf/obtenerpolizadesglosada.php';



    var submitButton = document.querySelector("#submit-all")

        myDropzone = this; // closure



    submitButton.addEventListener("click", function() {

      myDropzone.processQueue(); // Tell Dropzone to process all queued files.

      console.log(myDropzone.files[0].name);

      



      //location.href = 'index.php';  // this will redirect you when the file is added to dropzone

    });



    // You might want to show the submit button only when 

    // files are dropped here:

    this.on("addedfile", function() {



     

    });

     this.on("complete", function (file) {

      var poliza = [];

      for (var i = 0; i < myDropzone.files.length; i++) {

      poliza.push(myDropzone.files[i].name);

      }

      //datos = new FormData();

      //datos.append("poliza", poliza); //le asigno una referencia a poliza

      var ruta = base_pathPdf; //enlace para hacer la consulta

      var datos =  {'poliza':JSON.stringify(poliza)};

      resultado=ajaxStringSn(ruta,datos); //funcion de ajax que me devuelve los campos dinamicos

      $('#formulario-poliza').html(resultado);





    });



  }

};



/* FUNCION DE PLUGIN DE DROPZONE PARA SUBIR Y ARRASTRAR PDF */

Dropzone.autoDiscover = false;

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

  





$('#validation-form').validate({

   rules: {

    'rfc': {

    required: true

    }

  }

    });

//datepicker plugin

        //link

        $('.date-picker').datepicker({

          autoclose: true,

          todayHighlight: true

        })

        //show datepicker when clicking on the icon

        .next().on(ace.click_event, function(){

          $(this).prev().focus();

        });



});//END READY

</script>



