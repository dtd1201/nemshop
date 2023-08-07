<?php

namespace App\Http\Controllers\Crater;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data;

    protected function getAdminUser()
    {
        $user = Auth::guard('admin')->user();
        return $user;
    }

    public function getCompanyId($id = null)
    {
        $user = Auth::guard('admin')->user();

        $companyId = $user->company_id;
        return $companyId;
    }
}
