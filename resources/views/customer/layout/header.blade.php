<nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar-sm" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left bootstrap-admin-theme-change-size">
                        <li class="text">Change size:</li>
                        <li><a class="size-changer small">Small</a></li>
                        <li><a class="size-changer large active">Large</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Reminders <i class="glyphicon glyphicon-bell"></i></a>
                        </li>
                        <li>
                            <a href="#">Settings <i class="glyphicon glyphicon-cog"></i></a>
                        </li>
                        <li>
                            <a href="#">Go to frontend <i class="glyphicon glyphicon-share-alt"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-hover="dropdown">
                                <i class="glyphicon glyphicon-user"></i> {{Auth::guard('customer')->user()->name}}
                                <i class="caret"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="presentation" class="divider"></li>
                                <li><a href="{{route('customer.get_logout')}}">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</nav>

<!-- main / large navbar -->
<nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-under-small"
     role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".main-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{Config::get('son.site')}}</a>
                </div>
                <div class="collapse navbar-collapse main-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Trang chủ</a></li>
                        @forelse(Navigate::getNavCustomer() as $index => $nav)
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle"
                                   data-hover="dropdown">{{$nav->name}} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    @forelse($nav->getNavItem as $keys => $item)
                                        <li><a href="{{route($item->route)}}">{{$item->name}}</a></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>
    </div><!-- /.container -->
</nav>
