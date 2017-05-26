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
    swal("Producto agregado correctamente a inventario!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

	@if (Session::has('Notify'))
    swal("Actualizacion correcta inventario!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

    @if (Session::has('notify'))
    swal("No se puede reducir inventario desde aqui!", "", "error"
         //"{{Session::get('message')}}"
    );
    @endif


</script>



@section('content')

{!! Form::open(['route' => 'producto.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('producto', null, ['class' => 'form-control', 'placeholder' => 'Nombre del producto']) !!}
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>

{!! Form::close() !!}
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Producto</th>
			<th>Stock</th>
			<th>Precio Proveedor</th>
			<th>Precio Publico</th>
			<th>Editar Inventario</th>
			</thead>
			@foreach($prod as $prods)
		<tbody>
			<td>{{$prods -> id}}</td>
			<td>{{$prods -> producto}}</td>
			<td>{{$prods -> stock}}</td>
			<td>{{$prods -> precio_prov}}</td>
			<td>{{$prods -> precio_pub}}</td>
			<td>{!!link_to_route('producto.edit', $title = 'Edición', $parameters = $prods->id, $attributes = ['class'=>'btn btn-warning
 btn-md btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$prod->render()!!}


@stop
