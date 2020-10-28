<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cerita extends Model
{
    protected $table = 'cerita';
    protected $fillable = ['judul', 'dekripsi', 'isi', 'cover', 'id_genre', 'id_user'];
    
    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function genre(){
        return $this->belongsTo('App\Genre', 'id_genre');
    }

    public function komentar(){
        return $this->hasMany('App\Komentar');
    }
}
