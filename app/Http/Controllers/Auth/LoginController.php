<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use AuthenticatesUsers {
        logout as performLogout;
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $username = strtoupper($request->get('username'));
        $password = $request->get('password');

        $user = new User();

        if ($user->login($username, $password)) {
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with("error", true);
        }
    }

    public function login()
    {
        if(Auth::user()) {
            return redirect()->route("home");
        }
        else {
            return view('auth/login');
        }
    }

    public function logout(Request $request)
    {
        Cache::forget('sidebar-' . Auth::user()["groupid"]);

        Auth::logout();

        return redirect()->route('login');
    }
}

