<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;


Gate::before(function (User $user, string $ability) {
    if ($user->isAdministrator()) {
        return true;
    }
});

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // public function before($user, $ability){
    //     if($user->isAdministrator()){
    //         return true;
    //     }
    // }

    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, $id)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, $id)
    {
        return $user->id === $id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
