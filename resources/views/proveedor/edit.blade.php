@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->
	{!!Form::model($proveedor,['route'=> ['proveedor.update',$proveedor->id],'method'=>'PUT'])!!}
	@include('proveedor.forms.usr') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
	{!!Form::close()!!}

@stop