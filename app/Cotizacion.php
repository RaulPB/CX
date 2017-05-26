<?php

namespace CX;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = "cotizacion";
    protected $primaryKey='idcotizacion';
    public $timestamps = false;

    protected $fillable = ['realizo','cliente_id','atenciona','fecha_cotización','fecha_vigencia','total_cotizacion'];
    protected $guarded = [];
    //atencioina: a quien esta destinada la cotización.

   public function scopeId($query, $idcotizacion){ //este es para listar el index en vistas de servicios //

      if(trim($idcotizacion) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('idcotizacion','LIKE', "%$idcotizacion%");
        }else{
          $query->where('idcotizacion','LIKE', "%$idcotizacion%")->get();  //esta es la consulta sin filtro que nos mostrara por default todos los servicios que estan o no reparados pero no entregados.  "%$producto%"
        }
    }

      public function clientess()//NO OLVIDAR QUE ESTO LO MOSTRAMOS EN EL INDICE Y NOS PERMITE ALCANZAR UN DATO LEJANO CON SU IDº
    {
        return $this->belongsTo('CX\Cliente', 'cliente_id');//le indico que el cliente_id es la llave con la que
        //biscar en la tabla de clientes
    }
}
