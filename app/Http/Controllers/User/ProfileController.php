<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(User $user)
    {
        return view('pages.user.profile.edit', compact('user'));
    }

    public function ChangePass(User $user)
    {
        return view('pages.user.profile.change-pass');
    }
    public function updatePass(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required|password',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            if (Auth::user()) {
                Auth::logout();
            }
            return redirect()->route('home')->with('success', 'Password updated successfully.');
        } else {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            //'mobile_number' => [Rule::unique('users')->ignore($user->mobile_number, 'mobile_number')],
            'mobile_number' => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ],
        ]);
        $user = User::find($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        if (isset($request->photo)) {
            if (Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }
            $image = $request->file('photo');
            $mediaPath = Storage::put('/profile', $image, 'public');
            $user->photo = $mediaPath;
        }
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename =  'profile-' . time() . '_' . Helper::randomString() . '.' . $ext;
            $filepath = 'upload/' . $filename;
            $file->move('upload/', $filename);
            if (file_exists($user->photo)) {
                unlink($user->photo);
            }
            $user->photo =  $filepath;
        }
        $user->save();
        return redirect()->route('user.chat.index')->with('success', 'Profile Updated');
    }
}
