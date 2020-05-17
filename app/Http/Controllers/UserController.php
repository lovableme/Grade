<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function change(Request $request){

        $validator = Validator::make($request->all(), [
            'password' => 'required|between:6,12|confirmed|regex:/^[A-Za-z0-9@!#\$%\^&\*]+$/',
        ]);
        if ($validator->fails()) {
            return redirect('changepass')
                ->withErrors($validator)
                ->withInput()->with('message','not successful') ;


        }
        else{

            $auth = auth()->user();
            $auth->password = Hash::make(request()->input('password'));
            $auth->save();
            return back()->with('message','رمز شما با موفقیت تغییر کرد');
        }
    }
}
