{{-- Manualbook Index --}}

@extends('layouts.app')

@section('title', 'Manualbook Index')

@section('content')

    <div class="container mt-2">
        {{-- <div class="row">
            <h2>Manualbook Index</h2>
        </div><br> --}}


        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('manualbooks.create')  }}">Add Manualbook</a>
        </div><br>

        <div class="container mt-2">
            <div class="row">
                @foreach($manualbooks as $manualbook)
                    <div class="col-md-3 mb-3"> <!-- Adjust the column size as needed -->
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-name">{{ $manualbook->name }}</h5>
                                <p class="card-date">Created at : {{ $manualbook->created_at }}</p><br>
                                <form action="{{ route('manualbooks.destroy', $manualbook->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('manualbooks.details', $manualbook->id) }}">Details</a>
                                    <a class="btn btn-secondary" href="{{ route('manualbooks.edit', $manualbook->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
