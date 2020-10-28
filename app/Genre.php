<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';

    public function genre(){
        return $this->hasMany('App\Cerita');
    }
}
