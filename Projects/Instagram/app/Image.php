<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    // Tabla que modifica el modelo
    protected $table = 'images';

    // Relacion One To Many / de una a muchos
    public function comments() {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    // Relacion One To Many
    public function likes() {
        return $this->hasMany('App\Like');
    }

    // Relacion Many To One
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    
}
