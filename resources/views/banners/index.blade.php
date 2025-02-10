{{-- BANNER INDEX --}}

@extends('layouts.app')

@section('title', 'Banner Index')

@section('content')
<link rel="stylesheet" href="{{ asset('css/content.css') }}">
<style>
    .container {
        margin-top: 20px;
    }

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

    .btn {
        margin-right: 5px;
    }
</style>

{{-- <div class="container">
    <h1>Banner Index</h1>
    <a href="{{ route('banners.create') }}" class="btn btn-primary mb-3">Add Banner</a> --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->name }}</td>
                    <td><img src="{{ asset('storage/' . $banner->image) }}" width="100" alt="Banner Image"></td>
                    <td>
                        <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-banner">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="{{ asset('js/banner.js') }}"></script>
@endsection
