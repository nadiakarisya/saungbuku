<?php

namespace App\Policies;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

class Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the vendor list.
     *
     * @return mixed
     */
    public function index(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the vendor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vendor  $vendor
     * @return mixed
     */
    public function view(User $user, Model $model)
    {
        return true;
    }

    /**
     * Determine whether the user can create vendors.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the vendor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vendor  $vendor
     * @return mixed
     */
    public function update(User $user, Vendor $vendor)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the vendor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vendor  $vendor
     * @return mixed
     */
    public function delete(User $user, Vendor $vendor)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the vendor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vendor  $vendor
     * @return mixed
     */
    public function restore(User $user, Vendor $vendor)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the vendor.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vendor  $vendor
     * @return mixed
     */
    public function forceDelete(User $user, Vendor $vendor)
    {
        return true;
    }
}
