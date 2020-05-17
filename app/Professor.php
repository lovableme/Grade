<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Tool;
use App\Professor;


class Professor extends Authenticatable
{
    protected $fillable = [
        'name', 'family', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $guard = 'profs';
    
    public function Students(){
        return belongsTo('App\User');
    }
    public function sub(){
        $pro = Professor::find(1);
        $disablity= Tool::find(0);
        $profession =  $pro->profession;
        $disablity_col= $profession . "_sub";
        $disablity_val=$disablity->$disablity_col;
        $disablity->$disablity_col = "readonly";
        $disablity->save();
      }
}
