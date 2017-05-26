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
    swal("Usuario agregado correctamente!", "", "success"
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
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Perfil</th>
			<th>Operaciones</th>
			</thead>
			@foreach($users as $user)
		<tbody>
			<td>{{$user -> name}}</td>
			<td>{{$user -> perfil_id}}</td>
			<td>{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$users->render()!!}
	
	
@stop