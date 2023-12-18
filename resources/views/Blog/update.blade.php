<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Add Blogs</title>
    <style>
               *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        body{
           background: #dfe9f5;
        }
        .wrapper{
            width: 330px;
            padding :2rem 2rem;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow:0 20px 35px rgba(0,0,0,0.1);
        }
        h1{
            font-size: 2rem;
            color:#07001f;
            margin-bottom: 1.2rem;
        }
        form input{
            width: 92%;
            outline: none;
            border :1px solid #fff;
            padding:12px 20px;
            margin-bottom:10px;
            border-radius: 20px;
            background: #e4e4e4;
        }
        button {
            font-size:1rem;
            margin-top:1.8rem;
            padding:10px 0;
            border-radius: 20px;
            outline:none;
            border:none;
            background: rgb(17,107,143);
            color:#fff;
            cursor: pointer;
            width:90%;
        }

        button:hover{
            background:rgba(17,107,143,0.877);
        }
        input:focus{
             border:1px solid rgb(192,192,192);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <h1 style="color:#fff;"> Update-Blogs</h1>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/homepage"><span class="glyphicon glyphicon-log-in"></span>Home Page</a></li>
          </ul>
        </div>
      </nav>
      <div class="wrapper">
      <form action="/updateblog/{{$id}}" method="post">
        @csrf

        <label>Tên Blogs :</label>
     <input name="nameblog" type="text" placeholder="Blog"><br>
         <label >Status : </label>
      <input name="status" type="text" placeholder="Active or inactive or pending"><br>
        <button type="submit">Thêm Blogs</button> <br>
        @if(session('success'))
        <div class="alert alert-success">
                {{session('success')}}
        </div>

        @endif
        @if(session('error'))
        <div class="alert alert-danger">
                {{session('error')}}
        </div>

        @endif

    </div>

    </form>
</div>
</body>
</html>
