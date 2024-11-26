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
        <div class="d-flex justify-content-center align-items-center">
            <div class="card" style="width: 18rem;">
                @if($member->picture)
                <img src="{{asset('storage/'. $member->picture)}}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                   <p><strong>first name : </strong>{{ $member->first_name }}</p>
                   <p><strong>last name : </strong>{{ $member->last_name }}</p>
                   <p><strong>email : </strong>{{ $member->email }}</p>
                   <p><strong>phone number : </strong>{{ $member->phone_number }}</p>
                   <p><strong>join date : </strong>{{ $member->join_date }}</p>
                   <p><strong>status : </strong>{{ $member->status }}</p>
                   <a href="{{route('members.edit',$member->id)}}" class="btn btn-warning">Edit</a>
                   <a href="{{route ('members.index')}}" class="btn btn-danger">back to list member</a>
                </div>
            </div>
        </div>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
