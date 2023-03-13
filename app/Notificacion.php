<?php

namespace sisbio;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $fillable = [
        "asistencia_id",
        "detalle",
        "fecha",
        "hora",
    ];

    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class, 'asistencia_id');
    }
}
