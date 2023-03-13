<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Tasa extends Model
{
  protected $table = "tasas";

  protected $fillable = [
    'name', 'valor',
  ];

  protected $appends = ["porcentaje"];

  public function getPorcentajeAttribute(): float
  {
    return (float)number_format((float)$this->valor * 100, 2, ".", "");
  }
}
