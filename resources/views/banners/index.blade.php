{{-- BANNER INDEX --}}

@extends('layouts.app')

@section('title', '')

@section('content')
    <div class="container">
        <h1>Banner Index</h1>
        <a href={{ route("banners.create")  }} class="btn btn-primary mb-3">Add Banner</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    {{-- <th>Link</th> --}}
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>

            @foreach ($banners as $banner)
            <tr>
                <td>{{  $banner->name  }}</td>
                {{-- <td><a href="{{  $banner->link  }}" target="_blank">View</a></td> --}}
                <td><img src="{{ asset('storage/' . $banner->image)  }}" width="100"></td>
                <td>
                    <a href="{{  route('banners.edit', $banner->id)  }}" class="btn btn-secondary">Edit</a>
                    <form action="{{  route('banners.destroy', $banner->id)  }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-banner">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <script src="{{ asset('js/banner.js')  }}"></script>
@endsection

