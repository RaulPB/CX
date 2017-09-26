<?php

namespace NUMA\Http\Controllers;

use Illuminate\Http\Request;

use NUMA\Http\Requests;
use NUMA\Http\Controllers\Controller;
use NUMA\Cliente;
use NUMA\Venta;
use DB;

class FiltraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::lists('cliente', 'id');
        return view('pdf.filtra',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = Cliente::lists('cliente', 'id');
        return view('pdf.filtra',compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = $request['cliente']; //Recuperamos el ID del cliente.
        $prod = Cliente::find($proveedor);//procesamos el id del cliente para sacar el nombre
        $prod2 = $prod->cliente; //recuperamos el nombre del cliente a utilizar para la busqueda
        $hoy = \Carbon\Carbon::now();
        $hoy = $hoy->format('Y-m-d');

//SELECT * FROM `venta` WHERE cliente_id=1 and status = 'Facturado' ORIGINALES
        $correo = DB::table('venta')->where('cliente_id','=',$proveedor)->Where('status','=','Facturado')->orderBy('fecha_venta', 'asc')->get();
        $total1 = DB::table('venta')->where('status','=','Facturado')->Where('cliente_id','=',$proveedor)->sum('total_venta');




        $view =  \View::make('pdf.real2', compact('correo','hoy','prod2','total1'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('Filtrado'.'_'.$hoy);
        //return ($correo);

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
