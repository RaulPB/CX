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
    swal("Servicio agregado correctamente!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif



    @if (Session::has('message'))
    swal("Se elimino el usuario", "", "info"
         //"{{Session::get('message')}}"
    );
    @endif

		@if (Session::has('notify'))
		swal("El producto ya existe!!", "", "error"
				 //"{{Session::get('message')}}"
		);
		@endif

</script>

@section('content')

{!! Form::open(['route' => 'servicio.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Orden de servicio']) !!}
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}


	<table class="table table-striped">
		<thead>
			<th>Numero de orden</th>
			<th>Estatus</th>
			<th>Fecha de recepción</th>
			<th>Fecha compromiso</th>
			<th>Operaciones</th>
			</thead>
		@foreach($servicios as $servicio)
		<tbody>

		<?php
			$hola=\Carbon\Carbon::now();
			$hola2=$servicio -> fecha_recep;
			$hola3=$servicio -> fecha_compromiso;
			$timestamp1 = strtotime($hola);
			$timestamp2 = strtotime($hola2);
			$timestamp3 = strtotime($hola3);
			$dif=$timestamp1-$timestamp2;//32000 segundo es equivalente a 5 dias
			$dif2=$timestamp3-$timestamp1;//en tiempo mayor o menor a 2 dias
			$dif3=$timestamp1-$timestamp3;//ordenes atrasadas-
		?>

			<td>{{$servicio -> id}}</td>
			@if($servicio->status <> 'Entregado' and  $dif2 > 172800 )<!-- Orden no entregada y con mas de 2 dias VERDE-->
							<td bgcolor="#229954">{{$servicio -> status}}</td>
			@endif
			@if($servicio->status <> 'Entregado' and  $dif3 > 0)<!-- Orden no entregada y RETRASADA ROJO-->
							<td bgcolor="#CB4335">{{$servicio -> status}}</td>
			@endif
			@if($servicio->status <> 'Entregado' and  $dif2 < 172800 and $dif2 > 1)<!-- Orden no entregada y en menos de 2 dias NARANJA-->
							<td bgcolor="#F1C40F">{{$servicio -> status}}</td>
			@endif


			<td>{{$servicio -> fecha_recep}}</td>
			<td>{{$servicio -> fecha_compromiso}}</td>
			<td>{!!link_to_route('servicio.edit', $title = 'Editar', $parameters = $servicio->id, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$servicios->render()!!}


@stop
