{{-- Companies Index --}}

@extends('layouts.app')

@section('title', 'Companies Index')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <h2>Company Data</h2>
        </div>

        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('companies.create')  }}">Add Company</a>
        </div>

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
                    <td>{{ $company->address}} </td>
                    <td>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="Post">
                            <a class="btn btn-secondary" href={{ route('companies.edit', $company->id) }}>Edit</a>
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
