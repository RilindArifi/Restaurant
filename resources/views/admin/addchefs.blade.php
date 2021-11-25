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
            margin-top: 100px;
            padding: 50px;

        }
        .form-control{
            margin-bottom: 25px;
            color: black;
        }


    </style>
</head>
<body>

@include('admin.navbar')
@include('admin.sidebar')
<div class="container-fluid page-body-wrapper">
    <div class="container ">
        <form class="form border-2" action="{{url('addchefs')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="title1">Add Chefs</h1>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter a Chefs name" >
            </div>
            <div class="form-group">
                <label for="speciality">Speciality</label>
                <input type="text" name="speciality" class="form-control" placeholder="Enter a Speciality" >
            </div>
            <div class="form-group">
                <label for="title">Facebook</label>
                <input type="text" name="facebook" class="form-control" placeholder="Enter a facebook address">
            </div>
            <div class="form-group">
                <label for="title">Twitter</label>
                <input type="text" name="twitter" class="form-control" placeholder="Enter a Twitter address">
            </div>
            <div class="form-group">
                <label for="title">Instagram</label>
                <input type="text" name="instagram" class="form-control" placeholder="Enter a Instagram address">
            </div>
            <div class="form-group">
                <label for="title">Image Chefs</label><br>
                <input type="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary mt-3 p-3 my-3" >Add Chefs</button>
        </form>
    </div>
</div>

@include('admin.script')

</body>
</html>




