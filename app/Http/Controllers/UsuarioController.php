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


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('usuario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfiles["Administrador"]="Administrador";
        $perfiles["Recepcionista"]="Recepcionista";
        $perfiles["Tecnico"]="Tecnico";
        $perfiles["Chofer"]="Chofer";
        $perfiles["Baja"]="Baja";
        return view('usuario.create',compact('perfiles'));//variables a las que asigne campos reales de la base de datos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'perfil_id'=>$request['perfil_id'],
        ]);
        /*return redirect('/usuario')->with('message','Usuario creado correctamente'); //mandamos vista con mensaje que se */
        Session::flash('msg','');
        return Redirect::to('/usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::find($id);
            $perfiles["Administrador"]="Administrador";
            $perfiles["Recepcionista"]="Recepcionista";
            $perfiles["Tecnico"]="Tecnico";
            $perfiles["Chofer"]="Chofer";
            $perfiles["Baja"]="Baja";
         return view('usuario.edit',['user'=>$user],compact('perfiles'));
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
        $user = User::find($id);
        $user->fill($request->all());//metodo para rellenar campos especificados en los modelos   
        $user->save();
        /* Session::flash('message','Usuario actualizado correctamente');
        return Redirect::to('/usuario');*/
        Session::flash('Notify','');
        return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }
}
