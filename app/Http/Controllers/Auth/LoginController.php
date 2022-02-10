<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Set how many failed logins are allowed before being locked out.
     */
    public $maxAttempts = 3;

    /**
     * Set how many seconds a lockout will last.
     */
    public $decayMinutes = 20;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/auth/login');
    }

    public function redirectTo()
    {
        return '/admin';
    }
}
