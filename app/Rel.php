<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Rel extends Model
{
    public function student(){
        return $this->belongsTo('App\User');
    }
    public function denounce(){
        return $this->belongsTo('App\Denounce');
    }
    protected $guarded = [];
    
}
