@extends('layouts.admin')
	@section('content')

		<div class="contact-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p>Movie Theater</p>
				</div>

				<div class="clearfix"></div>
			</div>
			<!---contact-->

		 <h3 class="head">CONTACT</h3>
		 <p>WE'RE ALWAYS HERE TO HELP YOU</p>
		 <div class="contact-form">
			 {!!Form::open(['route'=>'mail.store','method'=>'POST'])!!}
				 <div class="col-md-6 contact-left">
				 {!!Form::text('name',null,['placeholder'=>'Nombre'])!!}
				 {!!Form::text('email',null,['placeholder'=>'Email'])!!}
				  </div>
				  <div class="col-md-6 contact-right">
					{!!Form::textarea('mensaje',null,['placeholder'=>'Mensaje'])!!}
				 </div>
				
				 	{!!Form::submit('SEND')!!}
				 	{!!Form::close()!!}
					

	     </div>
</div>
	@endsection	