<?php

namespace App\Http\Controllers\Crater\Estimate;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\SendEstimatesRequest;
use App\Models\Crm\Estimate;

class SendEstimateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Crater\Http\Requests\SendEstimatesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SendEstimatesRequest $request, Estimate $estimate)
    {
        $response = $estimate->send($request->all());

        return response()->json($response);
    }
}
