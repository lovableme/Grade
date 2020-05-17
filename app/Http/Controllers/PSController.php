<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Professor;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Resources\Student as StudentR;

class PSController extends Controller
{
    public function create(Request $request)
    {
        
        
        $daneshamooz = new Professor;
        $daneshamooz->name = 'مهدی رضوی';
        $daneshamooz->password = Hash::make(403060);
        
        $daneshamooz->profession="chim";
        $daneshamooz->uni_num = 985391014;
        $daneshamooz->student_id = 10;


        $daneshamooz
        ->save();

        // $category = Professor::find([1,5]);
        // $daneshamooz->Proffesors()->attach($category);
            
        // return 'Success'; 
        
        
    }
    public function see(Request $request){
        $stu = User::find(2000);
        $student =  new StudentR($stu);
       
        $stud = User::paginate(1);
        $students =User::collection($stud);

        return view('resource',['stus'=>$students,'stu'=>$student]);
       
    }
    public function createUstad(Request $request)
    {
        $daneshamooz = new Professor;
        $daneshamooz->name = 'مهدی رضوی';
        $daneshamooz->password = Hash::make(49162536);
        $daneshamooz->id = 2;
        $daneshamooz->profession="phys";
        $daneshamooz->uni_num = 22222222;
        $daneshamooz->student_id = 2;
        $daneshamooz
        ->save();
        $daneshamooz = new Professor;
        $daneshamooz->name = 'قلی رضوی';
        $daneshamooz->password = Hash::make(49162536);
        $daneshamooz->id = 3;
        $daneshamooz->profession="math";
        $daneshamooz->uni_num = 33333333;
        $daneshamooz->student_id = 3;


        $daneshamooz
        ->save();
        $daneshamooz = new Professor;
        $daneshamooz->name = 'مهدی ثنایی';
        $daneshamooz->password = Hash::make(49162536);
        $daneshamooz->id = 4;
        $daneshamooz->profession="rel";
        $daneshamooz->uni_num = 44444444;
        $daneshamooz->student_id = 4;


        $daneshamooz
        ->save();

    }

}