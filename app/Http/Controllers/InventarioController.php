<?php

namespace CX\Http\Controllers;

use Illuminate\Http\Request;

use CX\Http\Requests;
use CX\Http\Controllers\Controller;

use CX\Proveedor;
use CX\Producto;
use CX\Inventario;
use Session;
use Redirect;
use DB;
use Illuminate\Routing\Route;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$prod = Inventario::paginate(10);
         $prod = Inventario::id($request->get('producto'))->paginate(10);
        return view('inventario.index', compact('prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $prov = Proveedor::lists('proveedor', 'id');
         $rec["SI"]="SI";
         $rec["NO"]="NO";
         $status["Activo"]="Activo";
         $status["Baja"]="Baja";

         $porcentaje["15"]="15";
         $porcentaje["20"]="20";
         $porcentaje["25"]="25";
         $porcentaje["30"]="30";
         $porcentaje["35"]="35";
         $porcentaje["40"]="40";
         $porcentaje["45"]="45";
         $porcentaje["50"]="50";

         return view('inventario.create',compact('prov','rec','porcentaje','status'));//variables a las que asigne campos reales de la base de datos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $codigo = $request->input("codigo");
      $prod  = Inventario::where('codigo',$codigo)->get()->first();



      if($prod <> NULL){
        $user = $prod->id;
        Session::flash('notify','El producto ya existe!!');
        return Redirect::to('/producto');
        //return ("El producto ya existe, tiene el id: ".$user);
      }else{
        Inventario::create([
            'proveedor_id'=>$request['proveedor_id'],
            'producto'=>$request['producto'],
            'stock'=>$request['stock'],
            'precio_prov'=>$request['precio_prov'],
            'porcentaje'=>$request['porcentaje'],
            'precio_pub'=>$request['precio_pub'],
            'recuerdame'=>$request['recuerdame'],
            'status'=>$request['status'],
            'codigo'=>$request['codigo'],
        ]);
        Session::flash('msg','');
       return Redirect::to('/producto');
      }


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
         $prod = Inventario::find($id);

         $prov = Proveedor::lists('proveedor', 'id');
         $rec["SI"]="SI";
         $rec["NO"]="NO";
         $status["Activo"]="Activo";
         $status["Baja"]="Baja";
         $porcentaje["15"]="15";
         $porcentaje["20"]="20";
         $porcentaje["25"]="25";
         $porcentaje["30"]="30";
         $porcentaje["35"]="35";
         $porcentaje["40"]="40";
         $porcentaje["45"]="45";
         $porcentaje["50"]="50";
        return view('inventario.edit',['prod'=>$prod],compact('prov','porcentaje','rec','status'));
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
       $canti = DB::table('inventarios')->where('id', '=', $id)->pluck('stock');//stock original
       $cantidad2 = $request->input("stock"); //RECUPERAMOS LA NUEVA CANTIDAD QUE INGRESAMOS EN EL FORMULARIO
       $codigo = $request->input("codigo");//esta sección es para validar que el codigo de barras no este dado 
        $codigo2 = DB::table('inventarios')->where('id', '=', $id)->pluck('codigo');
        $preciori = DB::table('inventarios')->where('id', '=', $id)->pluck('precio_prov');;
        $precio_prov = $request->input("precio_prov");//RECUPERAMOS EL PRECIO DEL CAMPO DE TEXTO
        
        if($codigo2 == $codigo && $preciori == $precio_prov && $cantidad2 == $canti){ //preguntamos si el codigo de barras existe y si el stock sigue siendo igual o cambio para pasar a la otra evaluación
        //$user = $prod->id;
          Session::flash('notify','El producto ya existe!!');
          return Redirect::to('/producto');
        }else{

        if($cantidad2 < $canti){//preguntamos si el inventario es menor a lo que ya existe
            Session::flash('notify','No se puede reducir el inventario desde este modulo');
            // return($canti);
            return Redirect::to('/producto');
        }else{

        $prod = Inventario::find($id);
        $prod->fill($request->all());
        $prod->save();
        Session::flash('Notify','Producto Actualizado Correctamente !!!!');
        return Redirect::to('/producto');
        }
      }
      return ($codigo);
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
