	<div class="row">
		<div class="col-lg-6">
		{!!Field::text('prv_id',$contacto->proveedor->prv_nombre,['label'=>'Proveedor'])!!}
	
		</div>
		<div class="col-lg-6">
			{!!Field::text('con_cargo',$contacto->con_cargo,['label'=>'Cargo'])!!}
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			{!!Field::text('con_nombre',$contacto->con_nombre,['label'=>'Nombres'])!!}
		</div>
		<div class="col-lg-6">
			{!!Field::text('con_apellido',$contacto->con_apellido,['label'=>'Apellidos'])!!}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			{!!Field::text('con_departamento',$contacto->con_departamento,['label'=>'Departamento'])!!}
		</div>
		<div class="col-lg-6">
			{!!Field::email('con_email',$contacto->con_email,['label'=>'Email'])!!}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			{!!Field::text('con_telefono',$contacto->con_telefono,['label'=>'Telefono'])!!}
		</div>
		<div class="col-lg-6">
			{!!Field::text('con_extension',$contacto->con_extension,['label'=>'Extension'])!!}
		</div>
	</div>

	<div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-cerrar" data-dismiss="modal">Cerrar</button>
      </div>
