<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Home</title>


    <style>
        *{

            margin: 0px;
            padding:0px;
            box-sizing: border-box;
        }

        form{
            height: 90vh;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <h1 style="color:#fff;">Blogs</h1>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/rester"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="/addblog"><span class="glyphicon glyphicon-log-in"></span> Add Blogs</a></li>
          </ul>
        </div>
      </nav>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
                {{session('error')}}
        </div>

        @endif
    <form action="/delete-selected" method="post">
        @csrf
        <div class="table-responsive">
       <table class="table">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Staus</th>
            <th>Sửa</th>
            <th>Xoá</th>
            <th>Chọn</th>
            <th><input id="select_all" type="checkbox">Chọn tất cả</th>
        </thead>
        <tbody>
            @foreach ($blog as $item)
            <tr>
           <td>{{$item->id}}</td>
           <td>{{$item->name}}</td>
           <td>{{$item->slug}}</td>
           <td>{{$item->status}}</td>
           <td><a class="btn btn-primary " href="/update?id={{$item->id}}">Update</a></td>
           <td><a class="btn btn-danger  " href="{{'/delete/' .$item->id}}">Delete</a></td>
           <td><input value="{{$item->id}}" class="checkbox_id" name="ids[{{$item->id}}]"  type="checkbox"></td>
        </tr>
           @endforeach
        </tbody>
       </table>
        <button class="btn btn-danger " id="select_all" type="submit">Delete Seleted</button>
    </form>
</div>

    <script>
                 $(document).ready(function(){
            $('#select_all').change(function(){
                let selectAll = $(this).prop('checked');
                $('.checkbox_id').prop('checked', selectAll);
            });

        });
    </script>

</body>
</html>
