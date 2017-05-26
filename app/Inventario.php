<?php

namespace CX;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = "inventarios";
   protected $fillable = ['producto','proveedor_id','precio_prov','precio_pub','porcentaje','stock','recuerdame','status','codigo'];



    public function scopeId($query, $producto){ //este es para listar el index en vistas de servicios //FALTA PAREMETRO PARA PASAR ID DE USUARIO

      if(trim($producto) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      //$query->where('categoria_id', $categoria_id);
        $query->where('producto','LIKE',"%$producto%");
        }
    }

   //los recuerdame son para indicar al sistema sobre que productos tiene que recordar a los usuarios
}
