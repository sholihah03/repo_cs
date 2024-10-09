<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexCs()
    {
        // return view('cs.layouts.inde');
        return view('cs.layouts.index');
    }
}
