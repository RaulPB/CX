<?php

namespace NUMA\Http\Controllers;

use Illuminate\Http\Request;

use NUMA\Http\Requests;
use NUMA\Http\Controllers\Controller;

use NUMA\Perfil;//IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use NUMA\Sucursal; //IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use NUMA\Proveedor;
use Session;
use Redirect;
use Illuminate\Routing\Route; 

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedors = Proveedor::paginate(30);
        return view('proveedor.index', compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Proveedor::create([
            'proveedor'=>$request['proveedor'],//nombre del proveedor
            'detalles'=>$request['detalles'],//nombre de contacto
            'correo'=>$request['correo'],//
            'telefono'=>$request['telefono'],
            'ubicacion'=>$request['ubicacion'],//datos de de detalles del proveedor
        ]);
       
        Session::flash('msg','');
        return Redirect::to('/proveedor');
       /* $x = $request['correo'];
        return ($x);*/
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
        $proveedor = Proveedor::find($id);

         return view('proveedor.edit',['proveedor'=>$proveedor]);
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
         $proveedor = Proveedor::find($id);
        $proveedor->fill($request->all());//metodo para rellenar campos especificados en los modelos   
        $proveedor->save();
        // Session::flash('message','Proveedor actualizado correctamente');
        //return Redirect::to('/proveedor');

        Session::flash('Notify','');
        return Redirect::to('/proveedor');
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
