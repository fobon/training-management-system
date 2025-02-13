{{-- USER INDEX --}}

@extends('layouts.Admin')

@section('title', 'User  Index')

@section('content')
<link rel="stylesheet" href="{{ asset('css/content.css') }}">
<style>

    .table {
        margin-top: 20px;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .table th {
        background-color: #007bff;
        color: white;
    }

    .table td {
        vertical-align: middle;
    }

    .table img {
        border-radius: 0.5rem;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .alert {
        margin-bottom: 20px;
    }

    .btn {
        margin-left: 10px;
    }
</style>

<div class="container mt-2">
    <div class="row">

        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('users.create') }}">Add User</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead">
            <tr>
                <th>Image</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Company</th>
                <th>Role</th>
                <th>Date of Birth</th>
                <th width="280px">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><img src="{{ asset('storage/' . $user->image) }}" width="100" alt="User  Image"></td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->company }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->DOB }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            <a class="btn btn-secondary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
</div>
@endsection
