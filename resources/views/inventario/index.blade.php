<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
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
			<th>Imagen</th>
			<th>Fecha actualización</th>
			<th>Stock</th>
			<th>Precio Proveedor</th>
			<th>Precio Publico</th>
			<th>Editar Inventario</th>
			</thead>
			@foreach($prod as $prods)

  @include('venta.forms.modai')
			<tbody>
			<td>{{$prods -> id}}</td>
			<td>{{$prods -> producto}}</td>
			<td><a class="btn btn-primary LANZA" data-toggle="modal" data-id="{{$prods->path}}">Ver imagen</a></td>
			<td>{{$prods -> updated_at}}</td>
			<td>{{$prods -> stock}}</td>
			<td>{{$prods -> precio_prov}}</td>
			<td>{{$prods -> precio_pub}}</td>
			<td>{!!link_to_route('producto.edit', $title = 'Edición', $parameters = $prods->id, $attributes = ['class'=>'btn btn-warning
 btn-md btn-block'])!!}</td>
		</tbody>


		<script>
		$(document).ready(function(){
			$(".LANZA").click(function(){ // clic sobre el boton LANZA
				var x = $(this).data('id') //recuperamos el valor data-id del boton LANZA, que es el nombre de la imagen
			//	$("#cafeId").val($(this).data('id'));
				imagen = document.getElementById("hola");//ubicamos la etiqueta de imagen a la que le cambiaremos src
				imagen.src = "archivos/"+x;//concatenamos la carpeta de imagenes junto al nombre de la imagen a mostrar, que recuperamos
				//desde el boton LAZAN en su atributo data-id="{{$prods->path}}"
				$('#createFormId').modal('show'); //lanzamos nuestra ventaba modal con la imagen modificada
			});
		});
		</script>

			@endforeach
	</table>
{!!$prod->render()!!}




@stop
