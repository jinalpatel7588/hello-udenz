<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Enums\StatusEnum;
use App\Helpers\Helper;

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
        $this->middleware('guest')->except('logout', 'userLogout', 'userRegister', 'register', 'auth');
    }
    public function userRegister()
    {
        return view('auth.user-register');
    }

    public function register(Request $request)
    {


        $request->validate([
            'email' => ['unique:users,email'],
            'mobile_number' => ['unique:users,mobile_number'],
        ]);
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = Hash::make($request->password);
        $user['user_password'] = $request->password;
        $user['type'] = UserType::USER;
        $user['mobile_number'] = $request->mobile_number;
        User::create($user);


        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);
        $identity = $request->email;
        $password = $request->password;
        $type = $request->input("type");
        $check = $this->guard()->attempt([
            'email' => $identity,
            'password' => $password, 'type' => $type
        ]);

        if (!empty(Auth::user()->id)) {
            $url = Helper::getBaseUrl() . "room/add-user";
            $post = $request->all();
            $post['user_id'] = Auth::user()->id;
            $post['link'] = $request->link;
            $response = Helper::curlPostAPICall($post, $url);
            $response = json_decode($response);
            if ($response->status == StatusEnum::API_ERROR_STATUS) {
                return redirect()->back()->with('error', $response->message);
            } else {
                return redirect()->route('home');
            }
        }

        if ($check) {
            return redirect()->intended($this->redirectPath());
        } else {
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
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
            
            if ($type == UserType::USER) {
                if (Auth::user()->status == StatusEnum::DEACTIVE) {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Your Account is block by admin Please Contact to Admin.');
                } else {
                    dd("SAdsdas");
                    $user = User::find(Auth::user()->id);
                    $user->logged_in = StatusEnum::LOGIN;
                    $user->save();
                    
                    $url = Helper::getBaseUrl() . "room/add-user";
                    $post = $request->all();
                    $post['user_id'] = Auth::user()->id;
                    $post['link'] = $request->link;
                    $response = Helper::curlPostAPICall($post, $url);
                    $response = json_decode($response);
                    if ($response->status == StatusEnum::API_ERROR_STATUS) {
                        return redirect()->back()->with('error', $response->message);
                    } else {
                        
                        return redirect()->route('home');
                    }
                }
            }
            return redirect()->intended($this->redirectPath());
        } else {
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function userLogout(Request $request)
    {
        if (Auth::user()) {
            Auth::user()->logged_in = StatusEnum::LOGOUT;
            $this->guard()->logout();
            $request->session()->invalidate();
        }
        return redirect()->route('user.login');
    }
}
