<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href={{asset("/css/ch-ui.admin.css")}}>
    <link rel="stylesheet" href={{asset("/font/css/font-awesome.min.css")}}>
</head>
<body style="background:#F3F3F4;">
<div class="login_box">
    <h1>Blog</h1>
    <h2>欢迎使用博客管理平台</h2>
    <div class="form">
        @if (Session::get("error"))
            <p style="color:red">{{Session::get("error")}}</p>
        @endif
        <form action={{route("login/validate")}} method="post">
            {{csrf_field()}}
            <ul>
                <li>
                    <input type="text" name="login_name" class="text" value={{old("login_name")}}>
                    <span><i class="fa fa-user"></i></span>
                    @if ($errors->has("login_name"))
                        <div style="color:red">{{$errors->first("login_name")}}</div>
                    @endif
                </li>
                <li>
                    <input type="password" name="pwd" class="text"/>
                    <span><i class="fa fa-lock"></i></span>
                    @if ($errors->has("pwd"))
                        <div style="color:red">{{$errors->first("pwd")}}</div>
                    @endif
                </li>
                <li>
                    <input type="text" class="code" name="code"/>
                    <span><i class="fa fa-check-square-o"></i></span>
                    <img src={{route("login/captcha")}} onclick="this.src='{{route('login/captcha')}}?a='+Math.random()">
                    @if ($errors->has("code"))
                        <div style="color:red">{{$errors->first("code")}}</div>
                    @endif
                </li>
                <li>
                    <input type="submit" value="立即登陆"/>
                </li>
            </ul>
        </form>
        <p>&copy; 2016 Powered by </p>
    </div>
</div>
</body>
</html>