<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public function Faculty(){
        return $this->belongsTo('App\Faculty');
    }
    
    public function Mer(){
        return $this->hasMany('App\mer');
    }
    
    public function progStruct(){
        return $this->hasMany('App\progStruct');
    }
    
    public function Course(){
        return $this->belongsToMany('App\Course');
    }
    
    public function Branch(){
        return $this->belongsToMany('App\Branch');
    }
    
    public function Fee(){
        return $this->hasMany('App\Fee');
    }
    
    public function Loan(){
        return $this->belongsToMany('App\Loan');
    }
    
    
}
