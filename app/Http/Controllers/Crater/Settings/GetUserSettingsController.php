<?php

namespace App\Http\Controllers\Crater\Settings;

use Auth;
use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\GetSettingsRequest;

class GetUserSettingsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\GetSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(GetSettingsRequest $request)
    {
        $user = Auth::user();

        return response()->json($user->getSettings($request->settings));
    }
}
