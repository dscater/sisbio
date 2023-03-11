<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class FormacionPersonal extends Model
{
  protected $fillable = [
    'institucion','fech_ini','fech_culmi',
    'grado_academico','titulo','codigo_titulo',
    'observacion',
  ];

    public function personal(){
      return $this->belongsTo('sisbio\Personal','personals_id','id');
    }
}
