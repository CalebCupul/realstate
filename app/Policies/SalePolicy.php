<?php

namespace App\Policies;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
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
        return $user->can('sales.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Sale $sale)
    {
        return $user->can('sales.show');
    }

    public function edit(User $user, Sale $sale)
    {
        if ( $user->roles->pluck('name') == 'Super Admin'){
            return true;
        }

        if($sale->user->id === $user->id){
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('sales.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Sale $sale)
    {
        return $user->can('sales.edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Sale $sale)
    {
        return $user->can('sales.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Sale $sale)
    {
        return $user->can('sales.destroy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Sale $sale)
    {
        return $user->can('sales.destroy');
    }
}
