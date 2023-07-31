<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->type == UserType::ADMIN) {
                $users = User::where('type',UserType::USER)->count();
                return view('pages.admin.dashboard', compact( 'users',));
            } else {
                return redirect()->route('user.chat.index');
            }
        } else {
            return view('home');
        }
    }
}
