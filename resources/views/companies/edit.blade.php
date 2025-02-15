{{-- Company Create --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Company Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>body {background-color : #DDD0C8 ; }</style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg 12 margin-tb">
                <div class="pull-lift mb-2">
                    <h2>Edit Company</h2>
                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('companies.index')}}">Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There are some problems with your input, please recheck</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('companies.update', $company->id)  }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Company Name --}}
            <div class="mb-3">
              <label for="name" class="form-label">Company Name</label>
              <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Company Name">
            </div>

            {{-- Company Code --}}
            <div class="mb-3">
                <label for="code" class="form-label">Company Code</label>
                <input type="text" name="code" class="form-control" id="code" aria-describedby="code" placeholder="Company Code">
              </div>

            {{-- Company Address --}}
            <div class="mb-3">
                <label for="address" class="form-label">Company Address</label>
                <input type="text" name="address" class="form-control" id="address" aria-describedby="address" placeholder="Company Address">
              </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>
</html>
