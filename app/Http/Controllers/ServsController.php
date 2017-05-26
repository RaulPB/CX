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

class ServsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //dd($request->get('imei'));//PARA VALIDAR HASTA QUE PUNTO TODO VA FUNCIONANDO EN EL PASO DE DATOS
      $servicios = Serv::id($request->get('id'))->paginate(5);
      return view('servicio.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mandamos los clientes
        $status["En reparación"]="En reparación";
        $status["Reparado"]="Reparado";
        $status["Entregado al cliente"]="Entregado al cliente";
        $clientes = Cliente::lists('cliente', 'id');
        $tecnico = User::where('perfil_id', 'Tecnico')->lists('name', 'id'); //regresamos solo los tecnicos.
        return view('servicio.create',compact('status','clientes','tecnico'));//variables a las que asigne campos reales de la base de datos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Serv::create([
            'tecnico_id'=>$request['tecnico_id'],
            'cliente_id'=>$request['cliente_id'],
            'detalle'=>$request['detalle'],
            'fecha_recep'=>$request['fecha_recep'],
            'fecha_compromiso'=>$request['fecha_compromiso'],
            'costo'=>$request['costo'],
            'status'=>$request['status_id'],
        ]);
        //return redirect('/servicio')->with('message','Orden creada correctamente');
        Session::flash('msg','');
        return Redirect::to('/servicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $servicios = Serv::ids($request->get('id'))->paginate(5);
      return view('servicio.indext',compact('servicios'));
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
         return view('servicio.editserv',['servicio'=>$servicio],compact('status','clientes','tecnico'));
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
        $servicio->actualiza=\Carbon\Carbon::now();
        $servicio->save();
        //Session::flash('message','Servicio actualizado correctamente');
        //return Redirect::to('/servicio');

        Session::flash('Notify','');
        return Redirect::to('/servicio');
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
