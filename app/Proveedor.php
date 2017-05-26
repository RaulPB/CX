<?php

namespace CX;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "proveedors";
  	protected $fillable = ['proveedor','ubicacion','detalles','correo','telefono'];
}

            /*'proveedor'=>$request['proveedor'],//nombre del proveedor
            'detalles'=>$request['detalles'],//nombre de contacto
            'correo'=>$request['correo'],//
            'telefono'=>$request['telefono'],
            'ubicacion'=>$request['ubicacion'],//datos de de detalles del proveedor*/