
<script>
var base_path=window.location.host+'/';
base_path='http://'+base_path+'procesa/procesa.php';

var jsonRut='http://'+window.location.host+'/'+'pdf/';

var method='post';
var parametros;
var mensajeParam;
var Mensaje = localStorage.getItem("mensajeDone");
var repet = $("#messemail");

if(Mensaje=="alJDMjdneTlQZ2NzUEd0N0dOY0Y1UT09"){
text = localStorage.getItem("mensaje");
obj = JSON.parse(text);


$("#mensajes").append('<div class="alert '+obj.tipo+'"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong><i class="ace-icon fa fa-check"></i>'+obj.titulo+'<br></strong>'+obj.mensaje+'<br /></div>').delay(5000).fadeOut();


localStorage.mensajeDone="NULL";

}// END IF

else
{

    $("#mensajes").append('');

}//END ELSE


$(document).ready(function() {

$('#NuevoCliente').validate({
    rules: {
        'nombre': {required: true},
        'apaterno': {required: true},
        'amaterno': {required: true},
        'telefono': {
                 required: true,
                         number: true,
                         minlength: 8,
                         maxlength: 12
              },
        'celular': {
              required: true, 
                        number: true,
                        minlength: 10,
                        maxlength: 13
               },
            'correo': {
            required: true,
            email: true,
            remote: {
                      url: "http://localhost/Mics/procesa/checkUnameEmail.php",
                      type: "post",
                      dataType: "json",
                      data: {
                                correo: function() 
                                {
                                return $("#correo").val();
                                }//END FUNCTION
                     },//END DATA
                      success:  function (response) {

                        if(response){
                          console.log("conitnuar");
                           repet.html("");
                        $('#AddPoliza').show("");
                        $('#btnenviar').show("");
                          
                        }
                        else
                        {
                          console.log("Repetido");
                          repet.append("<br><label style='color:red' ><b>El correo ingresado ya existe.</b></label>");

                        $('#AddPoliza').hide("");
                        $('#btnenviar').hide("");

                        }
                        //console.log(response);
                        return response;
                      },
                        error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.status);
                        console.log(jqXHR.responseText);
                        console.log(textStatus);
                        console.log(errorThrown);
                        }//END ERROR DATA
                  }//END REMOTE
                }//END CORREO
      },
      messages: {
             'nombre': {    required: '<b style="color:red;" >Ingresa el nombre.</b>'},
              'apaterno': { required: 'Ingresa el apellido paterno.'},
              'amaterno': { required: 'Ingresa el apellido materno.'},
              'telefono': { 
                            required: 'Ingresa tu telefono fijo.',
                            number: "Ingresa solamente datos numéricos para tu teléfono.",
                            minlength: "El teléfono debe ser de 8 dígitos. Incluye la clave de larga distancia.",
                            maxlength: "El teléfono debe de ser de máximo 12 dígitos."
                     },
              'celular': { 
                            required: 'Ingresa el numero de celular.',
                            number: "Ingresa solamente datos numéricos para tu teléfono.",
                            minlength: "El teléfono debe ser de 10 dígitos. Incluye la clave de larga distancia.",
                            maxlength: "El teléfono debe de ser de máximo 13 dígitos."

                   },
               'correo': {
                            required: 'Debe ingresar un correo electrónico',
                            email: 'Debe ingresar un correo electrónico válido. Por ejemplo: nombre@correo.com',
                            remote: "Email already in use!"
                     }
               }
  
    });




function CrearJson(boton)
{

     //crear Json
     jsonObj = [];
    $('input[name="'+boton+'"]').each(function(){
   var id = this.id;
   var valor = this.value;

        item = {}
        item ["id"] = id;
        item ["valor"] = valor;

        jsonObj.push(item);
    });
     //crear Json end

     return jsonObj;
    
}
//END FUNCION JSON

 function ordenarSelect(id_componente)
    {
      var selectToSort = jQuery('#' + id_componente);
      var optionActual = selectToSort.val();
      selectToSort.html(selectToSort.children('option').sort(function (a, b) {
        return a.text === b.text ? 0 : a.text < b.text ? -1 : 1;
      })).val(optionActual);

      //alert("done Select");

    }
