<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Members</h1>
            </div>
            <div class="col-md-6">
                <h1>اضافة الأعضاء</h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">first name: </label>
                <input type="text" name="first_name" class="form-control" id="first_name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">last name: </label>
                <input type="text" name="last_name" class="form-control" id="last_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone number: </label>
                <input type="text" name="phone_number" class="form-control" id="phone_number">
            </div>
            <div class="mb-3">
                <label for="join_date" class="form-label">join date: </label>
                <input type="date" name="join_date" class="form-control" id="join_date">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status: </label>
                <input type="text" name="status" class="form-control" id="status">
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">picture: </label>
                <input type="file" name="picture" class="form-control" id="picture">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Back to list</a>
        </form>


    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
