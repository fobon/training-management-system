<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate
        ([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors
        ([
            'email' => 'Your email or password is wrong',
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
