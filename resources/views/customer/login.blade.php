<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
<head>
    <title>Dang nhap</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" media="screen" href="{{asset_customer('css/bootstrap.min.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset_customer('css/bootstrap-theme.min.css')}}">

    <!-- Bootstrap Admin Theme -->
    <link rel="stylesheet" media="screen" href="{{asset_customer('css/bootstrap-admin-theme.css')}}">

    <!-- Custom styles -->
    <style type="text/css">
        .alert {
            margin: 0 auto 20px;
        }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{asset_customer('js/html5shiv.js')}}"></script>
    <script type="text/javascript" src="{{asset_customer('js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body class="bootstrap-admin-without-padding">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => 'customer.post_login','method'=>'post','role'=>'form','class'=>'bootstrap-admin-login-form']) !!}
            <h1>Đăng nhập</h1>

            <div class="form-group">
                {!! Form::text('email', '',array('class'=>'form-control','placeholder'=>'E-mail...')) !!}
                <span style="color: red;">{{ $errors->first('email') }}</span>
            </div>

            <div class="form-group">
                {!! Form::password('password', array('class'=>'form-control','placeholder'=>'Mật khẩu...')) !!}
            </div>

            <div class="form-group">
                <label>
                    {!!Form::checkbox('remember_me', null, false) !!} Ghi nhớ đăng nhập
                </label>
            </div>

            <button class="btn btn-lg btn-primary" type="submit">Đăng nhập</button>
            {!! Form::close() !!}

        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset_customer('js/jquery-2.0.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset_customer('js/js/bootstrap.min.js')}}"></script>

<script type="text/javascript">
    $(function () {
        // Setting focus
        $('input[name="email"]').focus();

        // Setting width of the alert box
        var alert = $('.alert');
        var formWidth = $('.bootstrap-admin-login-form').innerWidth();
        var alertPadding = parseInt($('.alert').css('padding'));

        if (isNaN(alertPadding)) {
            alertPadding = parseInt($(alert).css('padding-left'));
        }

        $('.alert').width(formWidth - 2 * alertPadding);
    });
</script>

</body>
</html>