//END FUNCION Ordenar

var JsonDrive ="https://spreadsheets.google.com/feeds/list/1XLtQN8WAH6LSvnax4kOCG_--aRtmEyimcgTs7mHLips/1/public/values?alt=json";

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
              //  console.log(value);
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





$('#RestPoliza').hide("");

   $("#btnenviar").click(function(){

    jsonObjM =CrearJson("dmateriales");
    jsonObjR =CrearJson("robo");
    jsonObjRe=CrearJson("respciv");
    jsonObjg =CrearJson("gastmed");
    jsonObjgs=CrearJson("gastleg");
    jsonObjas =CrearJson("asistv");
    jsonObjmu =CrearJson("muerte");
    jsonObinf =CrearJson("infaseg");
    jsonDescV =CrearJson("descvehi");
    jsonCalcu =CrearJson("fcalculos");
    
    
    

        var nombre = $('#nombre').val();
        var apellidop = $('#apellidop').val();
        var apellidom = $('#apellidom').val();
        var telefono = $('#telefono').val();
        var celular = $('#celular').val();
        var correo = $('#correo').val();
        var dmateriales = jsonObjM;
        var robo = jsonObjR;
        var respciv = jsonObjRe;
        var gastmed = jsonObjg;
        var gastleg = jsonObjgs;
        var asistv = jsonObjas;
        var muerte = jsonObjmu;
        var vinfaseg = jsonObinf;//Información del Asegurado
        var descvehi = jsonDescV;//Descripción del Vehiculo Asegurado
        var fcalculos = jsonCalcu;//Descripción del Vehiculo Asegurado
        var proceso = $('#btnenviar').val();


var parametros = {
                "nombre" : nombre,
                "apellidop" : apellidop,
                "apellidom" : apellidom,
                "telefono" : telefono,
                "celular" : celular,
                "correo" : correo,
                "dmateriales" : dmateriales,
                "robo" : robo,
                "respciv" : respciv,
                "gastmed" : gastmed,
                "gastleg" : gastleg,
                "asistv" : asistv,
                "muerte" : muerte,
                "vinfaseg":vinfaseg,
                "fcalculos":fcalculos,
                "descvehi":descvehi,
                "proceso" : proceso
        };//END PARAMETROS

         mensajeParam = {

        tipo: "alert-info",
        titulo:   "Exito!",
        mensaje: "Operacion exitosa!!!"

        };//JSON OBJETOS


       //AjaxProcess(parametros,base_path,method,mensajeParam);//PARA HACER LA FUNCION DIRECTA
       AjaxResponse(parametros,base_path,method,mensajeParam);//PARA PRUEBAS DE VISUALIZACION


});//END CLICK
// ///////////////////// END ENVIAR DATOS PARA CREAR CLIENTE

  $("#AddPoliza").click(function(){

    $("#formpoliza").append('<div id="divInfoAseg"></div>');

var campos = [
    campo1 = {"nombre": "Poliza","tipo": "text", "placeholder": "Número de poliza","ids":"basics","Vclass":"width-100","icon":"ace-icon fa fa-check","narray":"infaseg"},
    campo2 = {"nombre": "Aseguradora","tipo": "text", "placeholder": "Aseguradora","Vclass":"width-100","icon":"ace-icon fa fa-check","narray":"infaseg"},
    campo2 = {"nombre": "Vigencia","tipo": "text", "placeholder": "Vigencia del", "ids":"id-date-picker-1","Vclass":"form-control date-picker width-100","dataF":"dd-mm-yyyy","icon":"ace-icon fa fa-calendar","narray":"infaseg"},
    campo2 = {"nombre": "Hasta","tipo": "text", "placeholder": "Hasta", "ids":"id-date-picker-2","Vclass":"form-control date-picker width-100","dataF":"dd-mm-yyyy","icon":"ace-icon fa fa-calendar","narray":"infaseg"},
    campo2 = {"nombre": "RFC","tipo": "text", "placeholder": "RFC","Vclass":"width-100","icon":"ace-icon fa fa-check","narray":"infaseg"},
    campo2 = {"nombre": "Estado","tipo": "select", "placeholder": "Estado", "ids":"estadosr","Vclass":"width-100","icon":"ace-icon fa fa-check","narray":"infaseg"},
    campo2 = {"nombre": "Municipio","tipo": "select", "placeholder": "Municipio","ids":"municipiosr","Vclass":"width-100","icon":"ace-icon fa fa-check","narray":"infaseg"},
    campo2 = {"nombre": "Colonia","tipo": "select", "placeholder": "Colonia", "ids":"Coloniasr","Vclass":"width-100","icon":"ace-icon fa fa-check","narray":"infaseg"},
    campo2 = {"nombre": "C.P","tipo": "text", "placeholder": "Código postal","ids":"codigopr","Vclass":"width-100","icon":"ace-icon fa fa-check","narray":"infaseg"},
    campo2 = {"nombre": "Domicilio","tipo": "text", "placeholder": "Domicilio","Vclass":"width-100","icon":"ace-icon fa fa-check","narray":"infaseg"},
     campo2 = {"nombre": "Vehículo","tipo": "text", "placeholder": "Descripción Vehículo", "ids":"Cdecripcion","Vclass":"width-100","icon":"ace-icon fa fa-check","narray":"infaseg"},
]

var camposVeiculo = [
    campo1 = {"nombre": "Tipo","tipo": "text", "placeholder": "Tipo de Vehículo","ids":"tipo","narray":"descvehi"},
    campo2 = {"nombre": "Modelo","tipo": "text", "placeholder": "Modelo","ids":"modelo","narray":"descvehi"},
    campo2 = {"nombre": "Color","tipo": "text", "placeholder": "Color", "ids":"campcolor","ids":"campcolor","narray":"descvehi"},
    campo2 = {"nombre": "Ocupantes","tipo": "text", "placeholder": "Ocupantes","ids":"ocupantes","narray":"descvehi"},
    campo2 = {"nombre": "Serie","tipo": "text", "placeholder": "Serie","ids":"serie","narray":"descvehi"},
    campo2 = {"nombre": "Motor","tipo": "text", "placeholder": "Motor","ids":"motor","narray":"descvehi"},
    campo2 = {"nombre": "REPUVE","tipo": "text", "placeholder": "REPUVE","ids":"REPUVE","narray":"descvehi"},
    campo2 = {"nombre": "Placas","tipo": "text", "placeholder": "Placas","ids":"placas","narray":"descvehi"},
    campo2 = {"nombre": "Fecha Pago","tipo": "text", "placeholder": "fecha vencimiento de pago","ids":"fpago","narray":"descvehi"},
    campo2 = {"nombre": "Plazo pago","tipo": "text", "placeholder": "Plazo de pago","ids":"plazo","narray":"descvehi"},
    campo2 = {"nombre": "Uso","tipo": "text", "placeholder": "Uso","ids":"uso","narray":"descvehi"},
    campo2 = {"nombre": "Servicio","tipo": "text", "placeholder": "Servicio","ids":"campcolor","servicio":"descvehi"},
    campo2 = {"nombre": "Movimiento","tipo": "text", "placeholder": "Movimiento","ids":"movimiento","narray":"descvehi"},

]
var TipoCampo="";
var IdCarga="";
var espacios =1;
var espaciosF =1;
var creaDivIfo="";

creaDivIfo+='<h3 class="header smaller lighter green">Información del Asegurado</h3>';

// $("#divInfoAseg").append('<h3 class="header smaller lighter green">Información del Asegurado</h3>');
campos.forEach(function(campo, index) {

if(campo.tipo==='select')
{
    TipoCampo=
'<select name="'+campo.narray+'" class="form-control" id="'+campo.ids+'">'+
'<option value=""></option>'+
'</select>';
 }
else {

  if (campo.ids){

    IdCarga=campo.ids;
   
}
else {

IdCarga='campo'+index;

}

    TipoCampo=
    '<span class="block input-icon input-icon-right"> '+
    '<input data-date-format="'+campo.dataF+'" class="'+campo.Vclass+'" type="'+ campo.tipo+'" id="'+IdCarga+'" name="'+ campo.narray +'" placeholder="'+ campo.placeholder +'"> '+
    '<i id="i-'+IdCarga+'" class="'+campo.icon+'"></i> '+
    '</span>';
 }//END ELSE

//console.log(TipoCampo);

if(espacios===1 || espacios===5 || espacios===9){
  //espacios=1;

  creaDivIfo+='<div style="" class="form-group row has-info">';
  //$("#divInfoAseg").append('<div style="background-color:RED;" class="form-group row has-info">abre');
}
creaDivIfo+='<div class="col-md-3">'+
                              '<label for="campo'+index+'" '+
                              'class="col-xs-12 col-sm-1 '+
                              'control-label no-padding-right"><b>'+ campo.nombre +'</b></label>'+
                              '<div class="col-xs-12 col-sm-12"> '+TipoCampo+
                              '</div> '+
                              '<div class="help-block col-xs-12 col-sm-reset inline"> '+
                              '<div style="Color: RED;" id="m-'+IdCarga+'" > </div>'+
                              '</div> </div>';
/*$("#divInfoAseg").append('<div class="col-md-3">'+
                              '<label for="campo'+index+'" '+
                              'class="col-xs-12 col-sm-1 '+
                              'control-label no-padding-right"><b>'+ campo.nombre +'</b></label>'+
                              '<div class="col-xs-12 col-sm-12"> '+TipoCampo+
                              '</div> '+
                              '<div class="help-block col-xs-12 col-sm-reset inline"> '+
                              '<div style="Color: RED;" id="m-'+IdCarga+'" > </div>'+
                              '</div> ');*/
if(espaciosF===4 || espaciosF===8 || espaciosF===11){
  //espaciosF=1;
  //$("#divInfoAseg").append('Cierra</div>');
  creaDivIfo+='</div>';
}


    espacios ++;
    espaciosF ++;

});//END CAMPOS
$("#divInfoAseg").append(creaDivIfo);

//VALIDATE CAMPOS
/*$("#NuevoCliente").validate();
  $("input[id='basics']").rules("add", {
     required : true,
     messages : { required : 'Este campo es requerido' }
  });
*/

//ENTRA Y SALE MOUSE (RATON)
/*$( "#basics" ).on( "mouseenter mouseleave", function( event ) {
  $( this ).toggleClass( "active" );
  alert("Here!");
});
*/

//CUANDO SE PIERDE EL FOCO DEL INPUT
$( "#basics" ).focusout(function() {
  console.log("...:::Validando:::...");


var campoV=$("#basics").val();

console.log(campoV);
//var elemensaje=$(this).attr("id");
var elemensaje="m-basics";
var procesoV="ZW52aWFtb3NwYXJhdmFsaWRhcg==";
var parametros = {
                "campovalidar" : campoV,
                "proceso" : procesoV
        };//END PARAMETROS

         mensajeParam = {

        tipo: "alert-info",
        titulo: "Exito!",
        mensaje: "Operacion exitosa!!!"

        };//JSON OBJETOS

       AjaxValidate(parametros,base_path,method,mensajeParam,elemensaje);//PARA VALIDAR UN CAMPO EN LA BASE

       });//END FOCUS 




//CARGA CALENDARIO
$('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
      
var JsonColores=jsonRut+"countries.json";
var JsonDrive ="https://spreadsheets.google.com/feeds/list/1XLtQN8WAH6LSvnax4kOCG_--aRtmEyimcgTs7mHLips/2/public/values?alt=json";
var JsonDriMarcas ="https://spreadsheets.google.com/feeds/list/1XLtQN8WAH6LSvnax4kOCG_--aRtmEyimcgTs7mHLips/2/public/values?alt=json";
//CapturaJsonDrive(JsonDrive);

/*var jqxhr = $.getJSON(JsonColores, function() {
  console.log( "\n...\n" );
})
  .done(function() {
    console.log( "Bien, conituar" );
  })
  .fail(function() {
    console.log( "error, Cambiar" );
  })
  .always(function() {
    console.log( ".....::::: Tarea Terminada :::::....." );
  });
*/

JsonFinal=CapturaJson(JsonDrive,"Drive(stoobj)","JSonObjt","gsx$marcas");
JsonFinalMr=CapturaJson(JsonDriMarcas,"Drive(json)","JSonObjtM","gsx$color");

console.log("------------------------------------------------");
console.log("JSONFINAL");
console.log(JsonFinal);
console.log("------------------------------------------------");
console.log(JsonFinalMr);
console.log("------------------------------------------------");

//RECIBE JSON
/*var optionsS = {
  url: JsonFinal,

  getValue: "name",

  list: {
    match: {
      enabled: true
    }
  }
};*/


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

$("#Cdecripcion").easyAutocomplete(optionsS);


////console.log(jsonRut+'estados.json');
 $.getJSON(jsonRut+'estados.json', function (data) {
                var items = [];
                var options = '<option value="">Selecciona un estado</option>'; 

                $.each(data, function (key, val) {
                    options += '<option value="' + val.nombre + '">' + val.nombre + '</option>';
                });//END each(data)         
                $("#estadosr").html(options); 
            
            });//END getJSON ////////////////////////////////////////////////////////////////////////////




//START getJSON ////////////////////////////////////////////////////////////////////////////
 $( "#estadosr" ).change( function(valor_select ){
                 var estado = $( "#estadosr" ).val();
                 //console.log(estado);


                $.getJSON(jsonRut+'municipios.json', function (data) {
                var items = [];
                var options = '<option value="">Selecciona un municipio</option>';
                var Valoresciudades = '';

                $.each(data, function (key, val) {


                    if(val.estado == estado) {  

                            $.each(val.ciudades, function (key_municipio, val_muni) {
                                Valoresciudades += '<option value="' + val_muni + '">' + val_muni + '</option>';
                            });                 
                        }
                    
                });//END each(data)         
                $("#municipiosr").html(Valoresciudades);
                 ordenarSelect('municipiosr');
            
            });//END getJSON ////////////////////////////////////////////////////////////////////////////
            });//END change


 //START getJSON ////////////////////////////////////////////////////////////////////////////
 $( "#municipiosr" ).change( function(valor_select ){//DETECTAMOS LOS CAMBIOS A MUNICIPIOS
                 var municipio = $( "#municipiosr" ).val();//CAPTURAMOS EL VALOR DEL SELECT
                 //console.log(municipio);


                //CAPTURAMOS EL JSON
                $.getJSON(jsonRut+'colonias2.json', function (data) {
                var items = [];
                var options = '<option value="">Selecciona una colonia</option>';
                var Valorescolonias = '';

                $.each(data, function (key, val) {
                  //RECORREMOS EL JSON

                    if(val.municipio == municipio) {
                      //COMPARAMOS LLAVE municipio CON municipio valor select

                      //recorrer json con val.colonia que contiene las colonias
                            $.each(val.colonia, function (key_colonia, val_cols) {
                              //RECORREMOS TODAS LAS COLONIAS QUE COINCIDAN
                              // Y LO CARGAMOS A LA VARIABLE
                                Valorescolonias += '<option value="' + val_cols + '">' + val_cols + '</option>';
                            });                 
                        }
                    
                });//END each(data)
                //LO CARGAMOS AL SELECT         
                $("#Coloniasr").html(Valorescolonias);
                //PARA DESPUES REORDENAR EL SELECT
                      ordenarSelect('Coloniasr');
            
            });//END getJSON ////////////////////////////////////////////////////////////////////////////
            });//END change


 //START getJSON ////////////////////////////////////////////////////////////////////////////
 $( "#Coloniasr" ).change( function(valor_select ){//DETECTAMOS LOS CAMBIOS A COLONIAS
                 var colonia = $( "#Coloniasr" ).val();//CAPTURAMOS EL VALOR DEL SELECT
                 //console.log(colonia);


                //CAPTURAMOS EL JSON
                $.getJSON(jsonRut+'codpostal.json', function (data) {
                var items = [];
                var options = '<option value="">Selecciona una CP</option>';
                var ValoresCP = '';

                $.each(data, function (key, val) {
                  //RECORREMOS EL JSON

                    if(val.colonia == colonia) {
                      //COMPARAMOS LLAVE colonia CON colonia valor select

                      //console.log("codPotsla="+val.codpostal);
                       $("#codigopr").val(val.codpostal);
                      //recorrer json con val.codpostal que contiene los Codigos postales
                          /*  $.each(val.codpostal, function (key_cp, val_cps) {
                                $("#codigopr").val(val_cps);
                            });  */               
                        }
                    
                });//END each(data)
            
            });//END getJSON ////////////////////////////////////////////////////////////////////////////
            });//END change


$("#formpoliza").append('<div id="divDescVehi"></div>');
var creaDivDesVe="";
espacios =1;
espaciosF =1;

 creaDivDesVe+='<h3 class="header smaller lighter green">Descripción del Vehiculo Asegurado</h3>';
camposVeiculo.forEach(function(campo, index) {
if (campo.ids){

    IdCarga=campo.ids;
   
}
else {

IdCarga='campo'+index;

}

if(espacios===1 || espacios===5 || espacios===9 || espacios===13){
  creaDivDesVe+='<div style="" class="form-group row has-info">';
}


    creaDivDesVe+='<div class="col-md-3"><label for="campo'+index+'" '+
    'class="col-xs-12 col-sm-1 '+
    'control-label no-padding-right"><b>'+ campo.nombre +'</b></label> '+
    '<div class="col-xs-12 col-sm-12"> '+
    '<span class="block input-icon input-icon-right"> '+
    '<input autocomplete="off" type="'+ campo.tipo+'" id="'+IdCarga+'" name="'+ campo.narray +'" placeholder="'+ campo.placeholder +'" class="width-100"> '+
    '<i class="ace-icon fa fa-check"></i> '+
    '</span> '+
    '</div> '+
    '<div class="help-block col-xs-12 col-sm-reset inline"> '+
    '</div> '+
    '</div> ';

if(espaciosF===4 || espaciosF===8 || espaciosF===12 || espaciosF===13){
  creaDivDesVe+='</div>';
}


    espacios ++;
    espaciosF ++;


});//END forEach
$("#divDescVehi").append(creaDivDesVe);
//END CAMPOSVEICULO

$("#campcolor").easyAutocomplete(optionsX);

$("#formpoliza").append('<div class="space-4"></div>');
$("#formpoliza").append('<h3 class="header smaller lighter green">COBERTURAS</h3>');

 $("#formpoliza").append('<div class="form-group has-info">'+
    '<label for="celular" class="col-xs-12 col-sm-1 control-label no-padding-right">Cobertura</label>'+
    '<div class="col-xs-12 col-sm-4">'+
    '<select class="form-control" id="form-field-select-1">'+
    '<option value="Tipo">Tipo de cobertura</option>'+
    '<option value="Amplia"><b>Amplia</b></option>'+
    '<option value="Limitada">Limitada</option>'+
    '<option value="Responsabilidad Civil">Responsabilidad civil</option>'+
    '</select>'+
    '</div>'+
    '<div class="help-block col-xs-12 col-sm-reset inline"> '+
    '</div>'+
    '</div>');


$("#formpoliza").append('<div id="divCoberturas"></div>');


     $( "#form-field-select-1" ).change( function(valor_select ){
        $("#divCoberturas").html('');
                   
                     var singleValues = $( "#form-field-select-1" ).val();
                     //console.log(singleValues);

                     if(singleValues=='Tipo'){

                           $("#divCoberturas").html('');
                     }//END IF
else{



  if(singleValues=='Amplia'){

    var TiposCoberturas = [
campo2 = {"valor": "Daños materiales","tipo": "text", "placeholder": "Número de poliza","name":"dmateriales"},
campo2 = {"valor": "Robo total","tipo": "text", "placeholder": "Aseguradora","name":"robo"},
campo2 = {"valor": "Responsabilidad Civil por Daños a Terceros","tipo": "text", "placeholder": "Domicilio","name":"respciv"},
campo2 = {"valor": "Gastos Médicos Ocupantes","tipo": "text", "placeholder": "Domicilio","name":"gastmed"},
campo2 = {"valor": "Gastos Legales","tipo": "text", "placeholder": "Domicilio","name":"gastleg"},
campo2 = {"valor": "Asistencia Vial","tipo": "text", "placeholder": "Domicilio","name":"asistv"},
campo2 = {"valor": "Muerte del Conductor por Accidente Automovilístico","tipo": "text", "placeholder": "Domicilio","name":"muerte"},
]

}//END IF
  
if(singleValues=='Limitada'){

     var TiposCoberturas = [
campo2 = {"valor": "Robo total","tipo": "text", "placeholder": "Aseguradora","name":"robo"},
campo2 = {"valor": "Responsabilidad Civil por Daños a Terceros","tipo": "text", "placeholder": "Domicilio","name":"respciv"},
campo2 = {"valor": "Gastos Médicos Ocupantes","tipo": "text", "placeholder": "Domicilio","name":"gastmed"},
campo2 = {"valor": "Gastos Legales","tipo": "text", "placeholder": "Domicilio","name":"gastleg"},
campo2 = {"valor": "Asistencia Vial","tipo": "text", "placeholder": "Domicilio","name":"asistv"},
campo2 = {"valor": "Muerte del Conductor por Accidente Automovilístico","tipo": "text", "placeholder": "Domicilio","name":"muerte"},
]

}//END IF


if(singleValues=='Responsabilidad Civil'){

 var TiposCoberturas = [
campo2 = {"valor": "Responsabilidad Civil por Daños a Terceros","tipo": "text", "placeholder": "Domicilio","name":"respciv"},
campo2 = {"valor": "Gastos Médicos Ocupantes","tipo": "text", "placeholder": "Domicilio","name":"gastmed"},
campo2 = {"valor": "Gastos Legales","tipo": "text", "placeholder": "Domicilio","name":"gastleg"},
campo2 = {"valor": "Asistencia Vial","tipo": "text", "placeholder": "Domicilio","name":"asistv"},
campo2 = {"valor": "Muerte del Conductor por Accidente Automovilístico","tipo": "text", "placeholder": "Domicilio","name":"muerte"},
]

}//END IF
  $("#divCoberturas").append( '<br><label><b>Cobertura '+singleValues+'</b></label><br>');
  $("#divCoberturas").append('<div class="form-group row">'+
          '<div class="col-md-3">'+
            '<label for="ex1">COBERTURAS CONTRATADAS</label>'+
          '</div>'+
          '<div class="col-md-3">'+
            '<label for="ex2">SUMA ASEGURADA</label>'+
          '</div>'+
          '<div class="col-md-3">'+
            '<label for="ex3">DEDUCIBLE</label>'+
          '</div>'+
           '<div class="col-md-3">'+
            '<label for="ex3">PRIMAS</label>'+
          '</div>'+
        '</div>');



TiposCoberturas.forEach(function(campo, index) {

$("#divCoberturas").append('<div id="CoberturaDi" class="form-group row">'+
                '<div class="col-md-3">'+
                '<input class="form-control" id="cobertura" name="'+campo.name+'" title="'+campo.valor+'" readonly type="text" value="'+campo.valor+'">'+
                '</div>'+
                '<div class="col-md-3">'+
                '<input class="form-control" id="suma" name="'+campo.name+'" type="text" value="">'+
                '</div>'+
                '<div class="col-md-3">'+
                '<input class="form-control" id="deducible" name="'+campo.name+'" type="text" value="">'+
                '</div>'+
                '<div class="col-md-3">'+
                '<input class="form-control" id="Primas" name="'+campo.name+'" type="text" value="">'+
                '</div>'+
                '</div>');



});//END FOREACH


var camposCalculos = [
    campo1 = {"nombre": "Prima","tipo": "text", "placeholder": "Prima Neta","ids":"prima","narray":"fcalculos"},
    campo2 = {"nombre": "Financiamiento","tipo": "text", "placeholder": "Gastos de Financiamiento","ids":"financiamiento","narray":"fcalculos"},
    campo2 = {"nombre": "Expedición","tipo": "text", "placeholder": "Descripción Gastos por Expedición","ids":"expedicion","narray":"fcalculos"},
    campo2 = {"nombre": "Subtotal","tipo": "text", "placeholder": "Subtotal","ids":"subtotal","narray":"fcalculos"},
    campo2 = {"nombre": "IVA","tipo": "text", "placeholder": "IVA","ids":"iva","narray":"fcalculos"},
    campo2 = {"nombre": "Importe","tipo": "text", "placeholder": "Importe Total","ids":"Importe","narray":"fcalculos"},
    campo2 = {"nombre": "Tarifa","tipo": "text", "placeholder": "Tarifa Aplicada","ids":"Tarifa","narray":"fcalculos"},
    campo2 = {"nombre": "Fecha","tipo": "text", "placeholder": "Fecha de Creación","ids":"Fecha","narray":"fcalculos"},
]


$("#divCoberturas").append('<div id="divCalculos"></div>');
var creaDivCal="";
espacios =1;
espaciosF =1;

creaDivCal+='<div class="space-4"></div>';
creaDivCal+='<h3 class="header smaller lighter green"></h3>';

camposCalculos.forEach(function(campo, index) {



if(espacios===1 || espacios===5){
  creaDivCal+='<div style="" class="form-group row has-info">';
}



    creaDivCal+='<div class="col-md-3"><label for="campo'+index+'" '+
    'class="col-xs-12 col-sm-1 '+
    'control-label no-padding-right"><b>'+ campo.nombre +'</b></label> '+
    '<div class="col-xs-12 col-sm-12"> '+
    '<span class="block input-icon input-icon-right"> '+
    '<input type="'+ campo.tipo+'" id="'+campo.ids+'" name="'+ campo.narray +'" placeholder="'+ campo.placeholder +'" class="width-100"> '+
    '<i class="ace-icon fa fa-check"></i> '+
    '</span> '+
    '</div> '+
    '<div class="help-block col-xs-12 col-sm-reset inline"> '+
    '</div> '+
    '</div> ';


    if(espaciosF===4 || espaciosF===8){
  creaDivCal+='</div>';
}


    espacios ++;
    espaciosF ++;

});//END forEach

$("#divCalculos").append(creaDivCal);

}//END ELSE

                });






   /* $("#formpoliza").append('</div><div class="form-group has-info"><label for="inputSuccess" '+
    'class="col-xs-12 col-sm-1 '+
    'control-label no-padding-right"><b>Correo</b></label> '+
    '<div class="col-xs-12 col-sm-4"> '+
    '<span class="block input-icon input-icon-right"> '+
    '<input type="text" id="inputSuccess" name="correo" placeholder="correo@ejemplo.com" class="width-100"> '+
    '<i class="ace-icon fa fa-check"></i> '+
    '</span> '+
    '</div> '+
    '<div class="help-block col-xs-12 col-sm-reset inline"> '+
    '</div> '+
    '</div>');*/

/*    $('#AddPoliza').text("Solo cliente");
    $("#AddPoliza").removeClass("btn-success");
    $("#AddPoliza").addClass(" btn-danger");
    $('#AddPoliza').attr("id","10128");*/
    $('#AddPoliza').hide("");
    $('#RestPoliza').show("");

  });//END CLICK
// ///////////////////// END LLAMAR FORMULARIO DE POLIZA MANUAL

  $("#RestPoliza").click(function(){

    $("#formpoliza").html('');
    $('#AddPoliza').show("");
    $('#RestPoliza').hide("");

/*    $('#AddPoliza').text("Agregar Poliza");
    $("#AddPoliza").addClass("btn-success");
    $("#AddPoliza").removeClass(" btn-danger");
    $('#AddPoliza').attr("id","AddPoliza");*/

  });//END CLICK
// ///////////////////// END CONTRAER FORMULARIO
});//END READY



</script>
