<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
     protected $fillable = [
        'body',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
