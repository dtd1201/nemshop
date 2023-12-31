<?php

namespace App\Http\Controllers\Crater\General;

use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\CompanySetting;
use App\Models\Crm\Estimate;
use App\Models\Crm\Invoice;
use App\Models\Crm\Payment;
use Illuminate\Http\Request;

class NextNumberController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $key = $request->key;

        $val = $key . '_prefix';

        $prefix = CompanySetting::getSetting(
            $val,
            $request->header('company')
        );

        $nextNumber = null;

        switch ($key) {
            case 'invoice':
                $nextNumber = Invoice::getNextInvoiceNumber($prefix);

                break;

            case 'estimate':
                $nextNumber = Estimate::getNextEstimateNumber($prefix);

                break;

            case 'payment':
                $nextNumber = Payment::getNextPaymentNumber($prefix);

                break;

            default:
                return;
        }

        return response()->json([
            'nextNumber' => $nextNumber,
            'prefix' => $prefix,
        ]);
    }
}
