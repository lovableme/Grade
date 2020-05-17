<?php


namespace App;


class GradeHandler
{
    public function FindUser()
    {
        return  auth()->user();
//    $pro = Professor::find(1);
//    $profession = $pro->profession;
    }
    public function FindPro()
    {
        return  auth()->user()->profession;
//    $pro = Professor::find(1);
//    $profession = $pro->profession;
    }


    public function LessonFinder (){
        $stu = $this->FindUser();
        return [
            'math' => $stu->math,
            'chim' => $stu->chim,
            'rel' => $stu->rel,
            'phys' => $stu->phys];
    }

    public function all_students (){
        return  $all_students= User::where('education_status' , 1)->get();
    }

    public function readonly($profession){
        $disablity= Tool::find(0);
        return $disablity_col= $profession . "_sub";
    }
    public function DAndR($profession){
        $disablity_col = $this->readonly(auth()->user()->profession);
        $disablity= Tool::find(0);
        $profession_d  = $profession . '_d';
       return  ['disablity_val'=>$disablity->$disablity_col,
                 'denounce' => $profession . '_d',
                'reply' => $profession . '_r'];
    }




    public  function  Dates(){
        $user =$this->FindUser();
      return [
          $math_created = $user->math->created_at,
          $rel_created = $user->rel->created_at ,
          $phys_created = $user->phys->created_at ,
          $chim_created = $user->chim->created_at ];
    }

    function denounce_time ($time){
        $date = strtotime($time)+3*24*3600;
        return date('y/m/d',$date);
    }
}
