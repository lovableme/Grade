<?php

namespace App\Listeners;

use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Chim;
use App\Math;
use App\Phys;
use App\Rel;

class ExpireDenounceTime
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $all = $event->lesson;
        $student= User::find($all[2]);
        $pro = strval($all[1]);
        $do = $student->$pro;
        $do->reg_st = 1;
        $do->save();



//        switch($event->lesson){
//            case 'Chim':
//                $dars = Chim::all();
//                foreach ($dars as $dars){
//                    $dars->reg_st = 1;
//                    $dars->save();
//                }
//            case 'Phys':
//                $dars = Phys::all();
//                foreach ($dars as $dars){
//                    $dars->reg_st = 1;
//                    $dars->save();
//                }
//            case 'Math':
//                $dars = Math::all();
//                foreach ($dars as $dars) {
//                    $dars->reg_st = 1;
//                    $dars->save();
//                }
//            case 'Rel':
//                $dars = Rel::all();
//                foreach ($dars as $dars){
//                    $dars->reg_st = 1;
//                    $dars->save();
//                }
//        }
    }
}
