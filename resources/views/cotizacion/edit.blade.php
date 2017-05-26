@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($venta,['route'=> ['cotizacion.update',$venta->idcotizacion],'method'=>'PUT'])!!}
	@include('cotizacion.forms.usr2') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('OK, regresar al listado',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
	


@stop