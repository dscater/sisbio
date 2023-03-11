<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
      'personals_id','fecha','ingreso_maniana','salida_maniana',
      'ingreso_tarde','salida_tarde','estado','observacion',
    ];

    public function personal(){
      return $this->belongsTo('sisbio\Personal','personals_id','id');
    }
}
