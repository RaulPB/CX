<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <table>

  <tr>
    <td> <img src="http://nextstepwebs.com/images/logo.png" style="width:800%; max-width:80px;"></td>
    <td colspan="1"><FONT SIZE=2>Nombre del cliente: {{$nombrecliente}}</FONT></td>
    <td>Folio: {{$id}}</td>

  </tr>
  <tr>
    <td colspan="1"><FONT SIZE=2>Fecha de Recepción: </FONT><FONT SIZE=1> {{$fecharecepcion}}</FONT></td>
    <td colspan="2"><FONT SIZE=2>Fecha de Entrega:</FONT><FONT SIZE=1> {{$fechaentrega}}</FONT></td>
  </tr>

  <tr>
    <td><FONT SIZE=1>Marca: {{$marca}}</FONT></td>
    <td><FONT SIZE=1>Modelo: {{$modelo}}</FONT></td>
    <td><FONT SIZE=1>Tipo: {{$tipo}}</FONT></td>
  </tr>
  <tr>
    <td><FONT SIZE=1>N/S: {{$ns}}</FONT></td>
    <td><FONT SIZE=1>IMEI: {{$imei}}</FONT></td>
    <td><FONT SIZE=1>Color: {{$color}}</FONT></td>
  </tr>
 </table>

                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td colspan="2">Problema a reparar:
                                    <FONT SIZE=1> {{$problemacliente}}</FONT></td>
                                     <td colspan="2">Observaciones: <FONT SIZE=1> {{$diagnostico1}}</FONT></td>
                                </tr>
                             <tr>
                                  <td colspan="2"><strong>TOTAL: {{$costo}}</strong></td>
                                  <td colspan="2"><strong>Anticipo: {{$abonos}}</strong></td>
                                  <td colspan="2"><FONT SIZE=1>Le atendio: {{$receptor}}</FONT></td>
                                  <H6 align="center">Nombre y firma aceptando las condiciones</H6>
                                  <H6 align="center">________________________________________</H6>
                              </tr>
                            </thead>
                  <FONT SIZE=0>AVISO IMPORTANTE: El plazo para recoger su equipo es de 5 dias habiles a partir de la fecha de la entrega programada, transcurrido este tiempo,Ifiix podrá disponer de su equipo. Si el equipo no es recogido, inmediatamente se enviará a planta donde se destinara al "programa de reciclaje" sin previo aviso y sin que esto represente alguna obligación de nuestra parte con el cliente.*Acepto una vez que Ifiix abra mi equipo pierdo mi garantia de fabrica con la marca.*Pasados los 5 dias, usted puede recuperar su equipo cubbriendo los costos de envío y reenvío por un total de $800.00 extras a la reparaciópn segun sea su caso.*Pasados los 5 días Ifiix no se hace responsable de los equipos.* Se cobrará el 10% del monto total de la reparación por cancelación.*En NINGÚN caso Ifiix se hace responsable de la pérdida parcial o total de la información del equipo, ya que el respaldo de dicha información es responsabilidad del usuario.*En equipos mojados NO HAY GARANTIA; Los equipos quer hayan tenido contacto con algun liquido una vez ingresados aunque ingresen encendidos existe la posibilidad que se dañe a la hora de abrirse por lo tanto Ifiix no se hace responsable de esto.*los equipos doblados aunque ingresen encendidos existe la posibilidad que se dañe a la hora de abrirse por lo tanto Ifiix no se hace responsable de esto.La garantia solo aplica en la refacción reemplazada o utilizada. POLITICAS DE GARANTIA:*La garantia solo es valida por defectos de fabricas*La garantia no es valida cuando haya sufrido un golpe o enmendadura; Estado en contacto con cualquier tipo de liquido; Tenido corto circuito debido a cambio de voltaje; Sido abierto por una persona ajena a Ifiix</FONT>
                        </table>
                    </div>





<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>








<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>
