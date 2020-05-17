<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Professor;
use App\Grade;
use App\Tool;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $fillable = [
      'api_token', 'education_status', 'name', 'uni_num', 'password','Professor_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $attribute = [
        'education_status'
    ];
    protected $table ="users";
    protected $guard = 'web';
    public function professor(){
        return $this->hasOne('App\Professor');
    }
    public function math(){
        return $this->hasOne('App\Math');
    }
    public function denounce(){
        return $this->hasOne('App\Denounce');
    }
    public function tool(){
        return $this->hasOne('App\Tool');
    }
    public function geteducationstatusAttribute($attribute){
        return [null=>'',
                0=>'عدم تحصیل ',
                1=>'در حال تحصیل'][$attribute];
    }
    public function chim(){
        return $this->hasOne('App\Chim');
    }
    public function phys(){
        return $this->hasOne('App\Phys');
    }
    public function rel(){
        return $this->hasOne('App\Rel');
    }


}
