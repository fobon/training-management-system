{{-- EDIT BANNER --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Banner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>body {background-color : #DDD0C8 ; }</style>
</head>

<body>
    <div class="container mt-2">
        <div class=row>
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">>
                    <h2>Edit Banner</h2>
                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('banners.index')  }}">Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There are some problems with your input, please recheck</strong><br><br>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
        @endif

        <form action="{{ route('banners.update', $banner->id)  }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            {{-- Banner Name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Banner Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $banner->name }}" required>
            </div>

            {{-- Banner Image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Banner Image(Max 10MB - Leave empty if no changes)</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary ml-3">Update</button>
        </form>
    </div>
</body>
</html>
