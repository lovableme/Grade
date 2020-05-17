<?php

namespace App\Policies;

use App\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Student  $user
     * @return mixed
     */
    public function viewAny(Student $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function view(Student $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Student  $user
     * @return mixed
     */
    public function create(Student $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function update(Student $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function delete(Student $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function restore(Student $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Student  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function forceDelete(Student $user, Student $student)
    {
        //
    }
}
