<?php

namespace CX;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = "detalle_venta";
    protected $primaryKey='iddetalle_venta';
    public $timestamps = false;

    protected $fillable = ['idventa','idarticulo','cantidad','precio_pub'];


    //precio_pub es precio_venta
    //idarticulo es 'id', en inventario
}
