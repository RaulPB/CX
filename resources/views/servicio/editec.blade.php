@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->
	{!!Form::model($servicio,['route'=> ['tecnico.update',$servicio->id],'method'=>'PUT'])!!}
	@include('servicio.forms.usr3') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
	
@stop