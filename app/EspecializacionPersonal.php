<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class EspecializacionPersonal extends Model
{
    protected $fillable = [
      'personals_id','institucion','fech_ini','fech_culmi',
      'nombre_curso','duracion','archivo','codigo_archivo','observacion',
    ];

    public function personal(){
      return $this->belongsTo('sisbio\Personal','personals_id','id');
    }
}
