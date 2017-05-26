	<div class="form-group col-md-6">
		{!!Form::label('fechaingreso','Fecha de solicitud:')!!}
		{!!Form::date('fecha_recep', \Carbon\Carbon::now())!!}
	</div>

	<div class="form-group col-md-6">
		{!!Form::label('fechaingreso','Fecha de entrega:')!!}
		{!!Form::date('fecha_compromiso', \Carbon\Carbon::now())!!}
	</div>

	<div class="form-group col-md-4">
		{!!Form::label('NombreC','Cliente:')!!}
		{!!Form::select('cliente_id',$clientes)!!}
	</div>

	<div class="form-group col-md-4">
		{!!Form::label('NombreC1','Chofer:')!!}
		{!!Form::select('chofer_id',$x)!!}
	</div>

	<div class="form-group col-md-4">
		{!!Form::label('statuys','Status:')!!}
		{!!Form::select('status',$status)!!}
	</div>

	<div class="form-group"">
	{!!Form::label('detal','Detalles:')!!}
		{!!Form::textarea('detalle',null,['class'=>'form-control','placeholder'=>'','id'=>'editor1'])!!}
	</div>
	