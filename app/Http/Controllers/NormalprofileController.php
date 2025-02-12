<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class NormalprofileController extends Controller
{
    public function index () {
        $user = Auth::user();

        return view('normaluser.normalprofile' , compact('user'));
    }
}
