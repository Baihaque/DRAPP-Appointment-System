<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\doctor;

class Appointment extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
}
