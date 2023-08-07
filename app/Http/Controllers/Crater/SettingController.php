<?php

namespace App\Http\Controllers\Crater;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Psy\debug;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Mail Configuration'
        ];
        return view('admin.crater.settings.index', $data);
    }

    public function main()
    {
        $data = [
            'title' => 'Mail Configuration'
        ];
        return view('admin.crater.settings.mail', $data);
    }

}
