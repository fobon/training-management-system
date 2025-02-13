<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index () {
        $user = Auth::user();

        return view('profiles.index' , compact('user'));
    }

    public function normalProfile () {
        $user = Auth::user();

        return view('normaluser.normalprofile' , compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        $request->validate([
            'username' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
            'DOB' => 'required',
            'phone' => 'required',
        ]);

        // Updatable profile data
        $user->username = $request->username;
        $user->DOB = $request->DOB;
        $user->phone = $request->phone;

        // Unupdatable profile data
        $user->name = $user->name;
        $user->company = $user->company;
        $user->role = $user->role;
        $user->email = $user->email;
        $user->password = $user->password;
        $user->image = $user->image;

        if($request->hasFile('image'))
        {
            Storage::disk('public')>delete($user->image);
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->route('profiles.index')->with('success', 'Your profile has been updated.');
    }

}
