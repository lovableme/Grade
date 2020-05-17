<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Math extends Model
{
    protected $guarded = [];
    public function student(){
        return $this->belongsTo('App\User');
    }
    public function denounce(){
        return $this->belongsTo('App\Denounce');
    }

}
