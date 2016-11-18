<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>

    @include('admin.layout.styles')
    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    @include('admin.layout.header')

    @include('admin.layout.navbar-left')

    @yield('content')

    @include('admin.layout.footer')
    @include('admin.layout.control-sidebar')

    <div class="control-sidebar-bg"></div>
</div>

@include('admin.layout.scripts')
@yield('js')
</body>
</html>
