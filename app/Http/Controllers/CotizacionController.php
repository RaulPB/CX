<?php

namespace NUMA\Http\Controllers;

use Illuminate\Http\Request;

use NUMA\Http\Requests;
use NUMA\Http\Controllers\Controller;
use Session;
use Redirect;

use NUMA\Cotizacion;
use NUMA\DetalleCotizacion;
use NUMA\Cliente;
use NUMA\User;
use DB;

use Carbon\Carbon;
use Response;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct(){

        }

    public function index(Request $request) //Listamos las cotizaciones
    {
      $ventas = Cotizacion::id($request->get('idcotizacion'))->paginate(10);
      return view('cotizacion.index',compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = DB::table('clientes')->get(); //sacamos y mandamos todos los datos de los clientes
        //$articulos = DB::table('inventarios')->where('stock', '>', 0)->get();
        $articulos = DB::table('inventarios')->where('stock', '>', 0)->Where('status','=',"Activo")->get();
        $porcentaje["0"]="0";
        $porcentaje["5"]="5";
        $porcentaje["10"]="10";
        $porcentaje["15"]="15";
        $porcentaje["20"]="20";

        return view('cotizacion.create',["clientes" => $clientes,"articulos" => $articulos,"porcentaje" => $porcentaje]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            DB::beginTransaction();
            $venta = new Cotizacion;
            $venta->realizo=$request->get('realizo');
            $venta->cliente_id=$request->get('idcliente');
            $venta->created_at=$request->get('fecha_venta');
            $venta->fecha_vigencia=$request->get('fecha_vigencia');
        
          
        
            $venta->total_cotizacion=$request->get('total_venta');
            $venta->atenciona=$request->get('atenciona');
            $venta->save();
            //+++++++++++++INICIAMOS CAPTURA DE VARIABLES ARREGLO[] PARA DETALLEDE VENTA//++++++++++++++++++
            $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $precio_pub = $request->get('precio_venta');

            $cont = 0;

            while ( $cont < count($idarticulo) ) {
                $detalle = new DetalleCotizacion();
                $detalle->idcotizacion=$venta->idcotizacion; //le asignamos el id de la venta a la que pertenece el detalle
                $detalle->idarticulo=$idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio=$precio_pub[$cont];
                $detalle->save();
                $cont = $cont+1;

            }
                DB::commit();
            Session::flash('msg','');
           return Redirect::to('/cotizacion');
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
        $idventa = $id;  //MANDAMOS EL ID DE LA COTIZACION
        $venta = Cotizacion::find($idventa);
        $clientes = DB::table('clientes')->lists('cliente', 'id');
        $articulos = DB::table('inventarios')->where('stock', '>', 0)->get();

        $detalles = DB::table('detalle_cotizacion as d')
        ->join('inventarios as a','d.idarticulo','=','a.id')
        ->select('a.producto as articulo','d.cantidad','d.precio')
        ->where('d.idcotizacion','=', $id)
        ->get();


        return view('cotizacion.edit',["clientes" => $clientes,"articulos" => $articulos, "status" => $status, "venta" => $venta, "articulos" => $articulos, "detalles" => $detalles, "venta" => $venta]);

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


        $cotiza = Cotizacion::find($id);
        //$venta->fill($request->all());
        //$venta->actualizada= \Carbon\Carbon::now();
        $cotiza->cliente_id=$request->get('cliente_id');  //recupero el cliente que se cambio para actualizarlo
        $cotiza->save();




            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Session::flash('notify','Revisión completa');
        return Redirect::to('/cotizacion');
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
        $venta=Venta::findOrFail($id);
        $venta->status='Cancelado';
        $venta-update();
        return Redirect::to('/venta');
        //  NOS VA A FALTAR HACER UNA FUNCIONA PARA CAMBIAR EL STATUS EN DETALLE DE VENTA Y BUSCAR LOS PRODUCTOS Y LAS CANTIDADES A REGRESAR AL INVENTARIO.
    }
}
