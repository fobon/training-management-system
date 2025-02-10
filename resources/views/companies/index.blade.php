{{-- Companies Index --}}

@extends('layouts.app')

@section('title', 'Company Index')

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

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .alert {
        margin-bottom: 20px;
    }

    .btn {
        margin-right: 5px;
    }
</style>

<div class="container mt-2">
    <div class="row">
        {{-- <div class="col-lg-12 margin-tb">
            <h2>Company Index</h2>
        </div> --}}

        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('companies.create') }}">Add Company</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Company Code</th>
                <th>Address</th>
                <th width="280px">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->code }}</td>
                    <td>{{ $company->address }}</td>
                    <td>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                            <a class="btn btn-secondary" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
