<?php

namespace App\Policies;

use App\Professor;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Grade;
use App\Student;

class GradesPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function professor(){
        $auth = auth()->id;
        $professor = Professor::find($auth);
        $grade = $student->grade->id;
        return $professor->id ;
    }
}
