<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>


  <div class="form-group col-md-6">
		{!!Form::label('fecha_ventas','Fecha de registro de la cotización:')!!}
		{!!Form::date('fecha_venta', \Carbon\Carbon::now())!!}
	</div>

  <div class="form-group col-md-6">
		{!!Form::label('fecha_limites','Fecha limite de cotización:')!!}
		{!!Form::date('fecha_vigencia', \Carbon\Carbon::now())!!}
	</div>

	<div class="form-group col-md-12">
		{!!Form::label('realizos','Genero la Cotización:')!!}
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


	<div class="form-group col-md-12">
	{!!Form::label('fac','Atención a:')!!}
		{!!Form::text('atenciona',null,['class'=>'form-control','placeholder'=>'','id'=>'editor1'])!!}
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
		<input type="number" readonly  name="pstock" id="pstock" class="form-control" placeholder="stock">
	</div>

	<div class="form-group col-md-2">
	<label for="precio_venta">Precio de venta</label>
		<input type="number"  name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="P. venta">
	</div>


	<div class="form-group">
		{!!Form::label('Porc','Porcentaje agregado:')!!}
		{!!Form::select('porcentaje',$porcentaje,null,['class'=>'form-control','id'=>'porce'])!!}
	</div>

	<div class="form-group col-md-10">
		<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
	</div>

	<div class="form-group col-md-12">

		<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
			<caption>Detalle de la venta</caption>
			<thead style="background-color:#A9D0F5">
				<tr>
					<th>Opciones</th>
					<th>Artículo</th>
					<th>Cantidad</th>
					<th>Precio de venta</th>
					<th>Subtotal</th>
				</tr>
			</thead>

			<tfoot>
				<th>TOTAL</th>
				<th></th>
				<th></th>
				<th></th>
				<th><h4 id="total"></h4><input name="total_venta" id="total_venta"></th>
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
			var total = 0;
            //total = $("#total_venta2").val();
			subtotal=[];
            subtotal2=[];
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
				precio_venta1 = $("#pprecio_venta").val(); //precio_venta esta apuntando a mi nuevo campo!!
				porcentaje = $("#porce").val();//porcentaje agregado de la cotizacion del producto
				porcentaje2 = precio_venta1 /100 * porcentaje //total del porcentaje a sumar

				precio_venta2 = parseFloat(precio_venta1) + parseFloat(porcentaje2); //porcentaje

				stock = $("#pstock").val();

				if (idarticulo!=" " && cantidad!="" && cantidad > 0 && precio_venta1!=""){
					x= stock - cantidad;
					//if (stock >= cantidad){
						if (x >= 0){
                        var redondeado = (cantidad * precio_venta2); //hago el calculo
                           
						precio_venta2 = Math.trunc(precio_venta2 * 1000) / 1000;
                        console.log("este es el precio de venta:"+precio_venta2);
                            
                        var vt = precio_venta2;
                            
                         console.log("este es el precio de venta ajustado:"+vt.toFixed(2));
                        precio_venta3 = vt.toFixed(2)
                            
                             console.log("este es el precio3 que se listara :"+precio_venta3);
                        console.debug("valor que se va sumando "+redondeado.toFixed(2));
                     
                       redondeado= redondeado.toFixed(2); //limito el calculo a 2 decimales
                       var truncated1 = Math.trunc(redondeado * 1000) / 1000; // = -5.46 //limito el calculo a 2 decimales de otra forma 
                            
                       subtotal[cont]= truncated1;//guardo el dato formateado en el arreglo
                        console.log("el dato subtotal segun formateado ya dentro del arreglo "+subtotal[cont]);
                   
						total=total+subtotal[cont];
                        
                            
						var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number"  name="cantidad[]" readonly value="'+cantidad+'"></td><td><input type="number"  name="precio_venta[]" readonly value="'+precio_venta3+'"></td><td>'+subtotal[cont]+'</td></tr>';
						cont++;
  
                        
                        var truncated = Math.trunc(total * 1000) / 1000; // = 1.00
                            
                           
                            var n = truncated.toFixed(2)
						console.debug("valor de n o TOTAL redondeado "+n);
                            $("#total_venta").val(n);
                            
						//evaluar();
						$("#detalles").append(fila);

						limpiar();
					}else{
						valor = stock - cantidad;
						console.log(valor);
						alert ('La cantidad a vender supera el stock');
					}
				 }else{
				 	alert("Error al ingresar detalle de la cotización, revise la cantidad del producto a vender");
				 }
			}

			function limpiar(){
				$("#pcantidad").val(0);
				$("#pstock").val(0);
				$("#pprecio_venta").val("");
			}

			function eliminar(index){
                
                 var truncated1 = Math.trunc(total * 1000) / 1000; // = -5.46
                 subtotal[index] = Math.trunc(subtotal[index] * 1000) / 1000;
                
                total=truncated1-subtotal[index]; //restamos con numeros formateados
				total=Math.trunc(total * 1000) / 1000; //el resultado lo formateamos
                
                 var t= total.toFixed(2);
				$("#total_venta").val(t);
				$("#fila" + index).remove();
				evaluar();
			}

			function evaluar(){
				if(total>0){
				}else{
					alert("la cotización esta vacia!!");
				}
			}

			</script>
