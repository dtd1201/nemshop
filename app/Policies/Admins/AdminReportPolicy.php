<?php

namespace App\Policies\Admins;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminReportPolicy
{
    use HandlesAuthorization;


    public function list(Admin $user)
    {
        return $user->CheckPermissionAccess(config('permissions.access.report-list'));
    }
}
