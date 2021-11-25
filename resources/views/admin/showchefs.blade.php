<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>

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
    <div class="container mt-5">
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
                    <th scope="col">Speciality</th>
                    <th scope="col">Facebook</th>
                    <th scope="col">Twitter</th>
                    <th scope="col">Instagram</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $chefs)
                    <tr>
                        <td>{{$chefs->name}}</td>
                        <td>{{$chefs->speciality}}</td>
                        <td>{{$chefs->facebook}}</td>
                        <td>{{$chefs->twitter}}</td>
                        <td>{{$chefs->instagram}}</td>
                        <td><img style="height: 80px; width: 80px; " src="/chefsimage/{{$chefs->image}}" alt=""></td>
                        <td><a href="{{url('show_edit_chefs', $chefs->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('delete_chefs',$chefs->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{--@include('admin.addchefs')--}}
@include('admin.script')

</body>
</html>
