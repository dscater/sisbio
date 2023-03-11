<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class UnidadArea extends Model
{
    protected $fillable =[
      'name','description',
    ];

    public function contrato(){
      return $this->hasMany('sisbio\Contratos','unidad_areas_id','id');
    }

    public function horario(){
      return $this->hasOne('sisbio\Horario','unidad_areas_id','id');
    }
}
