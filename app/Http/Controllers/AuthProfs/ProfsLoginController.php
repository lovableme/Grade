<?php

// namespace App\Http\Controllers\AuthProfs;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

// class ProfsLoginController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Login Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles authenticating users for the application and
//     | redirecting them to your home screen. The controller uses a trait
//     | to conveniently provide its functionality to your applications.
//     |
//     */

//     use AuthenticatesUsers;

//     /**
//      * Where to redirect users after login.
//      *
//      * @var string
//      */
//     protected $redirectTo = RouteServiceProvider::HOME;

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//     }
    
//     public function username()
//     {
//         return 'uni_num';
//     }
//     public function login(Request $request){
//         $this->validate($request, [
//             'uni_num' => ['required', 'string', 'max:255'],
//             'password' => ['required', 'string', 'min:3'],
//         ]);
//         $credential = [
//             'uni_num'=> $request->uni_num,
//             'password' => $request->password,
//         ];
//         if(Auth::attempt($credential)){
//             return redirect()->intended(route('profhome'));
//         }
//         return redirect()->back()->withInput($request->only('uni_num'));
//     }
//     public function showLoginForm()
//     {
//         return view('auth.login2');
//     }

// }
