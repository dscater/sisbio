<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Tasa extends Model
{
    protected $table="tasas";

    protected $fillable = [
      'name','valor',
    ];
}
