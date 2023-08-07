<?php

namespace App\Http\Controllers\Crater\Payment;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\SendPaymentRequest;
use App\Models\Crm\Payment;

class SendPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SendPaymentRequest $request, Payment $payment)
    {
        $response = $payment->send($request->all());

        return response()->json($response);
    }
}
