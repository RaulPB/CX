<?php

namespace CX\Http\Controllers;

use Illuminate\Http\Request;

use CX\Http\Requests;
use CX\Http\Controllers\Controller;
use CX\Http\Requests\VentaFormRequest;
use Session;
use Redirect;

use CX\Venta;
use CX\DetalleVenta;
use CX\Cliente;
use CX\User;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct(){

        }

    public function index(Request $request)
    {
      $ventas = Venta::id($request->get('factura'))->paginate(10);
        //$ventas = DB:table('venta')->orderBy('created_at', 'desc')->paginate(10);
        //$ventas = Venta::orderBy('idventa', 'desc')->paginate(10);
      return view('venta.index',compact('ventas'));

        //$ondata = DB::table('official_news')->orderBy('created_date', 'desc')->paginate(7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$clientes = Cliente::lists('cliente', 'id');
        $clientes = DB::table('clientes')->get(); //sacamos y mandamos todos los datos de los clientes
        //$articulos = DB::table('inventarios')->where('stock', '>', 0)->get();
        $status["Facturado"]="Facturado";
        $status["Pagado"]="Pagado";
        $status["Cancelado"]="Cancelado";
        return view('venta.create',["clientes" => $clientes, "status" => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaFormRequest $request)
    {

           // DB::beginTransaction();
            $venta = new Venta;
            $venta->realizo=$request->get('realizo');
            $venta->cliente_id=$request->get('idcliente');//en propiedad cliente_id, recuperamos el campo 'cliente_id'
            //$venta->created_at=$request->get('fecha_venta');
            $venta->fecha_venta=$request->get('fecha_venta');
            $venta->fecha_limite=$request->get('fecha_limite');
            $venta->factura=$request->get('factura');
            $venta->total_venta= 0 ;//$request->get('total_venta');
            $venta->status=$request->get('status');
            $venta->sugerido=$request->get('sugerido');
            $venta->comentarios=$request->get('comentarios');
            $venta->actualizada= \Carbon\Carbon::now();
            $venta->save();

            //INICIAMOS CAPTURA DE VARIABLES ARREGLO[] PARA DETALLE DE VENTA++++++++++++++++++++++++
            /*$idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $precio_pub = $request->get('precio_venta');

            $cont = 0;

            while ( $cont < count($idarticulo) ) {
                $detalle = new DetalleVenta();
                $detalle->idventa=$venta->idventa; //le asignamos el id de la venta a la que pertenece el detalle
                $detalle->idarticulo=$idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio_pub=$precio_pub[$cont];
                $detalle->save();
                $cont = $cont+1;

            }
                DB::commit();*/
            Session::flash('msg','');
           return Redirect::to('/venta');
           // return($cantidad);
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

        $articulos = DB::table('inventarios')->where('stock', '>', 0)->get();
        $status["Facturado"]="Facturado";
        $status["Pagado"]="Pagado";
        $status["Cancelado"]="Cancelado";

        $idventa = $id;
        $venta = Venta::find($idventa);
       /* $client = $venta->cliente_id;//sacsmos el id del cliente desde la venta
        $name = DB::table('clientes')->where('id', $client )->get(); //buscamos al cliente con el id (todo el registro)
        $v = Cliente::find($client);
        $clientes = $v->cliente;*/

        $clientes = DB::table('clientes')->lists('cliente', 'id');


        //$detalles = DB::table('detalle_venta')->where('idventa', $id)->get();
        $articulos = DB::table('inventarios')->where('stock', '>', 0)->Where('status','=',"Activo")->get();

        $detalles = DB::table('detalle_venta as d')
        ->join('inventarios as a','d.idarticulo','=','a.id')
        ->select('a.producto as articulo','d.cantidad','d.precio_pub')
        ->where('d.idventa','=', $id)
        ->get();
        return view('venta.edit',["clientes" => $clientes,"articulos" => $articulos, "status" => $status, "venta" => $venta, "articulos" => $articulos, "detalles" => $detalles]);
        //return("llegue");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //Vamos a mandar a que solo la pueda cancelar, no se puede editar nada mas de la venta; solo visualizarla, entonces es necesario hacer que manualmente se ingrese todo aquello que se cancelo
    {

        //++++++++++++++++recuperamos el contenido del list para saber si es cancelacion y de ser asi regresar las cantidades a inventario++++++



        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $venta = Venta::find($id);
        $venta->fill($request->all());
        $venta->actualizada= \Carbon\Carbon::now();
        $venta->total_venta=$request->get('total_venta2');  //recupero el total de la venta
        $venta->save();

       // $producto = $request->get('det');

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

         $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $precio_pub = $request->get('precio_venta');
            //$precio_pub = number_format((decimal)$precio_pub1, 2, ',', '.');

            $cont = 0;

            while ( $cont < count($idarticulo) ) {
                $detalle = new DetalleVenta();
                $detalle->idventa=$venta->idventa; //le asignamos el id de la venta a la que pertenece el detalle
                $detalle->idarticulo=$idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio_pub=$precio_pub[$cont];
                $detalle->save();
                $cont = $cont+1;

            }



            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Session::flash('notify','Venta ACTUALIZADA correctamente!!');
        return Redirect::to('/venta');
           // return ($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $venta = Venta::find($id);
         Venta::destroy($id);
         DB::table('detalle_venta')->where('idventa', $id)->delete();

         Session::flash('notify','Venta ELIMINADA correctamente, reingrese los productos a inventario!!');
         return Redirect::to('/venta');
       //FALTA BUSCAR LOS PRODUCTOS DE VENTA Y ELIMINARLOS, DE SER POSIBLE REGRESARLOS AL INVENTARIO
    }
}
