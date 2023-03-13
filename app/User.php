<?php

namespace sisbio;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function datos_usuario()
    {
        return $this->hasOne('sisbio\DatosUsuario', 'users_id', 'id');
    }
    public function notificacion_users()
    {
        return $this->hasMany(NotificacionUser::class, 'user_id');
    }
}
