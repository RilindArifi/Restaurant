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
            margin-top: 70px;
            margin-bottom: 70px;
            padding: 50px;

        }
        .form-control{
            margin-bottom: 25px;
            color: black;
        }
        .menu{
            margin-top: 100px;
            margin-right: auto;
        }


    </style>
</head>
<body>
@include('admin.sidebar')
@include('admin.navbar')



<div class="container-fluid page-body-wrapper">
    <div class="container ">

        <form class="form border-2" action="{{(url('uploadmenu'))}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="title1">Add Food Menu</h1>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="form-group">
                <label for="title">Menu Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter a menu title">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter a menu title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter a description">
            </div>
            <div class="form-control-file">
                <label for="file">Image Menu</label><br>
                <input type="file" name="file" class="mb-3">
            </div>
            <button type="submit" class="btn btn-primary mt-3 p-3 my-3" >Add Food Menu </button>
        </form>


    </div>

</div>

@include('admin.script')
</body>
</html>

