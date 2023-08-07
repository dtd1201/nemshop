<?php

namespace App\Http\Controllers\Crater\Onboarding;

use Auth;
use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::where('role', 'super admin')->first();
        Auth::login($user);

        return response()->json(['success' => true]);
    }
}
