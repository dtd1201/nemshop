<?php

namespace App\Http\Controllers\Crater\Dashboard;

use Carbon\Carbon;
use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\CompanySetting;
use App\Models\Crm\Estimate;
use App\Models\Crm\Expense;
use App\Models\Crm\Invoice;
use App\Models\Crm\Payment;
use App\Models\Crm\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $invoiceTotals = [];
        $expenseTotals = [];
        $receiptTotals = [];
        $netProfits = [];
        $i = 0;
        $months = [];
        $monthCounter = 0;
        $fiscalYear = CompanySetting::getSetting('fiscal_year', $this->getCompanyId());
        $startDate = Carbon::now();
        $start = Carbon::now();
        $end = Carbon::now();
        $terms = explode('-', $fiscalYear);

        if ($terms[0] <= $start->month) {
            $startDate->month($terms[0])->startOfMonth();
            $start->month($terms[0])->startOfMonth();
            $end->month($terms[0])->endOfMonth();
        } else {
            $startDate->subYear()->month($terms[0])->startOfMonth();
            $start->subYear()->month($terms[0])->startOfMonth();
            $end->subYear()->month($terms[0])->endOfMonth();
        }

        if ($request->has('previous_year')) {
            $startDate->subYear()->startOfMonth();
            $start->subYear()->startOfMonth();
            $end->subYear()->endOfMonth();
        }

        while ($monthCounter < 12) {
            array_push(
                $invoiceTotals,
                Invoice::whereBetween(
                    'invoice_date',
                    [$start->format('Y-m-d'), $end->format('Y-m-d')]
                )
                    ->whereCompany($this->getCompanyId())
                    ->sum('total')
            );
            array_push(
                $expenseTotals,
                Expense::whereBetween(
                    'expense_date',
                    [$start->format('Y-m-d'), $end->format('Y-m-d')]
                )
                    ->whereCompany($this->getCompanyId())
                    ->sum('amount')
            );
            array_push(
                $receiptTotals,
                Payment::whereBetween(
                    'payment_date',
                    [$start->format('Y-m-d'), $end->format('Y-m-d')]
                )
                    ->whereCompany($this->getCompanyId())
                    ->sum('amount')
            );
            array_push(
                $netProfits,
                ($receiptTotals[$i] - $expenseTotals[$i])
            );
            $i++;
            array_push($months, $start->format('M'));
            $monthCounter++;
            $end->startOfMonth();
            $start->addMonth()->startOfMonth();
            $end->addMonth()->endOfMonth();
        }

        $start->subMonth()->endOfMonth();

        $salesTotal = Invoice::whereCompany($this->getCompanyId())
            ->whereBetween(
                'invoice_date',
                [$startDate->format('Y-m-d'), $start->format('Y-m-d')]
            )
            ->sum('total');
        $totalReceipts = Payment::whereCompany($this->getCompanyId())
            ->whereBetween(
                'payment_date',
                [$startDate->format('Y-m-d'), $start->format('Y-m-d')]
            )
            ->sum('amount');
        $totalExpenses = Expense::whereCompany($this->getCompanyId())
            ->whereBetween(
                'expense_date',
                [$startDate->format('Y-m-d'), $start->format('Y-m-d')]
            )
            ->sum('amount');
        $netProfit = (int)$totalReceipts - (int)$totalExpenses;

        $chartData = [
            'months' => $months,
            'invoiceTotals' => $invoiceTotals,
            'expenseTotals' => $expenseTotals,
            'receiptTotals' => $receiptTotals,
            'netProfits' => $netProfits,
        ];

        $customersCount = User::customer()->whereCompany($this->getCompanyId())->get()->count();
        $invoicesCount = Invoice::whereCompany($this->getCompanyId())->get()->count();
        $estimatesCount = Estimate::whereCompany($this->getCompanyId())->get()->count();
        $totalDueAmount = Invoice::whereCompany($this->getCompanyId())->sum('due_amount');
        $dueInvoices = Invoice::with('user')->whereCompany($this->getCompanyId())->where('due_amount', '>', 0)->take(5)->latest()->get();
        $estimates = Estimate::with('user')->whereCompany($this->getCompanyId())->take(5)->latest()->get();

        $data = [
            'dueInvoices' => $dueInvoices,
            'estimates' => $estimates,
            'estimatesCount' => $estimatesCount,
            'totalDueAmount' => $totalDueAmount,
            'invoicesCount' => $invoicesCount,
            'customersCount' => $customersCount,
            'chartData' => $chartData,
            'salesTotal' => $salesTotal,
            'totalReceipts' => $totalReceipts,
            'totalExpenses' => $totalExpenses,
            'netProfit' => $netProfit,
        ];

        return view('admin.crater.dashboard.index', $data);
    }
}
