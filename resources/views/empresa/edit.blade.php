@extends('layouts.app')
@section('title','EDICI&Oacute;N DE EMPRESAS')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-6">
    		<h4 class="text-center">EDICI&Oacute;N DE EMPRESAS</h4>
    		<hr/>
    		
{!! Form::open(['route'=>['empresa.update',$empresa],'method'=>'PUT']) !!}
			<div class="card">
				<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
										{!! Field::text('emp_nombre',$empresa->emp_nombre,['label'=>'Empresa:','required','placeholder'=>'Ingrese Nombre']) !!}
								</div>
								<div class="col-lg-6">
										{!! Field::email('emp_email',$empresa->emp_email,['label'=>'Correo Electrónico:','required','placeholder'=>'Ingrese Correo']) !!}
								</div>
							</div>
						    <div class="row">
								<div class="col-lg-6">
										{!! Field::text('emp_direccion',$empresa->emp_direccion,['label'=>'Dirección:','required','placeholder'=>'Ingrese Direccion']) !!}
								</div>
								<div class="col-lg-6">
										{!! Field::text('emp_telefono',$empresa->emp_telefono,['label'=>'Teléfono:','required','placeholder'=>'Ingrese Telefono']) !!}
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