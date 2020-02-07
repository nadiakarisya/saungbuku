<?php

namespace App\Http\Controllers;

//use http\Env\Request;
use App\Services\DashboardService;
use App\Services\EmailService;
use Http\Client\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $service = new DashboardService(Auth::user());
        $tahun = date("Y");

        return view('home');
    }
}
