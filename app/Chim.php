<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Chim extends Model
{   
    protected $fillable = [
        'id','user_id','created_at','updated_at','grade','reg_st'
    ];
    public function student(){
        return $this->belongsTo('App\User');
    }
    public function denounce(){
        return $this->belongsTo('App\Denounce');
    }
    
}
