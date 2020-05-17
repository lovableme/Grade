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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        // if($profession && $profession == $lesson-> )
        // {
        //     return "f";
        // }
        // $lesson =
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
