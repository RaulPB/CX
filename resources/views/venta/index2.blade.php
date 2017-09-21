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
    swal("Venta registrada correctamente!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

	@if (Session::has('Notify'))
    swal("Actualizacion correcta!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

    @if (Session::has('message'))
    swal("Venta actualizada correctamente!!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

</script>




@section('content')

{!! Form::open(['route' => 'ventas.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('factura', null, ['class' => 'form-control', 'placeholder' => 'Buscar por factura']) !!}
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>

{!! Form::close() !!}
	<table class="table table-striped">
		<thead>
			<th>Factura</th>
			<th>Status</th>
			<th>Fecha de Pago</th>
			<th>Total de venta</th>
			</thead>
			@foreach($ventas as $venta)
		<tbody>

		<?php
			$hola=\Carbon\Carbon::now();
			$hola2=$venta -> created_at;
			$hola3=$venta -> fecha_limite;
			$timestamp1 = strtotime($hola);
			$timestamp2 = strtotime($hola2);
			$timestamp3 = strtotime($hola3);
			$dif=$timestamp1-$timestamp2;//32000 segundo es equivalente a 5 dias
			$dif2=$timestamp3-$timestamp1;//en tiempo mayor o menor a 2 dias
			$dif3=$timestamp1-$timestamp3;//ordenes atrasadas-
		?>
			<td>{{$venta -> factura}}</td>

			@if($venta->status <> 'Pagado' and  $dif2 > 172800 )<!-- Orden no entregada y con mas de 2 dias VERDE-->
							<td bgcolor="#229954">{{$venta -> status}}</td>
			@endif
			@if($venta->status <> 'Pagado' and  $dif3 > 0)<!-- Orden no entregada y RETRASADA ROJO-->
							<td bgcolor="#CB4335">{{$venta -> status}}</td>
			@endif
			@if($venta->status <> 'Pagado' and  $dif2 < 172800 and $dif2 > 1)<!-- Orden no entregada y en menos de 2 dias NARANJA-->
							<td bgcolor="#F1C40F">{{$venta -> status}}</td>
			@endif

			<td>{{$venta -> fecha_limite}}</td>
			<td>{{$venta -> total_venta}}</td>

		</tbody>
			@endforeach
	</table>
{!!$ventas->render()!!}


@stop
