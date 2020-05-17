<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Grade extends Model
{
    public function student(){
        return $this->belongsTo('App\User');
    }
    public function denounce(){
        return $this->belongsTo('App\Denounce');
    }
}
