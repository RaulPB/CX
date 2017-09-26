<?php

namespace NUMA;

use Illuminate\Database\Eloquent\Model;

class Serv extends Model
{
    protected $table = "servs";
    protected $fillable = ['tecnico_id','cliente_id','detalle','fecha_recep','fecha_compromiso','costo','status'];

    public function scopeId($query, $id){ //este es para listar el index en vistas de servicios //

      if(trim($id) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('id', $id);
        }else{
          $query->where('id', $id)->orWhere('status', '<>', 'Entregado al cliente')->get();  //esta es la consulta sin filtro que nos mostrara por default todos los servicios que estan o no reparados pero no entregados.
        }
    }

    public function scopeIds($query, $id){ //este es para listar el index en vistas de servicios //

      if(trim($id) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('id', $id);
        }else{
          $query->where('id', $id)->orWhere('status', 'Entregado al cliente')->get();  //esta es la consulta sin filtro que nos mostrara por default todos los servicios que estan o no reparados pero no entregados.
        }
    }

          public function status()
    {
        return $this->belongsTo('NUMA\Status');
    }

    public function clientess()
 {
     return $this->belongsTo('NUMA\Cliente', 'cliente_id');//le indico que el cliente_id es la llave con la que
     //biscar en la tabla de clientes
 }
}
