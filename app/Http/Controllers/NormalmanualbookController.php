<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Manualbook;

class NormalmanualbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manualbooks = ManualBook::latest()->get();
        return view('normaluser.normalmanualbook', compact('manualbooks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manualbook $Manualbook)
    {
        return view('normaluser.normalmanualbook.details', compact('manualbook'));
    }
}
