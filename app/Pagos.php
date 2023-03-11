<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $fillable = [
      'mes','anio',
      'dias_trabajado','monto_total',
    ];

    public function personal(){
      return $this->belongsTo('sisbio\Personal','personals_id','id');
    }
}
