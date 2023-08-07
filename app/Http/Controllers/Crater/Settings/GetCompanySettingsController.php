<?php

namespace App\Http\Controllers\Crater\Settings;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\GetSettingsRequest;
use App\Models\Crm\CompanySetting;

class GetCompanySettingsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(GetSettingsRequest $request)
    {
        $settings = CompanySetting::getSettings($request->settings, $request->header('company'));

        return response()->json($settings);
    }
}
