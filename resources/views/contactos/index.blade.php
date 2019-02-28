@extends('layouts.app')
@section('title','Catalogo de Contactos')


@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
    		<h4 class="text-center">CONTACTOS REGISTRADOS</h4>
    		<hr/>
    		<button class="btn btn-primary act-add" type="button" data-action="{{route('contacto.create')}}">AGREGAR</button>
    		<table class="table table-hover table-sm bg-white mt-3" id="tbDataTable">
    			<thead class="thead-dark">
    				<tr>
    			 		<th>Proveedor</th>
    			 		<th>Nombres</th>
    			 		<th>Departamento</th>
    			 		<th>Email</th>
    			 		<th>Telefono</th>
    			 		<th>Acciones</th>
    				</tr>
    			</thead>
    		</table>
    	</div>
    </div>
</div>


<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalFormBody">
        ...
      </div>
      
    </div>
  </div>
</div>

@endsection


@push('jsCustom')
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" defer></script>

	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript" charset="utf-8" defer></script>

	<script>
		var tableData;
		document.addEventListener("DOMContentLoaded",function(){
			$.fn.dataTableExt.sErrMode="throw";
			tableData=$("#tbDataTable").DataTable({
					"processing":true,
					"serverSide":true,
					"deferRender":true,
					"destroy":true,
					"ajax":"/contacto",
					"columns":[
						{data:"prv_nombre" , name:"P.prv_nombre"},
						{data:"nombres"},
						{data:"con_departamento", name:"con_departamento"},
						{data:"con_email",name:"con_email"},
						{data:"con_telefono",name:"con_telefono"},
						{data:"actions","searchable":false}
					],
					"initComplete":function(settings,json){
						loadEventsDataTables();
					}
			});
			$("button.act-add").on('click',function(){
				$.get($(this).attr('data-action'), function( data ) {
  						$("#modalFormBody" ).html( data );
  						$("#modalForm").modal();
						$("#modalFormTitle").html('CREACION DE CONTACTOS');
				});
				
			});
			
		});

		function loadEventsDataTables(){
			$("label.act-edit").on('click',function(){
				$.get($(this).attr('data-href'), function( data ) {
  						$("#modalFormBody" ).html( data );
  						$("#modalForm").modal();
						$("#modalFormTitle").html('EDICION DE CONTACTOS');
				});
				
			});
			$("label.act-view").on('click',function(){
				$.get($(this).attr('data-href'), function( data ) {
  						$("#modalFormBody" ).html( data );
  						$("#modalForm").modal();
						$("#modalFormTitle").html('VISOR DE CONTACTOS');
				});
				
			});


		}

		function send(_this,_method){



			var formData={
				'prv_id':$("#prv_id").val(),
				'con_nombre':$("#con_nombre").val(),
				'con_apellido':$("#con_apellido").val(),
				'con_cargo':$("#con_cargo").val(),
				'con_departamento':$("#con_departamento").val(),
				'con_email':$("#con_email").val(),	
				'con_telefono':$("#con_telefono").val(),	
				'con_extension':$("#con_extension").val(),
				'_method':_method
			};
			
			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
				}
			});

			$.ajax({
				url: $(_this).attr('action'),
				type: 'POST',
				dataType: 'json',
				data: formData,
			})
			.done(function() {
				tableData.ajax.reload();
				$("button.btn-cerrar").click();
				alert('Proceso Ejecutado correctamente');

			})
			.fail(function(xhr,status) {
				if(xhr.status==422){
					let errors=xhr.responseJSON;
					$.each(errors.errors,function(key, value){
							$("#"+key).attr('style','border: 1px solid #fc5050;');
							$("#field_"+key).append('<div class="invalid-feedback" style="display:block!important">'+
								value[0]
								+'</div>');
					});
				}
			})
			.always(function() {
				console.log("complete");
			});
			

			return false;
		}
	
	</script>
@endpush

@section('cssCustom')
	<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"  rel="stylesheet"/>
@endsection