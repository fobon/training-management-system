{{-- BANNER CREATE --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Table Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

                {{-- Image URL --}}
                {{-- <div class="mb-3">
                    <label for="image_url" class="form-label">Image URL</label>
                    <input type="url" name="image_url" id="image_url" class="form-control">
                </div> --}}

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </body>

</html>
