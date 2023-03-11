<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    protected $fillable = [
      'unidad_areas_id','cargos_id','fech_ingreso',
      'fech_retiro','forma_pago','salario',
      'tipo_contrato','turno',
      'nit_personal','nro_seguro','nro_cuenta',
      'nombre_banco','observacion','estado',
    ];

    public function personal(){
      return $this->belongsTo('sisbio\Personal','personals_id','id');
    }

    public function area(){
      return $this->belongsTo('sisbio\UnidadArea','unidad_areas_id','id');
    }

    public function cargo(){
      return $this->belongsTo('sisbio\Cargo','cargos_id','id');
    }
}
