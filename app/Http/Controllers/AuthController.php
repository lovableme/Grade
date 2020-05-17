<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    protected function generateAccesToken($user){
        $token = $user->createToken($user->uni_num.'-'.now());
        return $token->accessToken;
    }
    protected function register(Request $data)
    {
        $data->validate( [
            'name' => ['required', 'string', 'max:255'],
            'uni_num' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'Professor_id'=> ['string'],  
        ]);
        $user =  User::create([
            'name' => $data['name'],
            'uni_num' => $data['uni_num'],
            'password' => Hash::make($data['password']),
            'Professor_id'=>6,
            
            'education_status'=>1
        ]);
        return response()->json($user);
    }
    protected function login(Request $request)
    {
        $request-> validate( [
           
            'uni_num' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3'],
             
        ]);

        // if(Auth::guard('api')->attempt(['uni_num' => request('uni_num'), 'password' => request('password')]))
        // {   
            
        //     $user = Auth::guard('api')->user();
        //     $token = $user->createToken($user->uni_num . '-' . now());
        //      return response()->json(
        //         ['token' => $token->accessToken]
        //      );
        // }else{
        //     dd('failure');
        }
        
        
    }

