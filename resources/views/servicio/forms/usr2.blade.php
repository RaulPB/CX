	<div class="form-group col-md-6">
		{!!Form::label('fechaingreso','Fecha de recepción:')!!}
		{!!Form::text('fecha_recep',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}

	</div>

	<div class="form-group col-md-4">
		{!!Form::label('fechaingreso','Fecha de entrega:')!!}
		{!!Form::text('fecha_compromiso',null,['class'=>'form-control','placeholder'=>''])!!}

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
		{!!Form::label('Statuses','Status:')!!}
		{!!Form::select('status',$status)!!}
	</div>
