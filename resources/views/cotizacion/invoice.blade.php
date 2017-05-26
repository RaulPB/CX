 <html lang="en">
      <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>Orden de Servicio</title>

     </head>

      <body>
        <br><br>
            <div class="col-lg-12">
                <table class="col-lg-12">
              <thead>
                <tr>
                <th><img src="https://scontent.fmex6-1.fna.fbcdn.net/v/t1.0-0/p206x206/16806738_782530301898192_1780875754587550707_n.jpg?oh=32afd5f00d4b275d6e40ace2df598773&oe=5927D1FA" style="width:800%; max-width:150px;"></th>

                    <th class="col-lg-4" style="text-align: left">No. de cotización: {{$id}}</th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center">.</th>
                    <th style="text-align: center"></th>
                    <th class="col-lg-4" style="text-align: right;">Fecha:{{$fecha}}</th>
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
            <h4 class="">C. {{$atenciona}}</h4>
            <h4 class="">{{$nombrec}}</h4>
            <div style="background-color: #3867b7; height: 16px"></div>
                  <br>
                  <div class="presupuestos">
                    <table WIDTH="100%" class="display" style="text-align:justify;"   border-collapse: separate;
  >
                        <thead >
                          <tr>
                              <th COLSPAN="2" ALIGN="justify">Clave</th>
                              <th COLSPAN="20" ALIGN="justify">Cantidad</th>
                              <th COLSPAN="30" ALIGN="justify">Concepto</th>
                              <th COLSPAN="40" ALIGN="justify">Precio Unitario</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach($detalles as $datos)
                          <tr>
                           <td colspan="2" style="text-align: justify;">{{$datos->idarticulo}}</td>
                           <td colspan="20" style="text-align: justify;">{{$datos->cantidad}}</td>
                           <td colspan="30" style="text-align: left;">{{$datos->articulo}}</td>
                           <td colspan="40" style="text-align: justify;">$ {{number_format($datos->precio,2)}}</td>

                          </tr>
                      @endforeach


                      <tr><H3> Total: $ {{number_format($total,2)}}</H3></tr>
                        </tbody>
                    </table>
                    <br><br>

                </div>

                <FONT SIZE=0>
                <sub>-Precios Incluyen IVA.</sub>
                <p><sub>-Brindaremos un credito de hasta 1 mes y medio. </sub></p>
                <p><sub>-PRECIOS VALIDOS POR DOS SEMANAS DESPUES DE SU FECHA DE COTIZACIÓN. </sub></p>
                <p><sub>-BANCO:                                    HSBC</PRE></sub></p>
                <p><sub>-NUMERO DE SUCURSALNOMBRE:                 3031 Las Ánimas</sub></p>
                <p><sub>-NOMBRE DEL BENEFICIARIO:                  Hugo Enrique Moreno Alcázar</sub></p>
                <p><sub>-RAZON SOCIAL:                             Hugo Enrique Moreno Alcázar</sub></p>
                <p><sub>-RFC:                                      MOAH800610728</sub></p>
                <p><sub>-Nº. DE REFERENCIA:                        4052237534</sub></p>
                <p><sub>-CLABE:                                    021840040522375344</sub></p>
                <p><sub>-NÚM. TELEFONICO BENEFICIARIO:             (228) 2-00-44-95; (228)2-98-40-48</sub></p>
                </FONT>



</div>
      </body>
    </html>
