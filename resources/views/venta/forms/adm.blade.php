	<div id="p1" class="form-group col-md-6" >
	{!!Form::label('fecha_ventas','Fecha de registro de la venta:')!!}
	{!!Form::text('created_at',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>	



	<div id="p1" class="form-group col-md-4" >
	{!!Form::label('fecha_limites','Fecha limite de pago de la factura:')!!}
	{!!Form::text('fecha_limite',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>	

	<div class="form-group col-md-12">
		{!!Form::label('realizos','Genero la venta:')!!}
		{!!Form::text('realizo',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>

<div class="form-group col-md-12">
	 <h4>Cliente: {{$clientes}}</h1>
</h4>
</div>


	<div class="form-group col-md-8">
		{!!Form::label('sts','Status de la venta:')!!}
		{!!Form::select('status',$status)!!}
	</div>

	<div class="form-group col-md-12">
	{!!Form::label('fac','No. de factura')!!}
		{!!Form::text('factura',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true','id'=>'editor1'])!!}
	</div>

	<div class="form-group col-md-6">
	<label>Articulos</label>
		<select name="pidarticulo" id="pidarticulo" class="form-control selectpicker" data-live-search="true">
			@foreach($articulos as $articulo)
				<option value="{{$articulo->id}}_{{$articulo->stock}}_{{$articulo->precio_pub}}"> {{$articulo->producto}} </option>
			@endforeach
		</select>		
	</div>

	<div class="form-group col-md-2">
	<label for="cantidad">Cantidad</label>
		<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">	
	</div>

	<div class="form-group col-md-2">
	<label for="stock">Stock</label>
		<input type="number"  name="pstock" id="pstock" class="form-control" placeholder="stock">	
	</div>

	<div class="form-group col-md-2">
	<label for="precio_venta">Precio de venta</label>
		<input type="number"  name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="P. venta">	
	</div>

	<div class="form-group col-md-10">
		<button type="button"  id="bt_add" class="btn btn-primary">Agregar</button>
	</div>

	<div class="form-group col-md-12">
		
		<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
			<caption>Detalle de la venta</caption>
			<thead style="background-color:#A9D0F5">
				<tr>
				<th>OPCIONES</th>
					<th>Artículo</th>
					<th>Cantidad</th>
					<th>Precio de venta</th>
					<th>Subtotal</th>
					
				</tr>
			</thead>

			<tfoot>
				

			</tfoot>

			<tbody>
				{{$x = 0}}
				
				@foreach($detalles as $det)
				<tr> 
				<TD></TD>
					<td>{{$det->articulo}}</td>
					<td>{{$det->cantidad}}</td>
					<td>{{$det->precio_pub}}</td>
					<td>{{$det->cantidad*$det->precio_pub}}</td>
					

					<td hidden>{{$x = $x + $det->cantidad*$det->precio_pub}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

			<div class="form-group col-md-12">
		
		<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
			<caption>Total de todas las partidas ingresadas</caption>
			<thead style="background-color:#A9D0F5">
				<tr>

					<th>TOTAL= <input name="total_venta2" id="total_venta2" value = '{{$x}}' readonly></th>
				</tr>
			</thead>

			<tfoot>

				<th><input name="total_venta" id="total_venta" type="hidden"></th>
							

			</tfoot>

			<tbody>
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>

	</div>

	<script> 
			$(document).ready(function(){
				$('#bt_add').click(function(){

				 agregar();
				});
			});

			var cont=0;
			total = 0;
			subtotal=[];
			$("#guardar").hide();
			$("#pidarticulo").change(mostrarValores);

			function mostrarValores(){
				datosArticulo=document.getElementById('pidarticulo').value.split('_');
				$("#pprecio_venta").val(datosArticulo[2]);
				$("#pstock").val(datosArticulo[1]);
			}

			function agregar(){
				datosArticulo=document.getElementById('pidarticulo').value.split('_');
				idarticulo = datosArticulo[0];
				articulo = $("#pidarticulo option:selected").text();
				cantidad = $("#pcantidad").val();
				precio_venta = $("#pprecio_venta").val();
				stock = $("#pstock").val();
				
				if (idarticulo!=" " && cantidad!="" && cantidad > 0 && precio_venta!=""){
					x= stock - cantidad;
					//if (stock >= cantidad){
						if (x >= 0){
						subtotal[cont]=(cantidad * precio_venta);
						total=total+subtotal[cont];
						var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]"  value="'+idarticulo+'">'+articulo+'</td><td><input type="number"  name="cantidad[]" value="'+cantidad+'"></td><td><input type="number"  name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal+'</td></tr>';
						cont++;
						
						$("#total").html("S/. " + total);

						$("#total_venta").val(total);

						tok = {{$x}}; //tomo el valor del campo a mandar el que guarda el total 

						sum = tok + total ; //lo sumo con el campo que se acaba de agregar segun el producto

						$("#total_venta2").val(sum);//mando el TOTAL correcto a la vista para el index

						//evaluar();
						$("#detalles").append(fila);
						
						limpiar();
					}else{
						valor = stock - cantidad;
						console.log(valor);
						alert ('La cantidad a vender supera el stock');
					}
				 }else{
				 	alert("Error al ingresar detalle de la venta, revise la cantidad del producto a vender");
				 }
			}


			function limpiar(){
				$("#pcantidad").val(0);
				$("#pstock").val(0);
				$("#pprecio_venta").val("");
			}

			function eliminar(index){
				total=total-subtotal[index];
				$("#total").html("S/. " + total);

				$("#total_venta").val(total);
				$("#fila" + index).remove();
				evaluar();
			}

			function evaluar(){
				if(total>0){
				}else{
					alert("la venta esta vacia!!");
				}
			}
			


			</script>


		



































	


