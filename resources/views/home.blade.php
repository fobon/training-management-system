@extends('layouts.' . $user->role)

@section('title', 'Home')

@section('content')
    <p>This is the homepage content. You can add more information here.</p>
    <div><strong>Welcome to the home page {{ $user->username }}</strong></div>
@endsection
