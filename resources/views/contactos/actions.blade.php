{!! Form::open(['route'=>['contacto.destroy',$con_id],'method'=>'DELETE','onsubmit'=>'return confirm("Estas seguro que deseas eliminar?")'])!!}
	    						
<label data-href="{{route('contacto.edit',$con_id)}}" class="act-edit btn btn-primary btn-sm"><i class="edit fa fa-edit text-white"></i></label>

<label data-href="{{route('contacto.show',$con_id)}}" class="act-view btn btn-success btn-sm"><i class="edit fa fa-eye text-white"></i></label>


<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash text-white"></i></button>

{!!Form::close()!!}