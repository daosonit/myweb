@extends('customer.layout.master')

@section('css')
    <link rel="stylesheet" media="screen" href="{{asset('vendors/easypiechart/jquery.easy-pie-chart.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset('vendors/easypiechart/jquery.easy-pie-chart_custom.css')}}">
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('vendors/easypiechart/jquery.easy-pie-chart.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            // Easy pie charts
            $('.easyPieChart').easyPieChart({animate: 1000});
        });
    </script>
@endsection

@section('content')
    <div class="col-md-10">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success bootstrap-admin-alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>Success</h4>
                    The operation completed successfully
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="navbar navbar-default bootstrap-admin-navbar-thin">
                    <ol class="breadcrumb bootstrap-admin-breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                        <li class="active">Tools</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default bootstrap-admin-no-table-panel">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">Statistics</div>
                        <div class="pull-right"><span class="badge">View More</span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content bootstrap-admin-no-table-panel-content collapse in">
                        <div class="col-md-3">
                            <div class="easyPieChart" data-percent="73"
                                 style="width: 110px; height: 110px; line-height: 110px;">73%
                                <canvas width="110" height="110"></canvas>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-info">Visitors</span></div>
                        </div>
                        <div class="col-md-3">
                            <div class="easyPieChart" data-percent="53"
                                 style="width: 110px; height: 110px; line-height: 110px;">53%
                                <canvas width="110" height="110"></canvas>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-info">Page Views</span></div>
                        </div>
                        <div class="col-md-3">
                            <div class="easyPieChart" data-percent="83"
                                 style="width: 110px; height: 110px; line-height: 110px;">83%
                                <canvas width="110" height="110"></canvas>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-info">Users</span></div>
                        </div>
                        <div class="col-md-3">
                            <div class="easyPieChart" data-percent="13"
                                 style="width: 110px; height: 110px; line-height: 110px;">13%
                                <canvas width="110" height="110"></canvas>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-info">Orders</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">Users</div>
                        <div class="pull-right"><span class="badge">1,234</span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Vincent</td>
                                <td>Gabriel</td>
                                <td>@gabrielva</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">Orders</div>
                        <div class="pull-right"><span class="badge">752</span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Coat</td>
                                <td>02/02/2013</td>
                                <td>$25.12</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacket</td>
                                <td>01/02/2013</td>
                                <td>$335.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Shoes</td>
                                <td>01/02/2013</td>
                                <td>$29.99</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">Clients</div>
                        <div class="pull-right"><span class="badge">17</span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Vincent</td>
                                <td>Gabriel</td>
                                <td>@gabrielva</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">Invoices</div>
                        <div class="pull-right"><span class="badge">812</span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>02/02/2013</td>
                                <td>$25.12</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>01/02/2013</td>
                                <td>$335.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>01/02/2013</td>
                                <td>$29.99</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">Gallery</div>
                        <div class="pull-right"><span class="badge">1,462</span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <div class="row bootstrap-admin-light-padding-bottom">

                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/260x180" alt="260x180"
                                         style="width: 260px; height: 180px;"
                                         src="">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/260x180" alt="260x180"
                                         style="width: 260px; height: 180px;"
                                         src="">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/260x180" alt="260x180"
                                         style="width: 260px; height: 180px;"
                                         src="">
                                </a>
                            </div>
                        </div>

                        <div class="row bootstrap-admin-light-padding-bottom">
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/260x180" alt="260x180"
                                         style="width: 260px; height: 180px;"
                                         src="">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/260x180" alt="260x180"
                                         style="width: 260px; height: 180px;"
                                         src="">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/260x180" alt="260x180"
                                         style="width: 260px; height: 180px;"
                                         src="">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/260x180" alt="260x180"
                                         style="width: 260px; height: 180px;"
                                         src="">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/260x180" alt="260x180"
                                         style="width: 260px; height: 180px;"
                                         src="">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="thumbnail">
                                    <img data-src="holder.js/260x180" alt="260x180"
                                         style="width: 260px; height: 180px;"
                                         src="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">Panel without data</div>
                        <div class="pull-right"><span class="badge">0</span></div>
                    </div>
                    <div class="panel-body">
                        <div class="no-data">
                            Sorry, no data to display
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection