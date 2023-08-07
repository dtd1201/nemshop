<?php

namespace App\Http\Controllers\Crater\Settings;

use Auth;
use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\UpdateSettingsRequest;

class UpdateUserSettingsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\UpdateSettingsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateSettingsRequest $request)
    {
        $user = Auth::user();

        $user->setSettings($request->settings);

        return response()->json([
            'success' => true,
        ]);
    }
}
