<div class="container">
    <div class="row">
        <div class="col-xs-12">

  <table>

  <tr>
    <td> <img src="" style="width:800%; max-width:80px;"></td>
    <td colspan="2"><FONT SIZE=3>Encuesta de publicidad</FONT></td>
    <td colspan="2">Fecha: {{\Carbon\Carbon::now()}}</td>
    <td colspan="7">Solicita: {!!Auth::user()->name!!}</td>

  </tr>
  <tr>
    <td ><FONT SIZE=1>Correo</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Espectacular</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Publicidad</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Visite el local</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Recomendación</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Medallón de autobus</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Flechas</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Redes Sociales</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Sitio web</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Google</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Otro negocio</FONT><FONT SIZE=1></FONT></td>
    <td ><FONT SIZE=1>Otros</FONT><FONT SIZE=1></FONT></td>

  </tr>

  <tr>
    <td ><FONT SIZE=1>{{$correo}}</FONT></td>
    <td ><FONT SIZE=1>{{$espectacular}}</FONT></td>
    <td ><FONT SIZE=1>{{$publicacion}}</FONT></td>
    <td ><FONT SIZE=1>{{$local}}</FONT></td>
    <td ><FONT SIZE=1>{{$recomendacion}}</FONT></td>
    <td ><FONT SIZE=1>{{$medallon}}</FONT></td>
    <td ><FONT SIZE=1>{{$flechas}}</FONT></td>
    <td ><FONT SIZE=1>{{$redes}}</FONT></td>
    <td ><FONT SIZE=1>{{$web}}</FONT></td>
    <td ><FONT SIZE=1>{{$google}}</FONT></td>
    <td ><FONT SIZE=1>{{$otronegocio}}</FONT></td>
    <td ><FONT SIZE=1>{{$otros}}</FONT></td>
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
