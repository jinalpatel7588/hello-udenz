<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'userLogout');
    }
    public function userLogin()
    {
        return view('auth.user-login');
    }


    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);
        $identity = $request->input("email");
        $password = $request->input("password");
        $type = $request->input("type");
        $check = $this->guard()->attempt([
            'email' => $identity,
            'password' => $password, 'type' => $type
        ]);
        if ($check) {
            return redirect()->intended($this->redirectPath());
        } else {
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function userLogout(Request $request)
    {
        if (Auth::user()) {
            $this->guard()->logout();
            $request->session()->invalidate();
        }
        return redirect()->route('user.login');
    }
}
