{{-- USER EDIT --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}" enctype="multipart/form-data">Back</a>
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

                {{-- Name --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">

                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                {{-- Username --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Username:</strong>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username" >
                        @error('username')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                {{-- Password --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control" placeholder="New Password">
                        @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Confirm Password --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password">
                        @error('password_confirmation')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Phone Number --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone Number:</strong>
                        <input type="number" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="Phone Number">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                {{-- Company --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company:</strong>
                        <input type="text" name="company" value="{{ $user->company }}" class="form-control" placeholder="Company" >
                        @error('company')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                {{-- Role --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        <input type="text" name="role" value="{{ $user->role }}" class="form-control" placeholder="Role">
                        @error('role')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                {{-- DOB --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DOB:</strong>
                        <input type="date" name="DOB" value="{{ $user->DOB }}" class="form-control" placeholder="DOB">
                        @error('DOB')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}></div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
