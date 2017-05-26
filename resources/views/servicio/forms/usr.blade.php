	<div class="form-group col-md-6">
		{!!Form::label('fechaingreso','Fecha de recepción:')!!}
		{!!Form::date('fecha_recep', \Carbon\Carbon::now())!!}

	</div>

	<div class="form-group col-md-4">
		{!!Form::label('fechaingreso','Fecha de entrega:')!!}
		{!!Form::date('fecha_compromiso', \Carbon\Carbon::now())!!}

	</div>


	<div class="form-group">
		{!!Form::label('Nombre cliente','nombre del Cliente:')!!}
		{!!Form::select('cliente_id',$clientes)!!}
	</div>

	<div class="form-group">
		{!!Form::label('detalle','Detalles de orden:')!!}
		{!!Form::textarea('detalle',null,['class'=>'form-control','placeholder'=>'Ingresa el detalle de la reparación'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('costos','Costo de orden:')!!}
		{!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'Ingresa el costo de la reparación'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('Nombre tecnico','nombre del Tecnico:')!!}
		{!!Form::select('tecnico_id',$tecnico)!!}
	</div>


	<div class="form-group">
		{!!Form::label('Status','Status:')!!}
		{!!Form::select('status_id',$status)!!}
	</div>
