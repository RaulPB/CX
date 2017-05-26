@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif


@section('content')

{!! Form::open(['route' => 'servicio.show', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
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
			
			<td>{{$servicio -> status}}</td>
			


			<td>{{$servicio -> fecha_recep}}</td>
			<td>{{$servicio -> fecha_compromiso}}</td>
			<td>{!!link_to_route('servicio.edit', $title = 'Editar', $parameters = $servicio->id, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$servicios->render()!!}
	
	
@stop