<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $fillable = ['isi', 'id_user', 'id_cerita'];

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function cerita(){
        return $this->belongsTo('App\Cerita', 'id_cerita');
    }
}
