<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denounce extends Model
{   
    protected $guarded = [];
    public function student(){
        return belongsTo('App\User');
    }
    public function grade(){
        return $this->hasOne('App\Grade');
    }
}
