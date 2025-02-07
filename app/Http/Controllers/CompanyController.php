<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->get();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        Company::create
        ([
            'name' => $request->name,
            'code' => $request->code,
            'address' => $request->address,
        ]);

        return redirect()->route('companies.index')->with('success', 'User has been created');
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        // @dd($request->all);
        $request->validate
        ([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $company->name = $request->name;
        $company->code = $request->code;
        $company->address = $request->address;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company has been updated successfully');
    }

    public function destroy(Company $company)
    {
        Storage::disk('public')->delete($company->code);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'User has been deleted');
    }


}
