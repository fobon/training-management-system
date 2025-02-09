{{-- Manualbook Create --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Manualbook Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>body {background-color : #DDD0C8 ; }</style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg 12 margin-tb">
                <div class="pull-lift mb-2">
                    <h2>Add Event / Manual Book</h2>
                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manualbooks.index')}}">Back</a>
                </div>
            </div>
        </div>

        <form action="{{ route('manualbooks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Event Title</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Event Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Description</label>
                <textarea class="form-control" id="detail" name="detail" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Event</button>
        </form>
    </div>

</body>
</html>
