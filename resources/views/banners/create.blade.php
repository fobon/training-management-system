{{-- BANNER CREATE --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Table Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>body {background-color : #DDD0C8 ; }</style>
    </head>

    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg 12 margin-tb">
                    <div class="pull-lift mb-2">
                        <h2>Add Banner</h2>
                    </div>

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('banners.index')}}">Back</a>
                    </div>
                </div>
            </div>

            <form action="{{ route('banners.store')  }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Banner Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Banner Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                {{-- Banner Image (10 MB Max) --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image (Max 10 MB)</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </body>

</html>
