<?php

namespace App\Policies;

use App\Grade;
use App\User;
use App\Professor;
use App\Tool;
use Illuminate\Auth\Access\HandlesAuthorization;

class GradePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Student  $user
     * @return mixed
     */
    public function viewAny( $user)
    {
        return $user->education_status  == 'در حال تحصیل';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Grade  $grade
     * @return mixed
     */
    public function view(User $user, Grade $grade)
    {
       
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Student  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Grade  $grade
     * @return mixed
     */
    public function update(User $user, Grade $grade)
    {
        
            
        
    }
    public function professor($user){
                $prof = $user->profession;
              
        return  $prof;
    }
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Grade  $grade
     * @return mixed
     */
    public function delete(User $user, Grade $grade)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Grade  $grade
     * @return mixed
     */
    public function restore(User $user, Grade $grade)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Grade  $grade
     * @return mixed
     */
    public function forceDelete(User $user, Grade $grade)
    {
        //
    }
    public function CanDenounceChim(User $user )
    {
        if($user->chim){
            return   ! auth()->user()->chim->reg_st ;
        }
        return true
        ;
    }
    public function CanDenouncePhys(User $user )
    {
        if($user->phys){
            return ! $user->phys->reg_st ;
        }
        return true;
    }
    public function CanDenounceMath(User $user )
    {
        if($user){
            return  ! $user->math->reg_st  ;
        } 
        return true;
    }
    public function CanDenounceRel( User $user )
    {
        if($user){
            return  ! $user->rel->reg_st;
        }
        return true;    
    }
}
