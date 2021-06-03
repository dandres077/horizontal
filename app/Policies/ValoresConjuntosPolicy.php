<?php

namespace App\Policies;

use App\User;
use App\ValoresConjuntos;
use Illuminate\Auth\Access\HandlesAuthorization;

class ValoresConjuntosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any valores conjuntos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the valores conjuntos.
     *
     * @param  \App\User  $user
     * @param  \App\ValoresConjuntos  $valoresConjuntos
     * @return mixed
     */
    public function view(User $user, ValoresConjuntos $valoresConjuntos)
    {
        return $user->conjunto_id == $valoresConjuntos->conjunto_id;
    }

    /**
     * Determine whether the user can create valores conjuntos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the valores conjuntos.
     *
     * @param  \App\User  $user
     * @param  \App\ValoresConjuntos  $valoresConjuntos
     * @return mixed
     */
    public function update(User $user, ValoresConjuntos $valoresConjuntos)
    {
        //
    }

    /**
     * Determine whether the user can delete the valores conjuntos.
     *
     * @param  \App\User  $user
     * @param  \App\ValoresConjuntos  $valoresConjuntos
     * @return mixed
     */
    public function delete(User $user, ValoresConjuntos $valoresConjuntos)
    {
        //
    }

    /**
     * Determine whether the user can restore the valores conjuntos.
     *
     * @param  \App\User  $user
     * @param  \App\ValoresConjuntos  $valoresConjuntos
     * @return mixed
     */
    public function restore(User $user, ValoresConjuntos $valoresConjuntos)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the valores conjuntos.
     *
     * @param  \App\User  $user
     * @param  \App\ValoresConjuntos  $valoresConjuntos
     * @return mixed
     */
    public function forceDelete(User $user, ValoresConjuntos $valoresConjuntos)
    {
        //
    }
}
