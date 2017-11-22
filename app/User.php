<?php

namespace App;

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
        'first_name', 'last_name', 'email', 'timezone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Define relationship with the Blog model
     */
    public function blog() {
        return $this->hasMany('App\Blog');
    }

    /**
     * Define relationship with the Timezone model
     */
    public function timezone() {
        return $this->hasOne('App\Timezone', 'id', 'timezone')->select(['id','gmtOffset','zoneName']);
    }
}
