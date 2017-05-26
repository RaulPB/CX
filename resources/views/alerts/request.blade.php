	@if(count($errors) > 0) <!--ESTO ES PARA VALIDAR ERRORES Y VER QUE CAMPOS FALTAN en formulario de usuarios-->
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
		  </button>
		  <ul>
		  	 @foreach($errors->all() as $error)
		  	 	<li>
		  	 		{!!$error!!}
		  	 	</li>
		  	 @endforeach
		  </ul>
		</div>
	@endif