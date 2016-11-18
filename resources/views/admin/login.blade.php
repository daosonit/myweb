<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DDS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('vendors/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('asset/plugins/iCheck/square/blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <div class="login-logo">
        <a href="#"><b>{{Config::get('son.site')}}</b></a>
    </div>
    <div class="login-box-body" style="border-radius: 3px;">
        <p class="login-box-msg">Hệ thống dành cho quản trị website</p>
        {!! Form::open(['route' => 'admin.post_login','method'=>'post','role'=>'form']) !!}

        <div class="form-group has-feedback">
            {!! Form::text('email', '',array('class'=>'form-control','placeholder'=>'E-mail...')) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span style="color: red;">{{ $errors->first('email') }}</span>
        </div>

        <div class="form-group has-feedback">
            {!! Form::password('password', array('class'=>'form-control','placeholder'=>'Mật khẩu...')) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <marquee style="color: red;"> {{ $errors->first('password') }}</marquee>
        </div>

        <div class="row">
            <div class="col-xs-12">
                {!! Form::submit('Đăng nhập', array('class'=>'btn btn-primary btn-block btn-flat')) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>

<!-- jQuery 2.2.3 -->
<link rel="stylesheet" href="{{asset('vendors/plugins/jQuery/jquery-2.2.3.min.js')}}">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="{{asset('vendors/bootstrap/js/bootstrap.min.js')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('vendors/plugins/iCheck/icheck.min.js')}}">

</body>
</html>
