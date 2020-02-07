<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index()
    {
        return view('about/log');
    }
}
