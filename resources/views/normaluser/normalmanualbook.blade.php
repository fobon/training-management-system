{{-- Manualbook Index --}}

@extends('layouts.normalapp')

@section('title', '')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <h2>Manualbook Index</h2>
        </div><br>

        <div class="container mt-2">
            <div class="row">
                @foreach($manualbooks as $manualbook)
                    <div class="col-md-3 mb-3"> <!-- Adjust the column size as needed -->
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-name">{{ $manualbook->name }}</h5>
                                <p class="card-date">Created at : {{ $manualbook->created_at }}</p>
                                <form action="{{ route('manualbooks.destroy', $manualbook->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('manualbooks.details', $manualbook->id) }}">Details</a>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
