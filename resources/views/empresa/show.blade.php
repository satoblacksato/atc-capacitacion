@extends('layouts.app')
@section('title','VISOR DE EMPRESAS')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-6">
    		<h4 class="text-center">VISOR DE EMPRESAS</h4>
    		<hr/>
    				<div class="card">
				<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
										{!! Field::text('emp_nombre',$empresa->emp_nombre,['label'=>'Empresa:','required','placeholder'=>'Ingrese Nombre','readonly'=>true]) !!}
								</div>
								<div class="col-lg-6">
										{!! Field::email('emp_email',$empresa->emp_email,['label'=>'Correo Electrónico:','required','placeholder'=>'Ingrese Correo','readonly'=>true]) !!}
								</div>
							</div>
						    <div class="row">
								<div class="col-lg-6">
										{!! Field::text('emp_direccion',$empresa->emp_direccion,['label'=>'Dirección:','required','placeholder'=>'Ingrese Direccion','readonly'=>true]) !!}
								</div>
								<div class="col-lg-6">
										{!! Field::text('emp_telefono',$empresa->emp_telefono,['label'=>'Teléfono:','required','placeholder'=>'Ingrese Telefono','readonly'=>true]) !!}
								</div>
							</div>
				</div>
				<div class="card-footer">
					<a class="btn btn-danger" href="{{route('empresa.index')}}">REGRESAR</a>
		
				</div>
			</div>
		
    	</div>
    </div>
 </div>
@endsection