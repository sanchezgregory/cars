<?php

namespace Cars\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function findByNameOrEmail($term)
    {
        return static::select('id', 'name', 'email')
            ->where('name', 'LIKE', "%$term%")
            ->orWhere('email', 'LIKE', "%$term%")
            ->get();
    }
}
