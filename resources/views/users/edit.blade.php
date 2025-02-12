{{-- USER EDIT --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>body {background-color : #DDD0C8 ; }</style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-lift mb-2">
                <h2>Edit User</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
            </div>

        </div>


        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                {{-- User Image --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Banner Image(Max 10MB - Leave empty if no changes)</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                {{-- Name --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Name (Not required to change):</strong>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">

                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Email (Not required to change):</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                {{-- Username --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Username (Not required to change):</strong>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username" >
                        @error('username')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Password (Not required to change):</strong>
                        <input type="password" name="password" class="form-control" placeholder="New Password">
                        @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password">
                        @error('password_confirmation')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
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

                {{-- Company --}}
                <div mb=3>
                    <div class="form-group">
                        <strong>Company:</strong>
                        <select name="company" class="form-control" required>
                            <option value="">Pick the company from below</option>
                            @foreach($companies as $company)
                                <option value="{{  $company->name }}" {{  $user->company == $company->name ? 'selected' : '' }}>{{  $company->name  }}</option>
                            @endforeach
                        </select>

                        @error('company')
                            <div class="alert alert-danger mt-1 mb-1">{{  $message  }}</div>
                        @enderror

                    </div>
                </div>

                {{-- Role --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Role:</strong>
                        <br>

                        {{-- Normal User --}}
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="roleNormal" value="Normal user" {{ $user->role == 'Normal user' ? 'checked' : '' }}>
                            <label class="form-check-label" for="roleNormal">Normal User</label>
                        </div>

                        {{-- Admin --}}
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="Admin" value="Admin" {{ $user->role == 'Admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="Admin">Admin</label>
                        </div>

                        @error('role')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
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
