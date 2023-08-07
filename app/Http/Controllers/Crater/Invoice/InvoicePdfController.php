<?php

namespace App\Http\Controllers\Crater\Invoice;

use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\Invoice;

class InvoicePdfController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Invoice $invoice)
    {
        return $invoice->getGeneratedPDFOrStream('invoice');
    }
}
