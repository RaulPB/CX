<?php

namespace NUMA;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inventario extends Model
{
    protected $table = "inventarios";
   protected $fillable = ['producto','proveedor_id','precio_prov','precio_pub','porcentaje','stock','recuerdame','status','codigo','path'];

   public function setPathAttribute($path){
     if(!empty($path)){
     	$this->attributes['path'] = Carbon::now()->second.$path->getClientOriginalName();
     	$name = Carbon::now()->second.$path->getClientOriginalName();
     	\Storage::disk('local')->put($name, \File::get($path));
      }
     }


    public function scopeId($query, $producto){ //este es para listar el index en vistas de servicios //FALTA PAREMETRO PARA PASAR ID DE USUARIO

      if(trim($producto) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      //$query->where('categoria_id', $categoria_id);
        $query->where('producto','LIKE',"%$producto%");
        }
    }

   //los recuerdame son para indicar al sistema sobre que productos tiene que recordar a los usuarios
}
