<?php

namespace App;


use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Doctor extends Model
{
    
    use Authenticatable;
    protected $table="doctors";
    protected $fillable = [
        'username', 'email', 'password','status'
    ];
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function appointments(){
        return $this->hasMany('App\Appointment','id','doctor_id');
    }
}
