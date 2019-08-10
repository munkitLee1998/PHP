<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function Programme(){
        return $this->belongsToMany('App\Programme');
    }
}
