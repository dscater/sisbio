<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable=[
      'ci','ci_exp','name','apep',
      'apem','fech_nac','genero',
      'est_civil','nacionalidad','profesion','grado_academico',
      'lugar_nac','domicilio','fono','cel','email','foto',
    ];

    public function formacion(){
      return $this->hasMany('sisbio\FormacionPersonal','personals_id','id');
    }

    public function especializacion(){
      return $this->hasMany('sisbio\EspecializacionPersonal','personals_id','id');
    }

    public function experiencia(){
      return $this->hasMany('sisbio\ExperienciaPersonal','personals_id','id');
    }

    public function contratos(){
      return $this->hasMany('sisbio\Contratos','personals_id','id');
    }

    public function pagos_extra(){
      return $this->hasMany('sisbio\PagosExtra','personals_id','id');
    }

    public function descuentos(){
      return $this->hasMany('sisbio\Descuento','personals_id','id');
    }

    public function pagos(){
      return $this->hasMany('sisbio\Pagos','personals_id','id');
    }

    public function asistencias(){
      return $this->hasMany('sisbio\Asistencia','personals_id','id');
    }
}
