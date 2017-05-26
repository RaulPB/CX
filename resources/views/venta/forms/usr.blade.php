<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

  <div class="form-group col-md-6">
		{!!Form::label('fecha_ventas','Fecha de registro de la venta:')!!}
		{!!Form::date('fecha_venta', \Carbon\Carbon::now())!!}
	</div>

  <div class="form-group col-md-6">
		{!!Form::label('fecha_limites','Fecha limite de pago de la factura:')!!}
		{!!Form::date('fecha_limite', \Carbon\Carbon::now())!!}
	</div>

	<div class="form-group col-md-12">
		{!!Form::label('realizos','Genero la venta:')!!}
		{!!Form::text('realizo',Auth::user()->name,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>

	<div class="form-group col-md-12">
		<label for="clientes">Cliente</label>
		<select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
			@foreach($clientes as $cliente)
				<option value="{{$cliente->id}}"> {{$cliente->cliente}} </option>
			@endforeach
		</select>
	</div>


	<div class="form-group col-md-8">
		{!!Form::label('sts','Status de la venta:')!!}
		{!!Form::select('status',$status)!!}
	</div>

	<div class="form-group col-md-12">
	{!!Form::label('fac','No. de factura')!!}
		{!!Form::text('factura',null,['class'=>'form-control','placeholder'=>'','id'=>'editor1'])!!}
	</div>

	<div class="form-group col-md-12">
	{!!Form::label('tosu','Total Sugerido')!!}
		{!!Form::text('sugerido',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>

	<div class="form-group col-md-12">
	{!!Form::label('comen','Comentarios')!!}
		{!!Form::text('comentarios',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
