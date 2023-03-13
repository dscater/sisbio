<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class RegistroLog extends Model
{
    protected $fillable = [
        "user_id",
        "modulo",
        "accion",
        "descripcion",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}