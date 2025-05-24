<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'numControl',
        'name',
        'email',
        'password',
        'idRol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function rol()
    {
        return $this->belongsTo(RolModel::class, 'idRol', 'idRol');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->idRol) {
                $user->idRol = 2;
            }
        });
    }

    public function hasRole($role)
    {
        return $this->rol->nombre === $role;
    }

    public function getAuthIdentifierName()
    {
        return 'numControl';
    }
}
