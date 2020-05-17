<?php 
use App\User;
use App\Professor;

use App\Grade;
use App\Tool;
use Illuminate\Support\Facades\Auth;

$id = 1;
$stu = User::find(1);
$pro = Professor::find($id);

$grade = $stu->grade;

$profession = $pro->profession;
$denounce = $profession . '_d';
$reply = $profession . '_r';
// dd($profession);
// die();
$profession_d =$profession . '_d'; 

$all_students= User::where('education_status', 1)->get();
$disablity= Tool::find(0);
$disablity_col= $profession . "_sub";
$disablity_val=$disablity->$disablity_col;
// dd($disablity_val);
// die();
?>
    <h1>تایید نهایی</h1></br>
    <strong>بعد از سه روز بطور خودکار نمرات تایید نهایی می شوند</strong>
    <br><br>
    @foreach($all_students as $all)
    
        {{$all->name}} :<span>{{$all->$profession['grade']}}</span>
        </br></br></br>
    @endforeach
    
    <a href="/grade">
        back
    </a>
    <a style="position:relative;right:40%;float:right" href="../finalsabt/{{$profession}}">ثبت نهایی تمامی نمره ها
    </a>

