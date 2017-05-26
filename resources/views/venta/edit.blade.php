@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->
  

	{!!Form::model($venta,['route'=> ['venta.update',$venta->idventa],'method'=>'PUT'])!!}
	@include('venta.forms.usr2') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
    {!!Form::submit('Actualizar Status de Venta',['class'=>'btn btn-primary btn-lg btn-block'])!!}
   	{!!Form::close()!!}

    <a href="" data-target="#modal-delete-{{$venta->idventa}}" data-toggle="modal"><button class="btn btn-danger btn-lg btn-block">Anular</button></a>

      @include('venta.forms.modal')


@stop