<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
      'ingreso_maniana','salida_maniana',
      'ingreso_tarde','salida_tarde','observacion',
    ];

    public function area(){
      return $this->belongsTo('sisbio\UnidadArea','unidad_areas_id','id');
    }
}
