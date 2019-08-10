<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    public function authorizeRoles($staffType)
    {
     
        
       if(is_array($staffType)){
           return $this->hasAnyRole($staffType) ||
                   abort('401','This action is unauthorized.');
       }else{
            return $this->hasRole($staffType) ||
               abort('401','This action is unauthorized.');
       }
       
      
    }
    
    public function hasAnyRole($staffType) {
         echo "<script type='text/javascript'>alert('($this->get_role() == $staffType)');</script>";
         if($this->get_role() == $staffType){
            return $staffType;
        }else{
            return null;
        }
    }
    
    public function hasRole($staffType) {
         
        if($this->get_role() == $staffType){
            return $staffType;
        }else{
            return null;
        }
    }
    public function get_role(){
        $role =$this->staffType;
        return $role;
       
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staffName','staffType', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
