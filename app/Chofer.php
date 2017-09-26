<?php

namespace NUMA;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table = "chofers";
  protected $fillable = ['chofer_id','detalle','fecha_recep','fecha_compromiso','status','cliente_id'];

  public function cliente()
    {
        return $this->belongsTo('NUMA\Cliente');
    }
    public function chofer()
    {
        return $this->belongsTo('NUMA\User');
    }
}
