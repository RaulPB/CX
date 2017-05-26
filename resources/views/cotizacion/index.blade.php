@extends('layouts.admin')

@if(Session::has('Notify'))
<div>
</div>
@endif

@if(Session::has('message'))
<div>
</div>
@endif

@if(Session::has('msg'))
<div>
</div>
@endif

<script src="js/sweetalert.min.js"></script>
<script>

	@if (Session::has('msg'))
    swal("Cotización registrada correctamente!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

	@if (Session::has('Notify'))
    swal("Actualizacion correcta!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

    @if (Session::has('message'))
    swal("Cotización actualizada correctamente!!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

</script>




@section('content')

{!! Form::open(['route' => 'cotizacion.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('idcotizacion', null, ['class' => 'form-control', 'placeholder' => 'No. cotización']) !!} 
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>

{!! Form::close() !!}
	<table class="table table-striped">
		<thead>
			<th>No. Cotización</th>
			<th>Cliente</th>
			<th>Fecha de creación</th>
			<th>Valida hasta</th>
			<th>Total</th>
			<th></th>
			<th></th>
			</thead>
			@foreach($ventas as $venta)
		<tbody> 
			<td>{{$venta -> idcotizacion}}</td>
			<td>{{$venta->clientess->cliente}}</td>
			<td>{{date('d-m-Y', strtotime($venta -> created_at))}}</td>  
			<td>{{date('d-m-Y', strtotime($venta -> fecha_vigencia))}}</td>
			<td>{{$venta -> total_cotizacion}}</td>
			<td>{!!link_to_route('impcoti.edit', $title = 'Imprimir', $parameters = $venta->idcotizacion, $attributes = ['class'=>'btn btn-warning'])!!}</td>
			<td>{!!link_to_route('cotizacion.edit', $title = 'Detalles', $parameters = $venta->idcotizacion, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$ventas->render()!!}
	
	
@stop