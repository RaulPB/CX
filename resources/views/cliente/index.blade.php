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
    swal("Cliente agregado correctamente!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif



    @if (Session::has('message'))
    swal("Se elimino el usuario", "", "info"
         //"{{Session::get('message')}}"
    );
    @endif

</script>


@section('content')

{!! Form::open(['route' => 'cliente.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('cliente', null, ['class' => 'form-control', 'placeholder' => 'Nombre del cliente']) !!} 
  </div> <!-- COLOCAMOS CLIENTE PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}

	<table class="table table-striped">
		<thead>
			<th>Nombre del cliente</th>
			<th>Datos de facturación</th>
			<th>Telefono</th>
			<th>E-mail</th>
			<th>Operaciones</th>
			</thead>
			@foreach($clientes as $cliente)
		<tbody>
			<td>{{$cliente -> cliente}}</td>
			<td>{{$cliente -> detalles}}</td>
			<td>{{$cliente -> telefono}}</td>
			<td>{{$cliente -> correo}}</td>
			<td>{!!link_to_route('cliente.edit', $title = 'Editar', $parameters = $cliente->id, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$clientes->render()!!}
	
	
@stop