<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function normalHome()
    {
        $user = Auth::user();
        return view('normaluser.normalhome', compact('user'));
    }
}

