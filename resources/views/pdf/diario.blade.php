<html lang="en">
      <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>Reporte de ventas diarias</title>

     </head>

      <body>
        <br><br>
            <div class="col-lg-12">
                <table class="col-lg-12">
              <thead>
                <tr>
                <th><img src="../public/cx.jpg" style="width:800%; max-width:150px;"></th>

                    <th class="col-lg-4" style="text-align: left"></th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center">.</th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center">Fecha: {{$hoy}}</th>
                </tr>

              </thead>
              <tbody>
                <tr>

                </tr>
              </tbody>
            </table>

            <div ALIGN=center>
                <FONT SIZE=0>
                <pre>Calle Oaxaca No. 72 int. 8 col. Progreso Macuiltépetl, Xalapa, Veracruz, Tel: (228) 200-4495</pre>
                 <pre>E-mail: consumiblesxalapa@gmail.com          www.facebook.com/CXGLOBAL/ </pre>
                 <pre></pre>
                 </FONT>
                </div>
            <div class="col-lg-10 col-md-10 col-sm-10"><br><br></div>
            <h4 class="">Reporte de ventas diarias </h4>
            <h4 class=""></h4>
            <div style="background-color: #3867b7; height: 16px"></div>
                  <br>
                  <div class="presupuestos">
                  <table  WIDTH="100%" class="display" style="text-align:center;"   border-collapse: separate;>
                        <thead >
                          <tr>
                              <th COLSPAN="2" ALIGN="center">Clave de servicio</th>
                              <th COLSPAN="30" ALIGN="center">Cliente</th>
                               <th COLSPAN="30" ALIGN="center">Fecha de venta</th>
                              <th COLSPAN="30" ALIGN="center">Detalles</th>
                              <th COLSPAN="40" ALIGN="center">Precio</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach($correo as $datos)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$datos->id}}</td>
                           <td colspan="30" style="text-align: center;">{{$datos->clientess->cliente}}</td>
                           <td colspan="30" style="text-align: center;">{{date('d-m-Y', strtotime($datos->fecha_recep))}}</td>
                           <td colspan="30" style="text-align: center;">{{$datos->detalle}}</td>
                           <td colspan="40" style="text-align: center;">$ {{number_format($datos->costo,2)}}</td>

                          </tr>
                      @endforeach


                      <tr><H3> Total: $ {{number_format($total1,2)}} </H3></tr>
                        </tbody>
                    </table>
                    <br><br>

                </div>

                 <div class="presupuestos">
                    <table  WIDTH="100%" class="display" style="text-align:center;"   border-collapse: separate;
  >
                        <thead >
                          <tr>
                              <th COLSPAN="2" ALIGN="center">Factura</th>
                              <th COLSPAN="30" ALIGN="center">Cliente</th>
                               <th COLSPAN="30" ALIGN="center">Fecha de venta</th>
                               <th COLSPAN="30" ALIGN="center">Estatus de venta</th>
                              <th COLSPAN="40" ALIGN="center">Total de la venta</th>


                          </tr>
                        </thead>
                        <tbody>
                      @foreach($correo2 as $datos2)
                          <tr>
                           <td colspan="2"  style="text-align: center;">{{$datos2->factura}}</td>
                           <td colspan="30" style="text-align: center;">{{$datos2->clientess->cliente}}</td>
                           <td colspan="30" style="text-align: justify;">{{date('d-m-Y', strtotime($datos2->fecha_venta))}}</td>
                           <td colspan="30" style="text-align: justify;">{{$datos2->status}}</td>
                           <td colspan="40" style="text-align: justify;">$ {{number_format($datos2->total_venta,2)}}</td>





                          </tr>
                      @endforeach


                      <tr><H3> Total: $ {{number_format($total2,2)}}  </H3></tr>
                        </tbody>
                    </table>
                    <br><br>
                     <H3> Total Global: {{number_format($totalfinal1,2)}}  </H3>
                </div>





</div>
      </body>
    </html>
