<?php

namespace App\Http\Controllers\Crater\General;

use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\Currency;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $currencies = Currency::latest()->get();

        return response()->json([
            'currencies' => $currencies,
        ]);
    }
}
