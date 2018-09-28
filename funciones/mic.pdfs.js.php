
<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery.2.1.1.min.js"></script>
<script src="<?php echo BASE_PATH_ASSETS; ?>js/bootstrap.min.js"></script>
<script src="<?php echo BASE_PATH_ASSETS; ?>js/dropzone.min.js"></script>
<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery.validate.min.js"></script>
<script src="<?php echo BASE_PATH_ASSETS; ?>js/bootstrap-datepicker.min.js"></script>

<script>
function CapturaJson(url,guarda,nombre,campo) {
  /*
  url    = Donde se encuentra el Json (Si es de google, la reconocera de forma automatica)
  guarda = Crear un nuevo Json, LocalStorage o solo pasar el que ya existe (Js, Ls, Ex)
  nombre = Nombre del Json que se guardara en fisico o LocalStorage
  campo  = Nombre del campo que tomara la información (Ejemplo uno de google drive: gsx$date)

  Que se hara en ciertos casos
  var guarda:

  * url            = Dejara la url del Json como esta para ser procesada por algun plugin
  * urlStorage(s)  = Dejara url del Json para procesar por plugin. Guardara en Localstorage nombre de la variable "nombre"
  * Drive(json)    = Se toma url drive para comvertirla en un json
  * Drive(obj)     = Se toma url drive para comvertirla en un obj de javascript
  * Drive(stoobj)  = Se toma url drive para comvertirla en un obj y guarda en localstorage
  * Drive(stojson) = Se toma url drive para comvertirla en un json y guarda en localstorage
  * urlStorage(op) = Busca el localstorage, si no le encuentra, toma datos de una url
  * url(op)        = Busca una url u otra segun la opcion
  */

/*if (url.indexOf("spreadsheets.google.com") > -1) {
  console.log("Json - Google Drive");
}
else {
    console.log("Json normal");
}
*/



switch(guarda) {
    case "url":
    console.log("return url only");

    return url;

        break;

    case "urlStorage(s)":
   console.log("Se guarda Json en Localstorage");

   $.getJSON(url, function (data) {
      data= JSON.stringify(data);
      localStorage.setItem(nombre,data);

    });

       return url;

        break;
        /////////////////////////////////////////////////////////////////////////////////////////

    case "Drive(json)":
   console.log("Obtiene Json de drive y combierte a uno nuevo");
     jsonObjDr = [];

     $.getJSON(url, function (data) {

    //Imagina que tenemos este objeto en JavaScript (data)
    data= JSON.stringify(data);//Use la función JavaScript JSON.stringify (data) para convertirla en una cadena.
    var obj = JSON.parse(data);//Para convertir texto en un objeto JavaScript

$.each(obj, function () {

    $.each(this, function (name, value) {

        if(name=='entry'){
        $.each(this, function (name, value) {

           // $("#tbl").append('<tr><td>'+value+'</td></tr>');
           $.each(this, function (name, value) {

            if(name==campo){
             //$("#tbl").append('<tr><td>'+name+'</td></tr>');
              $.each(this, function (name, value) { 

                //$("#tbl").append('<tr><td>'+value+'</td></tr>');

                //CREAR ARRAY
                item = {}
                item ["name"] = value;
                jsonObjDr.push(item);//SE GUARDAN DATOS EN EL JSON NUEVO

              }); //EACH 5
            }//END IF
           });//EACH 4

        });//EACH 3
        }//END IF
    });//EACH 2
});//EACH 1

 jsonObjDr= JSON.stringify(jsonObjDr);//CREAR JSON
 localStorage.setItem(nombre,jsonObjDr);


            });//END getJSON

    return jsonObjDr;//QUITAR

    break;
    /////////////////////////////////////////////////////////////////////////////////////////

    case "Drive(stoobj)":
    console.log("Obtiene Json de drive y combierte a un objeto");
    jsonObj = [];

     $.getJSON(url, function (data) {

    //Imagina que tenemos este objeto en JavaScript (data)
    data= JSON.stringify(data);//Use la función JavaScript JSON.stringify (data) para convertirla en una cadena.
    var obj = JSON.parse(data);//Para convertir texto en un objeto JavaScript

$.each(obj, function () {

    $.each(this, function (name, value) {

        if(name=='entry'){
        $.each(this, function (name, value) {


           // $("#tbl").append('<tr><td>'+value+'</td></tr>');
           $.each(this, function (name, value) {
            if(name==campo){

             //$("#tbl").append('<tr><td>'+name+'</td></tr>');
              $.each(this, function (name, value) { 
                console.log(value);
                //$("#tbl").append('<tr><td>'+value+'</td></tr>');

                //CREAR ARRAY
                jsonObj.push(value);//SE GUARDAN DATOS EN EL JSON NUEVO

              }); //EACH 5
            }//END IF
           });//EACH 4

        });//EACH 3
        }//END IF
    });//EACH 2
});//EACH 1

jsonObj= JSON.stringify(jsonObj);//CREAR OBJ
localStorage.removeItem(nombre);//ELIMINAR LOCALTORAGE
localStorage.setItem(nombre,jsonObj);
            });//END getJSON


    return jsonObj;//QUITAR
    break;
    /////////////////////////////////////////////////////////////////////////////////////////

    default:
        console.log("default options");
}


return jsonObj;

}//END FUNCTION



$(document).ready(function() {



var JsonDrive ="https://spreadsheets.google.com/feeds/list/1XLtQN8WAH6LSvnax4kOCG_--aRtmEyimcgTs7mHLips/2/public/values?alt=json";
var JsonDriMarcas ="https://spreadsheets.google.com/feeds/list/1XLtQN8WAH6LSvnax4kOCG_--aRtmEyimcgTs7mHLips/2/public/values?alt=json";

JsonFinal=CapturaJson(JsonDrive,"Drive(stoobj)","JSonObjt","gsx$marcas");
JsonFinalMr=CapturaJson(JsonDriMarcas,"Drive(json)","JSonObjtM","gsx$color");


//RECIBO DESDE LOCALSTORAGE
var ObjtoStora = localStorage.getItem("JSonObjt");
ObjtoStora = JSON.parse(ObjtoStora);

JsonFinalMr= JSON.stringify(JsonFinalMr);

  var optionsS = {
  //data: ["blue", "green", "pink", "red", "yellow","Ivancho"]
 // data: JsonFinal //OBJETO LOCAL
 data: ObjtoStora,//OBJETO LOCALSTORAGE
   list: {
    match: {
      enabled: true
    }
  }
};
//RECIBE OBJETO
var optionsX = {
  data: JsonFinalMr,
   list: {
    match: {
      enabled: true
    }
  }
};

//$("#Cdecripcion").easyAutocomplete(optionsS);

Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,
   acceptedFiles: ".pdf",
   maxFiles: 1,


  init: function() {

    var base_pathPdf=window.location.host+'/';
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
    <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>',
    dictResponseError: 'Error while uploading file!',
    
    //change the previewTemplate to use Bootstrap progress bars
    previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"});
  

$('#validation-form').validate({
   rules: {
    'rfc': {
    required: true
    }
  }
    });

//datepicker plugin
/*        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){
          $(this).prev().focus();
        });*/

});//END READY
</script>

