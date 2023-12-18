<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>

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
            padding :2rem 1rem;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            text-align: center;
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

        a{
            margin-top: 15px;
            display: block;
        }

    </style>
</head>
<body>

    <div class="wrapper">
        <h1>Login</h1>
        <form action="/" method="post">
            @csrf
         <input name="taikhoan" type="text" placeholder="Tài Khoản"> <br>
          <input name="matkhau" type="password" placeholder="Mật Khẩu"> <br>
            <button type="submit">Đăng Nhập</button>
            <a href="/rester">Đăng Ký</a>


        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        </form>
    </div>

</body>
</html>
