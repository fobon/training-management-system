<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Manualbook;

class ManualbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manualbooks = ManualBook::latest()->get();
        return view('manualbooks.index', compact('manualbooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manualbooks.create');
    }

    public function details(Manualbook $manualbook)
    {
        return view('manualbooks.details', compact('manualbook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'date' => 'required|date',
        ]);

        Manualbook::create
        ([
            'name' => $request->name,
            'detail' => $request->detail,
            'date' => $request->date,
        ]);

        return redirect()->route('manualbooks.index')->with('success', 'Manualbook has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manualbook $manualbook)
    {
        return view('manualbooks.show', compact('manualbook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manualbook $manualbook)
    {
        return view('manualbooks.edit', compact('manualbook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manualbook $manualbook)
    {
        $request->validate
        ([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'date' => 'required|date',
        ]);

        $manualbook->name = $request->name;
        $manualbook->detail = $request->detail;
        $manualbook->date = $request->date;
        $manualbook->save();

        return redirect()->route('manualbooks.index')->with('success', 'Manualbook has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manualbook $manualbook)
    {
        $manualbook->delete();
        return redirect()->route('manualbooks.index')->with('success', 'Manualbook has been deleted');
    }
}
