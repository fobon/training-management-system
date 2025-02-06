<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('users.create');
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
        ]);

        // User::create($request->post());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'company' => $request->company,
            'role' => $request->role,
            'DOB' => $request->DOB,
            'password' => bcrypt($request->password), // hashing
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
        return view('users.edit',compact('user'));
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
            'email' => 'required|email|unique:users,email', //['required','email',Rule::unique('email')->ignore($user->id)],
            'phone' => 'required',
            'username' => 'required|unique:users,username', //['required','email',Rule::unique('username')->ignore($user->id)],
            'company' => 'required',
            'role' => 'required',
            'DOB' => 'required',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user->fill($request->except('password'));

        if($request->filled('password')) {
            $user->password = bcrypt($request->passsword);
        }

        $user->save();

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
        $user->delete();
        return redirect()->route('users.index')->with('success','User has been deleted successfully');
    }

}
