	<div class="form-group">
		{!!Form::label('nombre','Proveedor:')!!}
		{!!Form::text('proveedor',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del proveedor'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('datos','Nombre de contacto:')!!}
		{!!Form::text('detalles',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del contacto'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('datos','Detallles de proveedor:')!!}
		{!!Form::text('ubicacion',null,['class'=>'form-control','placeholder'=>'Ingresa detalle del proveedor'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('mail','Correo electronico:')!!}
		{!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingresa e-mail del proveedor'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('tel','Telefono:')!!}
		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingresa telefono del proveedor'])!!}
	</div>