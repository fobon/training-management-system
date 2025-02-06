<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h2>Laravel 9 CRUD</h2>
            </div>

            <div class="pull-right mb-2">
                <a class="btn btn-success" href ="{{ route('users.create') }}"> Create User</a>
            </div>

            <div class="pull-right mb-2">
                <a class="btn" href="./">Home</a>
            </div>

        </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
                <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Company</th>
                <th>Role</th>
                <th>Date of Birth</th>
                <th width="280px">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr></tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone}}</td>
                <td>{{ $user->company }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->DOB }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="Post">
                        <a class="btn btn-primary" href={{ route('users.edit', $user->id) }}>Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>
</body>
</html>
