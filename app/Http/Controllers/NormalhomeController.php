<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalhomeController extends Controller
{
    public function index() {
        return view('normaluser.normalhome');
    }
}

