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
    swal("Envio/Recolección agregado correctamente!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

	@if (Session::has('Notify'))
    swal("Actualizacion correcta de Envio/Recolección!", "", "success"
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
			<th>Orden</th>
			<th>Cliente</th>
			<th>Chofer</th>
			<th>Status</th>
			<th>Fecha Compromiso</th>
			<th>Operaciones</th>
			</thead>
			@foreach($chofers as $chofer)
		<tbody>

		<?php  
			$hola=\Carbon\Carbon::now();
			$hola2=$chofer -> fecha_recep;
			$hola3=$chofer -> fecha_compromiso;
			$timestamp1 = strtotime($hola);
			$timestamp2 = strtotime($hola2);
			$timestamp3 = strtotime($hola3);
			$dif=$timestamp1-$timestamp2;//32000 segundo es equivalente a 5 dias
			$dif2=$timestamp3-$timestamp1;//en tiempo mayor o menor a 2 dias
			$dif3=$timestamp1-$timestamp3;//ordenes atrasadas-
		?>

			<td>{{$chofer -> id}}</td>
			<td>{{$chofer -> cliente -> cliente}}</td>
			<td>{{$chofer -> chofer -> name}}</td>
			

							<td>{{$chofer -> status}}</td>
		

			<td>{{$chofer -> fecha_compromiso}}</td>
			<td>{!!link_to_route('chofer.edit', $title = 'Visualizar detalles', $parameters = $chofer->id, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$chofers->render()!!}
	
	
@stop