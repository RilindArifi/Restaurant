<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.css')
    <style>
        .container{
            display: flex;
            justify-content: center;
        }
        .title1{
            color: white;
            margin-bottom: 40px;
            font-size: 35px;
            font-weight: bold;
        }
        .form{
            margin-top: 50px;
            padding: 50px;

        }
        .form-control{
            margin-bottom: 25px;
            color: black;
        }


    </style>
</head>
<body>

@include('admin.sidebar')
@include('admin.navbar')

<div class="container-fluid page-body-wrapper">
    <div class="container ">
        <form class="form border-2" action="{{url('edit_chefs',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="title1">Edit Chefs</h1>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="name" class="form-control" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="price">Speciality</label>
                <input type="text" name="speciality" class="form-control" value="{{$data->speciality}}">
            </div>
            <div class="form-group">
                <label for="title">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{$data->facebook}}">
            </div>
            <div class="form-group">
                <label for="title">Twitter</label>
                <input type="text" name="twitter" class="form-control" value="{{$data->twitter}}">
            </div>
            <div class="form-group">
                <label for="title">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="{{$data->instagram}}">
            </div>
            <div class="form-group">
                <label for="title">Old image</label>
                <img height="150px" width="150px" src="/chefsimage/{{$data->image}}" alt=""><br><br><br>
            </div>
            <div class="form-control-file">
                <label for="title">Change the image</label><br>
                <input type="file" name="file" class="mb-3">
            </div>
            <button type="submit" class="btn btn-primary mt-3 p-3 my-3" >Edit Menu</button>
        </form>
    </div>
</div>

@include('admin.script')

</body>
</html>



