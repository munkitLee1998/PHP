<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function Programme(){
        return $this->hasMany('App\Programme');
    }
    
    public function Branch(){
        return $this->belongsToMany('App\Branch');
    }
}
