{{-- USER EDIT --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>body {background-color : #DDD0C8 ; }</style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-lift mb-2">
                <h2>Edit Profile</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('profiles.index') }}">Back</a>
            </div>

        </div>


        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('profiles.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                {{-- User Image --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Profile Picture (Max 10MB - Leave empty if no changes)</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                {{-- Name --}}
                <div class="mb-3">
                    <div class="form-group">
                        <label for="disabledTextInput" class="form-label"><strong>Name: (Cannot change)</strong></label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="{{  $user->name  }}" readonly>
                    </div>
                </div>

                {{-- Username --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Username:</strong>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username" >
                        @error('username')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                {{-- Company --}}
                <div mb=3>
                    <div class="form-group">
                        <label for="disabledTextInput" class="form-label"><strong>Company: (Cannot change)</strong></label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="{{  $user->company  }}" readonly>
                    </div>
                </div>

                {{-- Role --}}
                <div mb=3>
                    <div class="form-group">
                        <label for="disabledTextInput" class="form-label"><strong><br>Role: (Cannot change)</strong></label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="{{  $user->role  }}" readonly>
                    </div>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <div class="form-group">
                        <label for="disabledTextInput" class="form-label"><strong><br>Email: (Cannot change)</strong></label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="{{  $user->email  }}" readonly>
                    </div>
                </div>

                {{-- Phone Number --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Phone Number:</strong>
                        <input type="number" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="Phone Number">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                {{-- DOB --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>DOB:</strong>
                        <input type="date" name="DOB" value="{{ $user->DOB }}" class="form-control" placeholder="DOB">
                        @error('DOB')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>
</html>

