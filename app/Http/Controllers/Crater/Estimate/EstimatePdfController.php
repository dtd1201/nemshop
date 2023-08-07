<?php

namespace App\Http\Controllers\Crater\Estimate;

use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\Estimate;

class EstimatePdfController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Estimate $estimate)
    {
        return $estimate->getGeneratedPDFOrStream('estimate');
    }
}
