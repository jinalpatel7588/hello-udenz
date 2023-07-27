<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(User $user)
    {
        return view('pages.user.profile.edit', compact('user'));
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
        $user->save();
        return redirect()->route('user.chat.index')->with('success', 'Profile Updated');
    }
}
