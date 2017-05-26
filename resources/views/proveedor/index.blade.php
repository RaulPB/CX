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
    swal("Proveedor agregado correctamente!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

	@if (Session::has('Notify'))
    swal("Actualizacion correcta de proveedor!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

    @if (Session::has('message'))
    swal("Se elimino el proveedor", "", "info"
         //"{{Session::get('message')}}"
    );
    @endif

</script>


@section('content')
	<table class="table table-striped">
		<thead>
			<th>Nombre del proveedor</th>
			<th>Contacto</th>
			<th>Telefono</th>
			<th>E-mail</th>
			</thead>
			@foreach($proveedors as $proveedor)
		<tbody>
			<td>{{$proveedor -> proveedor}}</td>
			<td>{{$proveedor -> detalles}}</td>
			<td>{{$proveedor -> telefono}}</td>
			<td>{{$proveedor -> correo}}</td>
			<td>{!!link_to_route('proveedor.edit', $title = 'Editar', $parameters = $proveedor->id, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$proveedors->render()!!}
	
	
@stop