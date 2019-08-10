<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function Programme(){
        return $this->belongsToMany('App\Programme');
    }
    public function Faculty(){
        return $this->belongsToMany('App\Faculty');
    }
}
