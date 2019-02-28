	{!!Form::open(['route'=>['contacto.store'],'
	method'=>'POST' ,'id'=>'frmData'])!!}
	<div class="row">
		<div class="col-lg-6">
			{!!Field::select('prv_id',$proveedores,null,['label'=>'Proveedor','empty'=>'- Seleccione proveedor -'])!!}
		</div>
		<div class="col-lg-6">
			{!!Field::text('con_cargo',null,['label'=>'Cargo'])!!}
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			{!!Field::text('con_nombre',null,['label'=>'Nombres'])!!}
		</div>
		<div class="col-lg-6">
			{!!Field::text('con_apellido',null,['label'=>'Apellidos'])!!}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			{!!Field::text('con_departamento',null,['label'=>'Departamento'])!!}
		</div>
		<div class="col-lg-6">
			{!!Field::email('con_email',null,['label'=>'Email'])!!}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			{!!Field::text('con_telefono',null,['label'=>'Telefono'])!!}
		</div>
		<div class="col-lg-6">
			{!!Field::text('con_extension',null,['label'=>'Extension'])!!}
		</div>
	</div>

	<div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-cerrar" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>

 {!!Form::close()!!}

 <script>
 	$("#frmData").submit(function(event) {
 		event.preventDefault();
 		send($("#frmData"),'POST');
 	});
 </script>