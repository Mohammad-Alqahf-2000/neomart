<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StoreOrder;

class StoreOrderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function viewAny(User $user): bool
    {
        return $user->hasPermissions('storeOrder-list');
    }
    public function view(User $user, StoreOrder $storeOrder): bool
    {
        return ($user->hasPermissions('storeOrder-show') && $user->store->id  === $storeOrder->store_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissions('order-create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StoreOrder $storeOrder): bool
    {
        return $user->hasPermissions('order-update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StoreOrder $storeOrder): bool
    {
        return $user->hasPermissions('order-delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StoreOrder $storeOrder): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StoreOrder $storeOrder): bool
    {
        return false;
    }
}
