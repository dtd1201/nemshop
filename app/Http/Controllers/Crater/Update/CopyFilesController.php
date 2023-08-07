<?php

namespace App\Http\Controllers\Crater\Update;

use App\Http\Controllers\Crater\Controller;
use Crater\Space\Updater;
use Illuminate\Http\Request;

class CopyFilesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'path' => 'required',
        ]);

        $path = Updater::copyFiles($request->path);

        return response()->json([
            'success' => true,
            'path' => $path,
        ]);
    }
}
