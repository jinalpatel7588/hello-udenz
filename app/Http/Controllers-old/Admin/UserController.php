<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\ChatRoom;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('name')->where('type', UserType::USER)->paginate(25);
        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['unique:users,email'],
        ]);
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = Hash::make($request->password);
        $user['user_password'] = $request->password;
        $user['type'] = UserType::USER;
        User::create($user);
        return redirect()->route('admin.users.index')->with('success', 'User Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'email' => [Rule::unique('users')->ignore($user->email, 'email')],
        ]);
        $user = User::find($user->id);
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->user_password = $request->password;
        $user->save();
        return redirect()->route('Pindex')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(["status" => 200, "message" => "Chapter Deleted"]);
    }


    public function login($id)
    {
        $user = User::where('id', $id)->first();
        $customerInfo = array('email' => $user->email);
        if ($user != null) {
            auth()->login($user, true);
            return redirect()->route('user.chat.index');
        } else {
            return redirect()->back();
        }
    }

    // public function chatroom()
    // {
    //     $users = ChatRoom::paginate(25);
    //     return view('pages.admin.chatroom.chatroom', compact('users'));
    // }

    // public function messages($id)
    // {

    // }
}
