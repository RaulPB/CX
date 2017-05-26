	<div class="form-group">
		{!!Form::label('nombre','Nombre del cliente:')!!}
		{!!Form::text('cliente',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del cliente'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('datos','RFC:')!!}
		{!!Form::text('detalles',null,['class'=>'form-control','placeholder'=>'Ingresa detalles del cliente'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('datos','Datos de cliente:')!!}
		{!!Form::text('facturacion',null,['class'=>'form-control','placeholder'=>'Ingresa detalles de facturación'])!!}
	</div>
		<div class="form-group">
		{!!Form::label('mail','E-mail de cliente:')!!}
		{!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingresa correo del cliente'])!!}
	</div>
		
	<div class="form-group">
		{!!Form::label('tel','Telefono de cliente:')!!}
		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingresa telefono del cliente'])!!}
	</div>