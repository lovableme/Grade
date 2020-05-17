<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Student;
// use App\Professor;

// use Illuminate\Support\Facades\Auth;


// use Illuminate\Support\Facades\Hash;

// class ProfessorController extends Controller
// {
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth:profs');
//     }

//     /**
//      * Show the application dashboard.
//      *
//      * @return \Illuminate\Contracts\Support\Renderable
//      */
//     public function index()
//     {
//         return view('professor');
//     }
//     public function rela()
//     {
//         // $daneshamooz = new Professor;
//         // $daneshamooz->name = 'مهدی رضوی';
//         // $daneshamooz->password = Hash::make(403060);
//         // $daneshamooz->student_id = 1;
//         // $daneshamooz->students_id = 1;
//         // $daneshamooz->uni_num = 21;

//         // $daneshamooz
//         // ->save();
//         Auth::attempt(['uni_num' => 49162536, 'password' => 49162536]);
//         return 'true';
//     }
    
// }

