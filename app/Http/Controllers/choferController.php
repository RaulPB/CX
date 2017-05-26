<?php

namespace CX\Http\Controllers;

use Illuminate\Http\Request;

use CX\Http\Requests;
use CX\Http\Controllers\Controller;

use CX\User;
use CX\Chofer;
use CX\Cliente;
use Session;
use Redirect;
use Illuminate\Routing\Route; 

class choferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$chofers = Chofer::paginate(10);
        $chofers = Chofer::where('status', 'Solicitado')->paginate(10);
        return view('chofer.index', compact('chofers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::lists('cliente', 'id'); 
        $x = User::where('perfil_id', 'Chofer')->lists('name', 'id');
        $status["Solicitado"]="Solicitado";
        $status["Entregado"]="Entregado";
        return view('chofer.create',compact('clientes','x','status'));//variables a las que asigne campos reales de la base de datos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chofer::create([
            'fecha_recep'=>$request['fecha_recep'],
            'fecha_compromiso'=>$request['fecha_compromiso'],
            'cliente_id'=>$request['cliente_id'],
            'chofer_id'=>$request['chofer_id'],
            'status'=>$request['status'],
            'detalle'=>$request['detalle'],
        ]);
        //return redirect('/chofer')->with('message','Diligencia creada correctamente');
        Session::flash('msg','');
        return Redirect::to('/chofer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$chofers = Chofer::where('status', 'Entregado')->paginate(10);
        $chofers = Chofer::where('status', 'Solicitado')->paginate(10);
        return view('chofer.index', compact('chofers'));
        //return view('chofer.index2', compact('chofers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $clientes = Cliente::lists('cliente', 'id'); 
       /* $chofers = User::where('perfil_id', 'Chofer')->lists('name', 'id');
        $status["Solicitado"]="Solicitado";
        $status["Entregado"]="Entregado";
        $chofer = Chofer::find($id);

        return view('chofer.edit',['chofer'=>$chofer],compact('status','clientes','chofers'));*/



        $clientes = Cliente::lists('cliente', 'id'); 
        $x = User::where('perfil_id', 'Chofer')->lists('name', 'id');
        $status["Solicitado"]="Solicitado";
        $status["Entregado"]="Entregado";
        $chofer = Chofer::find($id);

        return view('chofer.edit',compact('chofer','clientes','x','status'));//variables a las que asigne campos reales de la base de datos
    
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
        $chofer = Chofer::find($id);
        $chofer->fill($request->all());//metodo para rellenar campos especificados en los modelos   
        $chofer->save();
        //Session::flash('message','Diligencia actualizado correctamente');
        //return Redirect::to('/chofer');
        Session::flash('Notify','');
        return Redirect::to('/chofer');
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
