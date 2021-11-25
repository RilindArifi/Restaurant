<!DOCTYPE html>
<html lang="en">
<head>
    <style>

        td{
            color: white;
            background-color: #0c5460;
        }
    </style>
    @include('admin.css')
</head>
<body>
<div class="container">
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="container-fluid page-body-wrapper mt-5">
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
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>

                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $users)
                        <tr>
                            <td>{{$users->id}}</td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>

                           @if($users->usertype =='0')
                                <td><a href="{{url('delete_users',$users->id)}}" class="btn btn-success" onclick="return confirm('Are you sure')">Delete</a></td>
                            @else
                                <td><a  class="btn btn-light" >Not Allowed</a></td>
                           @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.script')
</body>
</html>
