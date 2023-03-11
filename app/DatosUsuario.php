<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class DatosUsuario extends Model
{
    protected $fillable = [
      'name','apep','apem','ci','ci_exp','dir',
      'email','fono','cel','foto','cargos_id','users_id',
    ];

    public function user(){
      return $this->belongsTo('sisbio\User','users_id','id');
    }

    public function cargo(){
      return $this->belongsTo('sisbio\Cargo','cargos_id','id');
    }
}
