 <html lang="en">
      <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>Reporte de ventas reales diarias</title>

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
                    <th style="text-align: center"></th>
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
            <h4 class="">Reporte de cuentas por cobrar cliente: {{$prod2}} </h4>
            <h4 class=""></h4>
            <div style="background-color: #3867b7; height: 16px"></div>
                  <br>
                 <div class="col-lg-20">
                 <table  WIDTH="100%" style="text-align:center;"   border-collapse: separate;>
                        <thead >
                          <tr>
                              <th colspan="2" ALIGN="justify">Factura</th>
                               <th colspan="80" ALIGN="justify">Fecha de venta</th>
                               <th colspan="30" ALIGN="justify">Estatus de venta</th>
                              <th colspan="30" ALIGN="justify">Total de la venta</th>

                          </tr>
                        </thead>
                        <tbody>
                      @foreach($correo as $datos2)
                          <tr>
                           <td colspan="2" style="text-align: justify;">{{$datos2->factura}}</td>
                           <td colspan="80" style="text-align: justify;">{{date('d-m-Y', strtotime($datos2->fecha_venta))}}</td>
                           <td colspan="30" style="text-align: left;">{{$datos2->status}}</td>
                           <td colspan="30" style="text-align: justify;">$ {{number_format($datos2->total_venta,2)}}</td>


                          </tr>
                      @endforeach


                      <tr><H3> </H3></tr>
                        </tbody>
                    </table>
                    <br><br>
                    <H3> Total Global: $ {{number_format($total1,2)}}  </H3>


                </div>

</div>
      </body>
    </html>
