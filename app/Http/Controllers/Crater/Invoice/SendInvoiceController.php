<?php

namespace App\Http\Controllers\Crater\Invoice;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\SendInvoiceRequest;
use App\Models\Crm\Invoice;

class SendInvoiceController extends Controller
{
    /**
     * Mail a specific invoice to the corresponding customer's email address.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(SendInvoiceRequest $request, Invoice $invoice)
    {
        $input = $request->all();

        //Job Quee

        $invoice->send($request->all());
        $data = [
            'invoice' => $invoice,
            'send_job' => 1
        ];

        return redirect(route('admin.invoices.show', $data))->with('success', 'Invoice send success!');
    }
}
