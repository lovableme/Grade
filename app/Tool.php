<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    public function student(){
        return $this->belongsTo('App\User');
    }
}
