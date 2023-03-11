<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class PagosExtra extends Model
{
    protected $fillable = [
      'tipo_pago','monto','mes',
      'anio','fech_pago','descripcion',
    ];

    public function personal(){
      return $this->belongsTo('sisbio\Personal','personals_id','id');
    }
}
