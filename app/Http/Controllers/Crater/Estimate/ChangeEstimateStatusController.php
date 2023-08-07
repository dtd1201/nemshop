<?php

namespace App\Http\Controllers\Crater\Estimate;

use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\Estimate;
use Illuminate\Http\Request;

class ChangeEstimateStatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Estimate $estimate
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Estimate $estimate)
    {
        $estimate->update($request->only('status'));

        return response()->json([
            'success' => true,
        ]);
    }
}
