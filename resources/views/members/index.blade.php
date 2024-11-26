<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aplication members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-6">
                <h1>Members List</h1>
            </div>
            <div class="col-md-6">
                <h1>قاىمة الأعضاء</h1>
            </div>
        </div>

        <a href="{{route ('members.create')}}" class="btn btn-primary">add new member</a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Picture</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">Join Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
              <tr>
                <th scope="row">{{$member->id}}</th>
                <td>
                  @if ($member->picture)
                  <img src="{{asset('storage/'. $member->picture)}}" style="max-width: 50px" >
              
                  @endif
                </td>
                <td>{{$member->first_name}}</td>
                <td>{{$member->last_name}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->phone_number}}</td>
                <td>{{$member->join_date}}</td>
                <td>{{$member->status}}</td>
                <td>
                    <a href="{{route('members.show', $member->id)}}" class="btn btn-info">view</a>
                    <a href="{{route('members.edit', $member->id)}}" class="btn btn-warning">Edit</a>
                   <form action="{{route('members.destroy', $member->id)}}" method="POST"  style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm ('Are you Sure you want delete this member')" > Delete </button>
                   </form>
                </td>
              </tr>
              @endforeach 
            </tbody>
          </table>
    </div>


  

    {{-- @foreach ($members as $member)

    <tr>
        <td>{{$member->id}}</td>
        <td>{{$member->first_name}}</td>
        <td>{{$member->last_name}}</td>
        <td>{{$member->phone_number}}</td>
        <td>{{$member->status}}</td>
        <td>{{$member->join_date}}</td>
    </tr>
        
    @endforeach --}}
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>