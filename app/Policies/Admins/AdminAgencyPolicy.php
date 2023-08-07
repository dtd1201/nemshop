<?php

namespace App\Policies\Admins;

use App\Models\Agency;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminAgencyPolicy
{
    use HandlesAuthorization;


    public function list(Admin $user)
    {
        return $user->CheckPermissionAccess(config('permissions.access.agency-list'));
    }
    public function add(Admin $user)
    {
        return $user->CheckPermissionAccess(config('permissions.access.agency-add'));
    }
    public function edit(Admin $user)
    {
        return $user->CheckPermissionAccess(config('permissions.access.agency-edit'));
    }
    public function delete(Admin $user)
    {
        return $user->CheckPermissionAccess(config('permissions.access.agency-delete'));
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    public function view(Admin $user, Agency $agency)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    public function update(Admin $user, Agency $agency)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    // public function delete(Admin $user, Slider $slider)
    // {

    // }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    public function restore(Admin $user, Agency $agency)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    public function forceDelete(Admin $user, Agency $agency)
    {
        //
    }
}
