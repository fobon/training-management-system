<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;


class UserController extends Controller
{


    public function index()
    {
        // $dd($request->all());
        $users = User::orderBy('id','desc')->paginate(10);
        // $users = User::with('company')->get();
        return view('users.index', compact('users'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $companies = Company::all();

        return view('users.create', compact('companies'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'username' => 'required|unique:users,username',
            'company' => 'required',
            'role' => 'required',
            'DOB' => 'required|date',
            'password' => 'required|confirmed|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $imagePath = $request->file('image')->store('users', 'public');

        User::create
        ([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'company' => $request->company,
            'role' => $request->role,
            'DOB' => $request->DOB,
            'password' => bcrypt($request->password), // hashing
            'image' => $imagePath,
        ]);

        return redirect()->route('users.index')->with('success','User has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\User $user
    * @return \Illuminate\Http\Response
    */
    public function edit(User $user)
    {

        $companies = Company::all();

        return view('users.edit',compact('user', 'companies'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // 'email' => ['required'|'email'|Rule::unique('email')->ignore($user->id)],
            'username' => 'required|unique:users,username,' . $user->id,
            // 'username' => ['required','email',Rule::unique('username')->ignore($user->id)],
            'phone' => 'required',
            'company' => 'required',
            'role' => 'required',
            'DOB' => 'required',
            'password' => 'nullable|confirmed|min:6',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $user->fill($request->except('password'));

        if($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('image'))
        {
            Storage::disk('public')->delete($user->image);
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }


        $user->save();
        // $dd($request->all());

        return redirect()->route('users.index')->with('success','User Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\User $user
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        Storage::disk('public')->delete($user->image);
        $user->delete();
        return redirect()->route('users.index')->with('success','User has been deleted successfully');
    }


}
