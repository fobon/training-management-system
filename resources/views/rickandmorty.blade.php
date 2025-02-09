@extends('layouts.app')

@section('title', 'Rick and Morty API')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <p>Just fetching some data</p>

    <div class="mt-5">
        <h1 class="mb-4">Rick and Morty Characters</h1>
        <div class="col-md-4 mb-4">
            @foreach ($characters as $character)
                <div class="card">
                    <img src="{{  $character['image']  }}" class="card-img-top" alt="{{  $character['name']  }}">
                    <div class="card-body">
                        <h5 class="card-title">{{  $character['name']  }}</h5>
                        <p>

                            <strong></strong> {{  $character['status']  }}
                            <strong> - </strong> {{  $character['species']  }}<br>
                            <strong>Last known location :</strong> {{  $character['location']['name']  }}<br>
                            <strong>First seen in :</strong> {{  $character['origin']['name'] }}<br>

                        </p>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>


@endsection
