<?php

namespace CX\Http\Controllers;

use Illuminate\Http\Request;

use CX\Http\Requests;
use CX\Http\Controllers\Controller;
use DB;
use CX\Cotizacion;
use CX\Cliente;


class ImcotizaController extends Controller
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
        $cotizacion = Cotizacion::find($id); //encontramos el registro
        $fecha1 = \Carbon\Carbon::now();//$cotizacion->created_at;
        $fecha = $fecha1->format('Y-m-d');
        $atenciona = $cotizacion->atenciona;
        $cliente = $cotizacion->cliente_id; //sacamos el id desde la vista de cotizacion
        $cliente2 = Cliente::find($cliente);
        $nombrec = $cliente2->cliente;
        $total2= $cotizacion->total_cotizacion;

        /////

        //setlocale(LC_MONETARY,"es_MX");
        $total = $total2;//money_format("$ %i", $total2);

        ////

        $detalles = DB::table('detalle_cotizacion as d')
        ->join('inventarios as a','d.idarticulo','=','a.id')
        ->select('a.producto as articulo','a.id as idarticulo','d.cantidad','d.precio')
        ->where('d.idcotizacion','=', $id)
        ->get();

        $view =  \View::make('cotizacion.invoice', compact('id','detalles','atenciona','fecha','nombrec','total'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download("Cotización ".$id." $atenciona");
        //return($detalles);

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
