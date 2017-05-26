<?php

namespace CX;

use Illuminate\Database\Eloquent\Model;
use CX\Cliente;

class Venta extends Model
{
    protected $table = "venta";
    protected $primaryKey='idventa';
    public $timestamps = false;

    protected $fillable = ['realizo','cliente_id','fecha_venta','fecha_limite','factura','status','total_venta'];
    protected $guarded = [];


    public function scopeId($query, $factura){ //este es para listar el index en vistas de servicios //

      if(trim($factura) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('factura','LIKE', "%$factura%");
        }else{
          $query->where('factura','LIKE', "%$factura%")->Where('status', '<>', 'Pagado')->Where('status', '<>', 'Cancelado')->orderBy('fecha_venta', 'asc')->get();  //esta es la consulta sin filtro que nos mostrara por default todos los servicios que estan o no reparados pero no entregados.  "%$producto%"

          //$ventas = Venta::orderBy('idventa', 'desc')->paginate(10);
        }
    }

       public function clientess()
    {
        return $this->belongsTo('CX\Cliente', 'cliente_id');//le indico que el cliente_id es la llave con la que
        //biscar en la tabla de clientes
    }

  /*public function clientess() //metodos definidos para mostrar datos relacionados de otras tablas segun el campo que se le especifique; en este case se esta llamando en index de vista usuarios.
     {
         return $this->hasOne('CX\Cliente');
     }*/


}
//el status puede ser: FACTURADO, PAGADO, CANCELADO
