<?php
namespace App;

use App\Math;
use App\Tool;
use App\User;
use App\Chim;
use App\Rel;
use App\Phys;


class Expiration {
    public $profession = '';
    // suspend grade and reply and denounce change
    public function suspendChange($profession){
        $this->profession = $profession;
        $tool = Tool::find(0);
        $sub = $profession . '_sub';
        $tool->$sub = 'readonly';
        $tool->save();
    }

    //suspend link of grades
    public function suspendlink($profession){
        $all  =User::where('education_status',1)->get();
        $this->profession = $profession;
        $obj = ucfirst($profession);

            foreach($all as $all)
            {
                $final_sabt = $all->$profession ? $all->$profession : new $obj(
                    [
                        'id' =>$all->id ,
                        'user_id'=>$all->id,
                        'reg_st' => 1,
                        'created_at'=> now(),
                        'updated_at'=>now(),

                    ]
                );
                $final_sabt->reg_st = 1;
                $final_sabt->save();
            }

    }
    //Send the date of Creation
    public function CheckIfExpired($profession){
        $Profession = ucfirst($profession);
        $students = User::where('education_status',1)->get();
        $array = [];
        $All = [];
            foreach ($students as $student) {
                $student_lesson =  $student->$profession ? $student->$profession : $this->MakeObj($Profession,$student);
                $student_lesson->reg_st = 1;
                $student_lesson->save();
                $date = $student_lesson ? $student_lesson->created_at : now();
                $all = [$date,
                    $profession,
                    $student->id];
                array_push($All,$all);
                ;
            }


            return $All;

    }
    //If lesson doesn't exist make it.
public function MakeObj($Profession,$student) {
        $obj = '';
    switch ($Profession) {
        case 'Math':
        {
         return   new Math (
                [   'id' =>$student->id,
                    'user_id' => $student->id,
                    'reg_st' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),]
            );
        }
        case 'Rel':
        {
         return        new Rel (
                ['id' => $student->id,
                    'user_id' => $student->id,
                    'reg_st' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),]
            );
        }
        case 'Phys':
        {
         return        new Phys (
                ['id' => $student->id,
                    'user_id' => $student->id,
                    'reg_st' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),]
            );
        }
        case 'Chim':
        {
          return     new Chim (
                [   'id' => $student->id,
                    'user_id' => $student->id,
                    'reg_st' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),]
            );
        }
    }
    }
    public function checkExpiration(){
        $chim =  $this->CheckIfExpired('chim');
        $math = $this->CheckIfExpired('math');
        $rel =  $this->CheckIfExpired('rel');
        $phys = $this->CheckIfExpired('phys');
        return [
            0=>$chim,
            1=>$math,
            2=>$rel,
            3=>$phys
        ];

    }

}
?>
