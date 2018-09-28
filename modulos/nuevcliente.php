
<div id="mensajes"></div>
<div id="mensajemodal"></div>
<form class="form-horizontal" id="NuevoCliente" role="form">
	<h2>Nuevo Cliente</h2>
	<div class="form-group has-success">
	<label for="nombre" class="col-xs-12 col-sm-1 control-label no-padding-right">Nombre</label>

	<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
	<input type="text" id="nombre" name="nombre" placeholder="Nombre(s) del cliente" class="width-100" required>
	<i class="ace-icon fa fa-check-circle"></i>
	</span>
	</div>
	<div class="help-block col-xs-12 col-sm-reset inline"> 

 </div>
	</div>

	<!-- Nombre -->
		<div class="form-group has-success">
	<label for="apellidop" class="col-xs-12 col-sm-1 control-label no-padding-right">Apellido paterno</label>

	<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
	<input type="text" id="apellidop" name="apaterno" placeholder="Apellido Paterno" class="width-100" required>
	<i class="ace-icon fa fa-check-circle"></i>
	</span>
	</div>
	<div class="help-block col-xs-12 col-sm-reset inline"> 

 </div>
	</div>

	<!-- apaterno -->
		<div class="form-group has-success">
	<label for="apellidom" class="col-xs-12 col-sm-1 control-label no-padding-right">Apellido materno</label>

	<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
	<input type="text" id="apellidom" name="amaterno" placeholder="Apellido materno" class="width-100" required>
	<i class="ace-icon fa fa-check-circle"></i>
	</span>
	</div>
	<div class="help-block col-xs-12 col-sm-reset inline"> 

 </div>
	</div>

	<!-- amaterno -->
		<div class="form-group has-success">
	<label for="telefono" class="col-xs-12 col-sm-1 control-label no-padding-right">Teléfono</label>

	<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
	<input type="text" id="telefono" name="telefono" placeholder="Teléfono" class="width-100" required>
	<i class="ace-icon fa fa-check-circle"></i>
	</span>
	</div>
	<div class="help-block col-xs-12 col-sm-reset inline"> 

 </div>
	</div>

	<!-- Teléfono -->
	<div class="form-group has-success">
	<label for="celular" class="col-xs-12 col-sm-1 control-label no-padding-right">Celular</label>

	<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
	<input type="text" id="celular" name="celular" placeholder="Celular" class="width-100" required>
	<i class="ace-icon fa fa-check-circle"></i>
	</span>
	</div>
	<div class="help-block col-xs-12 col-sm-reset inline"> 
 </div>
	</div>

	<!-- Celular -->
		<div class="form-group has-success">
	<label for="correo" class="col-xs-12 col-sm-1 control-label no-padding-right">Correo</label>

	<div class="col-xs-12 col-sm-4">
	<span class="block input-icon input-icon-right">
	<input type="text" id="correo" name="correo" placeholder="correo@ejemplo.com" class="width-100" required>
	<i class="ace-icon fa fa-check-circle"></i>
	</span>
	</div>
	<div id="messemail" class="help-block col-xs-12 col-sm-reset inline"> 

</div>
	</div>
<!-- 	<select id="estadosr">
<option value=""></option>
</select> -->

	<div class="space-2"></div>
	<!-- Correo -->
<div id="formpoliza"></div>
		<div class="space-10"></div>
	<button id="btnenviar" value="WTNKbFlYSnVkV1YyYjJOc2FXVnVkR1U9" class="btn btn-info">
	<i class="ace-icon fa fa-user align-top bigger-125"></i>
		Crear cliente
	</button>

	<button id="AddPoliza" value="WTNKbFlYSndiMnhwZW1FPQ" class="btn btn-success">
	<i class="ace-icon fa fa-plus align-top bigger-125"></i>
	Agregar Poliza
	</button>

	<button id="RestPoliza" style="display: none" value="WTNKbFlYSndiMnhwZW1FPQ" class="btn btn-danger">
	<i class="ace-icon fa fa-plus align-top bigger-125"></i>
	 Ocultar Formulario
	</button>
	
	<span id="resultado"></span>
	</form>