@extends('layouts.app')

@section('title','MANTENEDOR DE EMPRESAS')


@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-8">
    		<h4 class="text-center">EMPRESAS REGISTRADAS</h4>
    		<hr/>
    			

			<div class="row">
				<div class="col-lg-6">
					<a class="btn btn-primary" href="{{route('empresa.create')}}">CREAR</a>
				</div>
				<div class="col-lg-6">

				{!! Form::open(['route'=>'empresa.index','method'=>'GET'])!!}	
					<div class="input-group">
					<input type="text" name="filter" class="form-control" placeholder="Búsqueda Nombre" value="{{$filter}}"/>
					<div class="input-group-append">
					<button class="btn btn-primary" type="submit" id="button-addon2">BUSCAR</button>
					</div>
					</div>
				{!!Form::close()!!}
				</div>
			</div>

    		<table class="table table-hover table-sm bg-white mt-3">
    			<thead class="thead-dark">
    				<tr>
    			 		<th>{{strtoupper(__('labels.name'))}}</th>
    			 		<th>{{strtoupper(__('labels.address'))}}</th>
    			 		<th>{{strtoupper(__('labels.phone'))}}</th>
    			 		<th>{{strtoupper(__('labels.actions'))}}</th>
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($empresas as $item)
	    				<tr>
	    					<td>{{$item->emp_nombre}}</td>
	    					<td>{{$item->emp_direccion}}</td>
	    					<td>{{$item->emp_telefono}}</td>
	    					<td>
{!! Form::open(['route'=>['empresa.destroy',$item],'method'=>'DELETE','onsubmit'=>'return confirm("Estas seguro que deseas eliminar?")'])!!}
	    						
<a href="{{route('empresa.edit',$item)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit text-white"></i></a>

<a href="{{route('empresa.show',$item)}}" class="btn btn-success btn-sm"><i class="fa fa-eye text-white"></i></a>



<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash text-white"></i></button>

{!!Form::close()!!}


	    					</td>
	    				</tr>
					@empty
						<tr><td colspan="4">NO HAY EMPRESAS REGISTRADAS</td></tr>
					@endforelse
    			</tbody>
    		</table>
    		{{$empresas->appends(['filter'=>$filter])->render()}}
    	</div>
    </div>
</div>
@endsection
