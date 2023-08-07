<?php

namespace App\Http\Controllers\Crater\Onboarding;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\DomainEnvironmentRequest;
use Crater\Space\EnvironmentManager;
use Illuminate\Support\Facades\Artisan;

class AppDomainController extends Controller
{
    /**
     *
     * @param DomainEnvironmentRequest $request
     */
    public function __invoke(DomainEnvironmentRequest $request)
    {
        Artisan::call('optimize:clear');

        $environmentManager = new EnvironmentManager();

        $results = $environmentManager->saveDomainVariables($request);

        if (in_array('error', $results)) {
            return response()->json($results);
        }

        return response()->json([
            'success' => false,
        ]);
    }
}
