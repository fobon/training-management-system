{{-- Companies Index --}}

@extends('layouts.app')

@section('title', 'Manualbook Index')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <h2>Manualbook Data</h2>
        </div>

        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('manualbooks.create')  }}">Add Manualbook</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Details</th>
                    <th>Event Date</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($manualbooks as $manualbook)
                <tr>
                    <td>{{ $manualbook->name }}</td>
                    <td>{{ $manualbook->detail }}</td>
                    <td>{{ $manualbook->date}} </td>
                    <td>
                        <form action="{{ route('manualbooks.destroy', $manualbook->id) }}" method="Post">
                            <a class="btn btn-secondary" href={{ route('manualbooks.edit', $manualbook->id) }}>Edit</a>
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
