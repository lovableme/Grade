<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Professor;
use App\Denounce;
use App\Chim;
use App\Expiration;

class Regcontroller extends Controller
{
    public function reg(){
        
        $professor = auth()->id();
        $all  =User::where('education_status',1)->get();

        foreach($all as $all)
        {   
            $Professor = Professor::find(1);
            $profession = $Professor->profession;
            $obj = ucfirst($profession);
            $profession_d = $profession . '_d';
            $dars = $Professor->profession;
            $grade = $all->$dars->grade ?? 14;
            $lName = request()->input('lName');
            $lesson = $all->$dars ? $all->$dars 
            : new $obj(
                [
                    'id' =>$all->id ,
                    'user_id'=>$all->id,
                    'created_at'=> now(),
                    'updated_at'=>now(),
                    'reg_st' =>0
                ]

            );
            $reply=$lName. "_r";
            
            $lesson->grade = request()->input($all->name);
            $lesson->updated_at=now();
            $lesson->save();
            $D_id = $all->denounce ? $all->denounce->id : '';
            $replyMessage=Denounce::find($D_id) ? Denounce::find( $D_id)  :new Denounce (
                [
                    'id' =>$all->id,
                    'user_id'=> $all->id
                ]
                );
            $replyMessage->$reply = request()->input($all->uni_num);

            $replyMessage->save();
        }
        return view('finalSubmit');
    }
    function finalsabt($profession){
        $suspendC = new Expiration;
        $suspendC->suspendChange($profession);
        $suspendC->suspendlink($profession);
        return redirect('grade')->with('message','ثبت نهایی انجام شد. دیگر قادر به تغییر نمره نخواهید بود');
        
    }
}
