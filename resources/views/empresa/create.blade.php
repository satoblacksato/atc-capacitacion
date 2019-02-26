@extends('layouts.app')
@section('title','REGISTRO DE EMPRESAS')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-6">
    		<h4 class="text-center">REGISTRO DE EMPRESAS</h4>
    		<hr/>
    		
{!! Form::open(['route'=>'empresa.store']) !!}
			<div class="card">
				<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
										{!! Field::text('emp_nombre',null,['label'=>'Empresa:','required','placeholder'=>'Ingrese Nombre']) !!}
								</div>
								<div class="col-lg-6">
										{!! Field::email('emp_email',null,['label'=>'Correo Electrónico:','required','placeholder'=>'Ingrese Correo']) !!}
								</div>
							</div>
						    <div class="row">
								<div class="col-lg-6">
										{!! Field::text('emp_direccion',null,['label'=>'Dirección:','required','placeholder'=>__('labels.placeholder',['name'=>__('labels.address')])]) !!}
								</div>
								<div class="col-lg-6">
										{!! Field::text('emp_telefono',null,['label'=>'Teléfono:','required','placeholder'=>'Ingrese Telefono']) !!}
								</div>
							</div>
				</div>
				<div class="card-footer">
					<a class="btn btn-danger" href="{{route('empresa.index')}}">REGRESAR</a>
					<button class="btn btn-primary" type="submit">GUARDAR</button>
				</div>
			</div>
{!! Form::close() !!}			
    	</div>
    </div>
 </div>
@endsection