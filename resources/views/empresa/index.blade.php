@extends('layouts.app')

@section('title','MANTENEDOR DE EMPRESAS')


@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-8">
    		<table class="table table-hover">
    			<thead class="thead-dark">
    				<tr>
    			 		<th>NOMBRE</th>
    			 		<th>DIRECCIÓN</th>
    			 		<th>TELEFONO</th>
    			 		<th>ACCIONES</th>
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($empresas as $item)
	    				<tr>
	    					<td>{{$item->emp_nombre}}</td>
	    					<td>{{$item->emp_direccion}}</td>
	    					<td>{{$item->emp_telefono}}</td>
	    					<td>
	    						
	    					</td>
	    				</tr>
					@empty
						<tr><td colspan="4">NO HAY EMPRESAS REGISTRADAS</td></tr>
					@endforelse
    			</tbody>
    		</table>
    		{{$empresas->render()}}
    	</div>
    </div>
</div>
@endsection
