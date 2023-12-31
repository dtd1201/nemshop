<?php

namespace App\Http\Controllers\Crater\Onboarding;

use App\Http\Controllers\Crater\Controller;
use Illuminate\Http\Request;

class FinishController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        \Storage::disk('local')->put('database_created', 'database_created');

        return response()->json(['success' => true]);
    }
}
