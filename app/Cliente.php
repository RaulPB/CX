<?php

namespace NUMA;

use Illuminate\Database\Eloquent\Model;
use NUMA\Venta;

class Cliente extends Model
{
    protected $table = "clientes";
  	protected $fillable = ['cliente','detalles','facturacion','correo','telefono'];

  	public function scopeId($query, $cliente){ //este es para listar el index en vistas de servicios //

      if(trim($cliente) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('cliente','LIKE', "%$cliente%");
        }
    }

public function ventas() //metodos definidos para mostrar datos relacionados de otras tablas segun el campo que se le especifique; en este case se esta llamando en index de vista usuarios.
    {
        return $this->hasOne('NUMA\Venta');
    }
    /*
    public function ventas()
        {
            return $this->belongsTo('NUMA\Venta');
        }*/
}
