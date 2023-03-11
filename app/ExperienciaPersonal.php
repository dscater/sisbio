<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class ExperienciaPersonal extends Model
{
    protected $fillable = [
      'personals_id','empresa','fech_ini','fech_culmi',
      'objeto_contratacion','cargo','sueldo','observacion',
    ];

    public function personal(){
      return $this->belongsTo('sisbio\Personal','personals_id','id');
    }
}
