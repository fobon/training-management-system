{{-- Manualbook View --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Manualbook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg 12 margin-tb">
                <div class="pull-lift mb-2">
                    <h1 href=$manualbook><br>Manualbook Details</h2>
                </div>


                    <div>
                        <br><br>
                        <h2>{{  $manualbook->name  }}</h1>
                        <h4>{{  $manualbook->detail  }}</h3>
                        <br><br>
                    </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manualbooks.index')}}">Back</a>
                </div>
            </div>
        </div>

</body>
</html>
