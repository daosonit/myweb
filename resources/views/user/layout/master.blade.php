<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | Bootstrap 3.x Admin Theme</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('customer.layout.styles')
    @yield('css')
</head>
<body class="bootstrap-admin-with-small-navbar">
<!-- small navbar -->

@include('customer.layout.header')


<div class="container">
    <!-- left, vertical navbar & content -->
    <div class="row">
    @include('customer.layout.navbar-left')
    <!-- content -->
        @yield('content')
    </div>
</div>

<!-- footer -->


@include('customer.layout.scripts')
@yield('js')

</body>
</html>