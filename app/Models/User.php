<?php

namespace App\Models;

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

    public function jokes(){
        return $this->hasMany('App\Models\Joke');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
