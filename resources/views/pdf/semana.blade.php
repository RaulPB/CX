<div class="container">
    <div class="row">
        <div class="col-xs-12">

  <table>

  <tr>
    <td colspan="1">Reporte de ventas Semanal</td>
    <td colspan="2">Fecha inicio: {{$endDate}} </td>
    <td colspan="2">Fecha fin: {{$hoy}} </td>
    <td colspan="2">Solicita: {!!Auth::user()->name!!}</td>

  </tr>
  <tr>
    <td colspan="1"><FONT SIZE=2>Efectivo (Servicios Finalizados) </FONT><FONT SIZE=1></FONT></td>
    <td colspan="2"><FONT SIZE=2>Depositos (Servicios Finalizados)</FONT><FONT SIZE=1></FONT></td>
    <td colspan="2"><FONT SIZE=2>Efectivo (Servicios Cancelados) </FONT><FONT SIZE=1></FONT></td>
    <td colspan="2"><FONT SIZE=2>Depositos (Servicios Cancelados)</FONT><FONT SIZE=1></FONT></td>

  </tr>

  <tr>
    <td colspan="1"><FONT SIZE=2>{{$efectivoT}}</FONT></td>
    <td colspan="2"><FONT SIZE=2>{{$tarjetaT}}</FONT></td>
    <td colspan="2"><FONT SIZE=2>{{$efectivoC}}</FONT></td>
    <td colspan="2"><FONT SIZE=2>{{$tarjetaC}}</FONT></td>

  </tr>

  <tr>
    <td colspan="1"><FONT SIZE=2>Total semanal de efectivo:$ </FONT><FONT SIZE=1>{{$totale}}</FONT></td>
    <td colspan="2"><FONT SIZE=2>Total semanal de depositos:$ </FONT><FONT SIZE=1>{{$depitoe}}</FONT></td>
  </tr>

    
 </table>








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
