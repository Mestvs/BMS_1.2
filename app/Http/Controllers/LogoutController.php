<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession;
use Auth;
class LogoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Auth::logout();
        $this->middleware('guest')->except('logout');
        return redirect(route('home_page.home'));
           
    }
}
