<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $fillable = [
      'tipo_descuento','monto','mes',
      'anio','fecha_desc','descripcion',
    ];

    public function personal(){
      return $this->belongsTo('sisbio\Personal','personals_id','id');
    }
}
