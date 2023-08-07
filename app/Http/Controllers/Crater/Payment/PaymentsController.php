<?php

namespace App\Http\Controllers\Crater\Payment;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\DeletePaymentsRequest;
use App\Http\Requests\Crater\PaymentRequest;
use App\Models\Crm\Item;
use App\Models\Crm\Payment;
use App\Models\Crm\Unit;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 10;

        $payments = Payment::with(['user', 'invoice', 'paymentMethod', 'creator'])
            ->join('users', 'users.id', '=', 'payments.user_id')
            ->leftJoin('invoices', 'invoices.id', '=', 'payments.invoice_id')
            ->leftJoin('payment_methods', 'payment_methods.id', '=', 'payments.payment_method_id')
            ->applyFilters($request->only([
                'search',
                'payment_number',
                'payment_id',
                'payment_method_id',
                'customer_id',
                'orderByField',
                'orderBy',
            ]))
            ->whereCompany($this->getCompanyId())
            ->select('payments.*', 'users.name', 'invoices.invoice_number', 'payment_methods.name as payment_mode')
            ->latest()
            ->paginateData($limit);

        $data = [
            'payments' => $payments,
            'paymentTotalCount' => Payment::count(),
        ];

        return view('admin.crater.payments.index', $data);
    }


    public function create()
    {
        $payment = new Payment();
        $units = Unit::query()->get();

        $data = [
            'type' => 1,
            'payment' => $payment,
            'units' => $units
        ];

        return view('admin.crater.payments.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $payment = Payment::createPayment($request);

        return response()->json([
            'payment' => $payment,
            'success' => true,
        ]);
    }

    public function show(Request $request, Payment $payment)
    {
        $payment->load([
            'user',
            'invoice',
            'paymentMethod',
            'fields.customField',
        ]);

        return response()->json([
            'nextPaymentNumber' => $payment->getPaymentNumAttribute(),
            'payment_prefix' => $payment->getPaymentPrefixAttribute(),
            'payment' => $payment,
        ]);
    }

    public function edit(Payment $payment)
    {
        $units = Unit::query()->get();

        $data = [
            'type' => 2,
            'payment' => $payment,
            'units' => $units
        ];

        return view('admin.crater.payments.create', $data);
    }


    public function update(PaymentRequest $request, Payment $payment)
    {
        $payment = $payment->updatePayment($request);

        return response()->json([
            'payment' => $payment,
            'success' => true,
        ]);
    }

    public function delete(DeletePaymentsRequest $request)
    {
        Payment::deletePayments($request->ids);

        return response()->json([
            'success' => true,
        ]);
    }
}
