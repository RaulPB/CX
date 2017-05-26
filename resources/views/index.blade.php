@extends('layouts.principal')
	@section('content')
	@include('alerts.errors') <!-- ANOTAMOS EL ERROR Y LO PODEMOS MOSTRAR EN LA VISTA-->
	@include('alerts.request')<!-- ANOTAMOS EL ERROR Y LO PODEMOS MOSTRAR EN LA VISTA para el logueo-->
				<div class="header">
			<div class="top-header">
				<div class="logo">
					<a href="index.html"></a>
				</div>
			</div>
			<div >
				{!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
					<div class="form-group">
						{!!Form::label('correo','Correo:')!!}	
						{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu correo'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('contrasena','Contraseña:')!!}	
						{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}
					</div>
					{!!Form::submit('Iniciar',['class'=>'btn btn-primary'])!!}
				
		
		</div>
		
	@endsection	