<?php

namespace App\Policies;

use App\Models\Nomina;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NominaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
     return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Nomina  $nomina
     * @return mixed
     */
    public function view(User $user, Nomina $nomina)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->tipo == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Nomina  $nomina
     * @return mixed
     */
    public function update(User $user, Nomina $nomina)
    {
        return $user->tipo == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Nomina  $nomina
     * @return mixed
     */
    public function delete(User $user, Nomina $nomina)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Nomina  $nomina
     * @return mixed
     */
    public function restore(User $user, Nomina $nomina)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Nomina  $nomina
     * @return mixed
     */
    public function forceDelete(User $user, Nomina $nomina)
    {
        //
    }
}
