<?php

namespace NUMA\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use NUMA\Http\Requests;
use NUMA\Http\Controllers\Controller;
use NUMA\Servicio;
use NUMA\User;
use NUMA\Serv;



class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $hoy = \Carbon\Carbon::now();
      $hoy = $hoy->format('Y-m-d');

        $servicio = Serv::id($request->get('id'))->paginate(5);
        return view('servicio.indexserv',compact('servicio'));
      //$usuarios = Serv::paginate(10);
      //return view('pdf.index', compact('usuarios'));

    }

    public function encuesta(){
      $hoy = \Carbon\Carbon::now();
       $hoy = $hoy->format('Y-m-d');
       $correo = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',0)->count();
       $espectacular = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',1)->count();
       $publicacion = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',2)->count();
       $local = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',3)->count();
       $recomendacion = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',4)->count();
       $medallon = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',5)->count();
       $flechas = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',6)->count();
       $redes = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',7)->count();
       $web = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',8)->count();
       $google = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',9)->count();
       $otronegocio = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',10)->count();
       $otros = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',11)->count();


        
        $view =  \View::make('pdf.encuesta', compact('correo','espectacular','publicacion','local','recomendacion','
        medallon','flechas','redes','web','google','otronegocio','otros','medallon'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Encuesta'.'_'.$hoy);



    }

    public function invoice() //ventas diarias
    {
        //$user = DB::table('servs')->where('status_id', 10)->first();
       // $user= $user->costo;

       $hoy = \Carbon\Carbon::now();
       $hoy = $hoy->format('Y-m-d');


       //PAGOS EN EFECTIVO ANTICIPOS--------------------------------------------------------
       $pago1 = DB::table('servs')->where('status_id','<>', 10)->Where('status_id','<>', 11)->Where('tipopago1',1)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos1 = DB::table('servs')->where('status_id','<>', 10)->Where('status_id','<>', 11)->Where('tipopago2',1)->Where('fechapago2',$hoy)->sum('abono2');
       $efectivoA = $pago1 + $pagos1;

       //PAGOS EN TARJETA ANTICIPOS--------------------------------------------------------
       $pago2 = DB::table('servs')->where('status_id','<>', 10)->Where('status_id','<>', 11)->Where('tipopago1',2)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos2 = DB::table('servs')->where('status_id','<>', 10)->Where('status_id','<>', 11)->Where('tipopago2',2)->Where('fechapago2',$hoy)->sum('abono2');
       $tarejtaA = $pago2 + $pagos2;

      // -----------------------------------
       //PAGOS EN EFECTIVO CANCELADOS--------------------------------------------------------
       $pago5 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',1)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos5 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',1)->Where('fechapago2',$hoy)->sum('abono2');
       $efectivoC = $pago5 + $pagos5;

       //PAGOS EN TARJETA CANCELADOS--------------------------------------------------------
       $pago6 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',2)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos6 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',2)->Where('fechapago2',$hoy)->sum('abono2');
       $tarjetaC = $pago6 + $pagos6;

      // -----------------------------------
       //PAGOS EN EFECTIVO TERMINADOS--------------------------------------------------------
       $pago3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',1)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',1)->Where('fechapago2',$hoy)->sum('abono2');
       $efectivoT = $pago3 + $pagos3;

       //PAGOS EN TARJETA TERMINADOS--------------------------------------------------------
       $pago4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',2)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',2)->Where('fechapago2',$hoy)->sum('abono2');
       $tarjetaT = $pago4 + $pagos4;

       //UTILIDAD---COSTO VS COSTOAJUSTADO---------------------------
       $utilidad = DB::table('servs')->where('status_id','=', 10)->sum('costo');

       $utilidad2 = DB::table('servs')->where('status_id','=', 10)->sum('costoajustado');
       $uti = $utilidad - $utilidad2;
       //TOTALES
       $tarjeta = $tarejtaA + $tarjetaT + $tarjetaC;
       $efectivo = $efectivoA + $efectivoT + $efectivoC;

       //MANDAMOS A IMPRIMIR----------------------------------------------------------------
        $view =  \View::make('pdf.diario',
 compact('hoy','efectivoA','tarejtaA','efectivoT','tarjetaT','tarjeta','efectivo','uti','efectivoC','tarjetaC'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Reporte_Diario'.'_'.$hoy);
        //return redirect('/servicio')->with('message','Servicio guardado correctamente');
    }

    public function semana(){ //ventas semanales
      //Extraemos la fecha de hoy y le damos formato
      $hoy = \Carbon\Carbon::now();
      $hoy2 = \Carbon\Carbon::now();
      $endDate = $hoy2->subWeek();
      $endDate = $endDate->format('Y-m-d'); //1 semana atras
      $hoy = $hoy->format('Y-m-d');//el dia de hoy

       //PAGOS EN EFECTIVO CANCELADOS--------------------------------------------------------
       $pago1 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',1)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos1 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',1)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $efectivoC = $pago1 + $pagos1;

       //PAGOS EN TARJETA CANCELADOS--------------------------------------------------------
       $pago2 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',2)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos2 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',2)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $tarjetaC = $pago2 + $pagos2;

      // -----------------------------------
       //PAGOS EN EFECTIVO TERMINADOS--------------------------------------------------------
       $pago3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',1)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',1)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $efectivoT = $pago3 + $pagos3;

       //PAGOS EN TARJETA TERMINADOS--------------------------------------------------------
       $pago4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',2)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',2)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $tarjetaT = $pago4 + $pagos4;

      //UTILIDAD NETA DE LA semana
      $totale = $efectivoC + $efectivoT;
      $depitoe = $tarjetaT + $tarjetaC;


      //MANDAMOS A IMPRIMIR----------------------------------------------------------------
      $view =  \View::make('pdf.semana', compact('efectivoC','tarjetaC','efectivoT','tarjetaT','hoy','endDate','totale','depitoe'))->render();
       $pdf = \App::make('dompdf.wrapper');
       $pdf->loadHTML($view);
       return $pdf->stream('Reporte_Semanal'.'_'.$endDate.'_'.$hoy);

    }


    public function mes(){
      //Extraemos la fecha de hoy y le damos formato
      $hoy = \Carbon\Carbon::now();
      $hoy2 = \Carbon\Carbon::now();
      $endDate = $hoy2->subMonth();
      $endDate = $endDate->format('Y-m-d'); //1 semana atras
      $hoy = $hoy->format('Y-m-d');//el dia de hoy

       //PAGOS EN EFECTIVO CANCELADOS--------------------------------------------------------
       $pago1 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',1)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos1 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',1)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $efectivoC = $pago1 + $pagos1;

       //PAGOS EN TARJETA CANCELADOS--------------------------------------------------------
       $pago2 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',2)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos2 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',2)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $tarjetaC = $pago2 + $pagos2;

      // -----------------------------------
       //PAGOS EN EFECTIVO TERMINADOS--------------------------------------------------------
       $pago3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',1)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',1)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $efectivoT = $pago3 + $pagos3;

       //PAGOS EN TARJETA TERMINADOS--------------------------------------------------------
       $pago4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',2)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',2)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $tarjetaT = $pago4 + $pagos4;

      //UTILIDAD NETA DE LA semana
      $totale = $efectivoC + $efectivoT;
      $depitoe = $tarjetaT + $tarjetaC;


      //MANDAMOS A IMPRIMIR----------------------------------------------------------------
      $view =  \View::make('pdf.mes', compact('efectivoC','tarjetaC','efectivoT','tarjetaT','hoy','endDate','totale','depitoe'))->render();
       $pdf = \App::make('dompdf.wrapper');
       $pdf->loadHTML($view);
       return $pdf->stream('Reporte_Semanal'.'_'.$endDate.'_'.$hoy);

    }

    public function diaria()
    {
        $user = DB::table('servs')->where('status_id', 10)->first();
        $user= $user->id;
        //$data = $this->getData();
        //$date = date('Y-m-d');
        //$invoice = "2222";
        $view =  \View::make('pdf.diario', compact('user'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('diario');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
