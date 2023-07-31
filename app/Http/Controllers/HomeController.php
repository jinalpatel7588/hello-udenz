<?php

namespace App\Http\Controllers;

use App\Models\WaitingList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function ApplyWaitingList(Request $request){

        $waiting = new WaitingList();

        $waiting->waitingEmail = $request->waitingEmail;

        $waiting->save();

        return redirect()->back()->with('success',"Your email has been submitted successfully");
    }

    public function waitingList(Request $request){

        $waitingList = WaitingList::paginate(25);
        return view('pages.admin.waiting-list.index',compact('waitingList'));
    }

}
