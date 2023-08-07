<?php

namespace App\Http\Controllers\Crater\Payment;

use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\Payment;

class PaymentPdfController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Payment $payment)
    {
        return $payment->getGeneratedPDFOrStream('payment');
    }
}
