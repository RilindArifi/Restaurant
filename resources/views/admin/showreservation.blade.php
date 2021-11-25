<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .container{
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        td{
            color: white;
            background-color: #0c5460;
        }
    </style>
</head>
<body>

@include('admin.sidebar')
@include('admin.navbar')
<div class="container-fluid page-body-wrapper">
    <div class="container">
        <div class="col">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                </div>
            @endif
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Guest</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $dataRes)
                    <tr>
                        <td>{{$dataRes->name}}</td>
                        <td>{{$dataRes->email}}</td>
                        <td>{{$dataRes->phone}}</td>
                        <td>{{$dataRes->guest}}</td>
                        <td>{{$dataRes->date}}</td>
                        <td>{{$dataRes->time}}</td>
                        <td>{{$dataRes->message}}</td>
                        <td><a href="{{url('deletereservation',$dataRes->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@include('admin.script')

</body>
</html>

