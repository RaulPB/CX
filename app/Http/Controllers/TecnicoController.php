<?php

namespace CX\Http\Controllers;

use Illuminate\Http\Request;

use CX\Http\Requests;
use CX\Http\Controllers\Controller;
use CX\Perfil;//IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use CX\Sucursal; //IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use CX\User;
use Session;
use Redirect;
use Illuminate\Routing\Route; 
use DB;
use CX\Cliente;
use CX\Serv;
//use Illuminate\Routing\Route; 
use Illuminate\Database\Query\Builder;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $servicios = Serv::id($request->get('id'))->paginate(5);
      return view('servicio.indextec',compact('servicios'));
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
         $servicio = Serv::find($id);
         $status["En reparación"]="En reparación";
         $status["Reparado"]="Reparado";
         $status["Entregado al cliente"]="Entregado al cliente";

         $clientes = Cliente::lists('cliente', 'id');
         $tecnico = User::where('perfil_id', 'Tecnico')->lists('name', 'id'); //regresamos solo los tecnicos.
         return view('servicio.editec',['servicio'=>$servicio],compact('status','clientes','tecnico'));
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
        $servicio = Serv::find($id);
        $servicio->fill($request->all());//metodo para rellenar campos especificados en los modelos   
        $servicio->save();
       /* Session::flash('message','Servicio actualizado correctamente');
        return Redirect::to('/tecnico');*/

        Session::flash('Notify','');
        return Redirect::to('/tecnico');
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
