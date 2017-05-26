<?php

namespace CX;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table = "chofers";
  protected $fillable = ['chofer_id','detalle','fecha_recep','fecha_compromiso','status','cliente_id'];

  public function cliente()
    {
        return $this->belongsTo('CX\Cliente');
    }
    public function chofer()
    {
        return $this->belongsTo('CX\User');
    }
}
