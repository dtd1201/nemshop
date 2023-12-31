<?php

namespace App\Http\Controllers\Crater\General;

use App\Http\Controllers\Crater\Controller;
use App\Models\Crm\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $customers = User::where('role', 'customer')
            ->applyFilters($request->only(['search']))
            ->latest()
            ->paginate(10);

        if (Auth::user()->role == 'super admin') {
            $users = User::where('role', 'admin')
                ->applyFilters($request->only(['search']))
                ->latest()
                ->paginate(10);
        }

        return response()->json([
            'customers' => $customers,
            'users' => $users ?? [],
        ]);
    }
}
