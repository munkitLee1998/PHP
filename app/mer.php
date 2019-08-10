<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mer extends Model
{
    public function Programme(){
        return $this->belongsTo('App\Programme', 'program_id');
    }
}
