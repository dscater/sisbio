<?php

namespace sisbio\Http\Controllers\Auth;

use sisbio\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use sisbio\Empresa;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $empresa = Empresa::get()->first();
        return view('auth.login',compact('empresa'));
    }

    public function username()
    {
        return 'name';
    }
}
