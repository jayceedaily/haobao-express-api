<?php

namespace App\Policies;

use App\Models\Modifier;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModifierPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modifier  $modifier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Modifier $modifier)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modifier  $modifier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Modifier $modifier)
    {
        return $user->id === $modifier->created_by;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modifier  $modifier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Modifier $modifier)
    {
        return $user->id === $modifier->created_by;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modifier  $modifier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Modifier $modifier)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modifier  $modifier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Modifier $modifier)
    {
        //
    }
}
