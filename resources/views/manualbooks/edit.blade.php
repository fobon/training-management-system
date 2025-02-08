{{-- Manualbook Create --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Manualbook Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg 12 margin-tb">
                <div class="pull-lift mb-2">
                    <h2>Edit Manualbook</h2>
                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manualbooks.index')}}">Back</a>
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

        <form action="{{ route('manualbooks.update', $manualbook->id)  }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="name" class="form-label">Manualbook Name</label>
              <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Name" value="{{  old('name', $manualbook->name)}}">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Manualbook Date</label>
                <input type="date" name="date" class="form-control" id="date" aria-describedby="date" placeholder="Date" value="{{  old('date', $manualbook->date)  }}">
              </div>

            <div class="mb-3">
                <label for="detail" class="form-label">Manualbook Description</label>
                <input type="text" name="detail" class="form-control" id="detail" aria-describedby="detail" placeholder="Description" value="{{ old('detail', $manualbook->detail)  }}">
                {{-- <div id="companyAddress" class="form-text">Double check if your address is right</div> --}}
              </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>
</html>
