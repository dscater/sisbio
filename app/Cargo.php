<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
      'name','description',
    ];

    public function datos_usuario(){
      return $this->hasMany('sisbio\DatosUsuario','cargos_id','id');
    }

    public function contrato(){
      return $this->hasMany('sisbio\Contratos','cargos_id','id');
    }
}
