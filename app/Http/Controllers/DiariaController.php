<?php

namespace CX\Http\Controllers;

use Illuminate\Http\Request;

use CX\Http\Requests;
use CX\Http\Controllers\Controller;
use CX\Venta;
use DB;
use CX\Serv;

class DiariaController extends Controller//CONTROLADOR PARA SACAR LAS VENTAS FACTURADAS Y SRVICIOS REALIZADOS DIARIAMENTE.
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function diaria()
    {
        $hoy = \Carbon\Carbon::now();
        $hoy = $hoy->format('Y-m-d');
        $correo = Serv::where('fecha_recep','like', "%$hoy%")->Where('status','<>', 'Entregado al cliente')->get();
        $correo2 = Venta::where('fecha_venta','like', "%$hoy%")->Where('status', 'Facturado')->get();
        $total1 = DB::table('servs')->where('fecha_recep','like', "%$hoy%")->Where('status','<>', 'Entregado al cliente')->sum('costo');
        $total2 = DB::table('venta')->where('fecha_venta','like', "%$hoy%")->Where('status', 'Facturado')->sum('total_venta');
        $totalfinal1 = $total1 + $total2;
        $view =  \View::make('pdf.diario', compact('correo','correo2','hoy','total1','total2','totalfinal1'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
       return $pdf->download('Reporte_Diario'.'_'.$hoy);
       //return($correo2);
    }

         public function real()
    {
        $hoy = \Carbon\Carbon::now();
        $hoy = $hoy->format('Y-m-d');

  $correo = Serv::where('actualiza','like', "%$hoy%")->orwhere('status', 'Entregado al cliente')->get();
    //$correo = Serv::where('actualiza','like', "%$hoy%")->where('status','Entregado al cliente')->get();
    //select * from servs where `actualiza` LIKE '%2017-05-16%' AND `status` = 'Entregado al cliente';
    $correo2 = Venta::where('actualizada','like', "%$hoy%")->where('status', 'Pagado')->get(); //para fecha de pago

    $total1 = DB::table('servs')->where('actualiza','like', "%$hoy%")->where('status', 'Entregado al cliente')->sum('costo');
    $total2 = DB::table('venta')->where('actualizada','like', "%$hoy%")->where('status', 'Pagado')->sum('total_venta');

   $totalfinal2 = $total1 + $total2;

        $view =  \View::make('pdf.real', compact('correo','correo2','hoy','total1','total2','totalfinal2'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
      return $pdf->download("Venta Real".'_'.$hoy);
      //return ($correo);
    }

    public function cuentas()
    {
        $hoy = \Carbon\Carbon::now();
        $hoy = $hoy->format('Y-m-d');

    /*$correo = DB::table('servs')->where('status','<>', 'Entregado al cliente')->get();
    $correo2 = DB::table('venta')->where('status', 'Facturado')->get();*/

    $correo = Serv::where('status','<>', 'Entregado al cliente')->orderBy('fecha_recep', 'asc')->get();
    $correo2 = Venta::where('status', 'Facturado')->orderBy('fecha_venta', 'asc')->get();



    $total1 = DB::table('servs')->where('status','<>', 'Entregado al cliente')->sum('costo');
    $total2 = DB::table('venta')->where('status', 'Facturado')->sum('total_venta');

    $totalfinal1 = $total1 + $total2;


        $view =  \View::make('pdf.diario', compact('correo','correo2','hoy','total1','total2','totalfinal1'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //return $pdf->download('Reporte venta diaria'.'_'.$hoy.);
        return $pdf->download("Cuentas por cobrar".'_'.$hoy);


        //return ($correo);
    }

    public function create()
    {
        //
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
       /*$hoy = \Carbon\Carbon::now();
       $hoy = $hoy->format('Y-m-d');
       //PAGOS EN EFECTIVO ANTICIPOS--------------------------------------------------------
       $pago1 = DB::table('servs')->where('status_id','<>', 10)->Where('status_id','<>', 11)->Where('tipopago1',1)->Where('fechapago1',$hoy)->sum('abono1');*/


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
