<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Mail\MyMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->type == UserType::ADMIN) {
                // dd('hi');
                // Mail::to('testingdata.demo@gmail.com')->send(new MyMail());
                $users = User::where('type', UserType::USER)->count();
                return view('pages.admin.dashboard', compact('users',));
            } else {
                return redirect()->route('user.chat.index');
            }
        } else {
            return view('home');
        }
    }
    public function Home()
    {
        
        return view('home');
    }
}