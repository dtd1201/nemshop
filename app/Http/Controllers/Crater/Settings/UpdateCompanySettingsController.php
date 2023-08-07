<?php

namespace App\Http\Controllers\Crater\Settings;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\UpdateSettingsRequest;
use App\Models\Crm\CompanySetting;

class UpdateCompanySettingsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\UpdateSettingsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(UpdateSettingsRequest $request)
    {
        CompanySetting::setSettings($request->settings, $request->header('company'));

        return response()->json([
            'success' => true,
        ]);
    }
}
