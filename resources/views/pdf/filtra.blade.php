	@extends('layouts.admin')
	@section('content')

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::open(['route'=>'filtrada.store', 'method'=>'POST'])!!}

	<div class="form-group">
		{!!Form::label('selec','Seleccione el cliente:')!!}
		{!!Form::select('cliente',$cliente)!!}
	</div>

	{!!Form::submit('Descargar reporte del cliente seleccionado',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}

	@stop
