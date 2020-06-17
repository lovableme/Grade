<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\User;
use App\Professor;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return  view('grade');
    }

    function RegDenounce(Request $request,$dars){
        $col_e = $dars . "_d";

        $eteraz = request()->input($dars);
        $id = auth()->id();
        $student = User::find($id);
        $denounce = $student->denounce;
        $denounce->$col_e=$eteraz;
        $denounce->save();
        return  back()->with('message' ,'اعتراض شما با موفقیت ثبت شد');
        }




}
