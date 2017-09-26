<?php

namespace NUMA\Http\Controllers;

use Illuminate\Http\Request;

use NUMA\Http\Requests;
use NUMA\Http\Controllers\Controller;
use NUMA\Http\Requests\LoginRequest;//utilizado para la validacion de acceso
use NUMA\User;
use NUMA\Mensaje;
use NUMA\Inventario;
use DB;
use Redirect;
use Auth;//utilizado para la validacion de acceso
use Session;


class LogController extends Controller
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
    public function store(LoginRequest $request) //LoginRequest $request aqui tenemos que poner un request que valide el correcto funcionamiento de acceso al sistema.
    {
        if(Auth::attempt(['email'=> $request['email'],'password'=>$request['password']])){

            $roles = DB::table('inventarios')->where('recuerdame', '=', 'SI')->where('stock','<=', 5)->lists('id');
            $answerimplode = implode("; ", array_filter($roles));

            $hola=\Carbon\Carbon::now(); //fecha de hoy
            $timestamp1 = strtotime($hola); //conversion de la fecha de hoy


            $roles2 = DB::table('venta')->where('fecha_limite', '<=', $hola)->where('status','=','Facturado')->lists('factura');
            $answerimplode2 = implode("; ", array_filter($roles2));


            $roles3 = DB::table('servs')->where('fecha_compromiso', '<=', $hola)->where('status','=','En reparación')->lists('id');
            $answerimplode3 = implode("; ", array_filter($roles3));


            $roles4 = DB::table('chofers')->where('fecha_compromiso', '<=', $hola)->where('status','=','Solicitado')->lists('id');
            $answerimplode4 = implode("; ", array_filter($roles4));

          // Session::flash('notify',$answerimplode2);




      Session::flash('notify',"Los siguientes id's de productos estan por agotarse: ".$answerimplode.
                     " ;Existen facturas por vencer con numero: ".$answerimplode2." ;servicios pendientes id's: ".$answerimplode3." ;Envios pendientes con id's: ".$answerimplode4);

            return redirect('/admin');//->with('success', $x);
           // return ($answerimplode3);
        }
        Session::flash('message-error', 'Datos Incorrectos');
        return Redirect::to('/');


       /* $mensaje = Mensaje::where('id', '=', 1)->get()->first();
        $x=$mensaje ->mensaje;
        return redirect('/admin')->with('success', $x);*/
    }
        public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
