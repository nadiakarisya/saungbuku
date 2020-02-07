<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('about/contact');
    }
}
