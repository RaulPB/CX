@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif


@section('content')

{!! Form::open(['route' => 'producto.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('categoria', null, ['class' => 'form-control', 'placeholder' => 'Buscar por modelo']) !!}
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>

{!! Form::close() !!}
	<table class="table table-striped">
		<thead>
			<th>Tecnico</th>
			<th>Ordenes pendientes</th>
			<th>Ordenes retrasadas</th>

			</thead>
			@foreach($usuarios as $prods)
		<tbody>
			<td>{{$prods -> id}}</td>

		</tbody>
			@endforeach
	</table>
{!!$usuarios->render()!!}


@stop
