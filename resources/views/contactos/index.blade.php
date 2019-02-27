@extends('layouts.app')
@section('title','Catalogo de Contactos')


@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8">
    		<h4 class="text-center">EMPRESAS REGISTRADAS</h4>
    		<hr/>
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
		document.addEventListener("DOMContentLoaded",function(){
			$.fn.dataTableExt.sErrMode="throw";
			$("#tbDataTable").DataTable({
					"processing":true,
					"serverSide":true,
					"deferRender":true,
					"destroy":true,
					"ajax":"/contacto",
					"columns":[
						{data:"prv_nombre" , name:"P.prv_nombre"},
						{data:"nombres"},
						{data:"con_departamento", name:"C.con_departamento"},
						{data:"con_email",name:"C.con_email"},
						{data:"con_telefono",name:"C.con_telefono"},
						{data:"actions","searchable":false}
					],
					"initComplete":function(settings,json){
						loadEventsDataTables();
					}
			});

			
		});

		function loadEventsDataTables(){
			$("label.act-edit").on('click',function(){
				$.get($(this).attr('data-href'), function( data ) {
  						$( "#modalFormBody" ).html( data );
  						$("#modalForm").modal();
						$("#modalFormTitle").html('EDICION DE CONTACTOS');
				});
				
			});
		}
	
	</script>
@endpush

@section('cssCustom')
	<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"  rel="stylesheet"/>
@endsection