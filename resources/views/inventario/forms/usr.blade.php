<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
$(document).ready(function(){

    	$("#editor1").blur(function(){
        var clicks = editor1.value//costo compra a proveedor
        var por = porce.value//porcentaje
        var total3 = clicks * por/100     //aqui va el porcentaje
        var total4 = clicks.value + total3.value

        var suma= (parseFloat(clicks)+ parseFloat(total3));
        //alert (suma)
        var suma2 = suma * 1.16;
        //var x = Math.round(suma2);
        var x = suma2.toFixed(2);
        $(editor2).val(x)

       //("#editor2").attr("value",1);

    });


        $("#porce").change(function(){
        var clicks = editor1.value//costo compra a proveedor
        var por = porce.value//porcentaje
        var total3 = clicks * por/100     //aqui va el porcentaje
        var total4 = clicks.value + total3.value

        var suma= (parseFloat(clicks)+ parseFloat(total3));
        //alert (suma)
       var suma2 = suma * 1.16;
       //var x = Math.round(suma2);
         var x = suma2.toFixed(2);
        $(editor2).val(x)
       //("#editor2").attr("value",1);

    });


});
</script>



	<div class="form-group col-md-4">
		{!!Form::label('Prov','Proveedor:')!!}
		{!!Form::select('proveedor_id',$prov)!!}
	</div>

	<div class="form-group col-md-12">
		{!!Form::label('pro','Producto:')!!}
		{!!Form::text('producto',null,['class'=>'form-control','placeholder'=>'Ingresa nombre de producto a guardar en inventario'])!!}
	</div>

  <div class="form-group col-md-12">
		{!!Form::label('codig','Codigo de barras:')!!}
		{!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Ingresa codigo de producto a guardar en inventario'])!!}
	</div>

  <div class="form-group col-md-12">
  {!!Form::label('archivo','Imagen:')!!}
  {!!Form::file('path')!!}
</div>

  <div class="form-group col-md-12">
    {!!Form::label('Porc','status del producto:')!!}
    {!!Form::select('status',$status,null,['class'=>'form-control','id'=>'status'])!!}
  </div>

	<div class="form-group col-md-12">
		{!!Form::label('cant','Stock:')!!}
		{!!Form::number('stock',null,['class'=>'form-control','placeholder'=>'Ingresa cantidad de producto a guardar en inventario'])!!}
	</div>

	<div class="form-group col-md-12">
		{!!Form::label('pre','Costo proveedor')!!}
		{!!Form::text('precio_prov',null,['class'=>'form-control','placeholder'=>'Ingresa costo de compra del producto','id'=>'editor1'])!!}
	</div>

	<div class="form-group col-md-12">
		{!!Form::label('Porc','Porcentaje de ganancia:')!!}
		{!!Form::select('porcentaje',$porcentaje,null,['class'=>'form-control','id'=>'porce'])!!}
	</div>

	<div class="form-group col-md-12">
		{!!Form::label('pre','Precio a publico (IVA Incluido):')!!}
		{!!Form::text('precio_pub',null,['class'=>'form-control','placeholder'=>'Ingresa costo de venta al publico','id'=>'editor2'])!!} <!--ESTE COSTO FINAL SERA CALCULADO SEGUN EL SELECT-->
	</div>

	<div class="form-group col-md-12">
		{!!Form::label('Provs','¿Recordar?:')!!}
		{!!Form::select('recuerdame',$rec)!!}
	</div>
