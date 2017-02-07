@extends('customer.layout.master')
@section('css')
@endsection
@section('js')
@endsection
@section('content')

    <div class="col-md-10">

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>Posts</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">Danh sách bài viết</div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <table class="table bootstrap-admin-table-with-actions">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tên bài viết</th>
                                <th>Danh mục</th>
                                <th>Trích đoạn</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="actions">
                                    <a href="#">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm btn-success">
                                            <i class="glyphicon glyphicon-ok-sign"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="glyphicon glyphicon-bell"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td class="actions">
                                    <a href="#">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm btn-success">
                                            <i class="glyphicon glyphicon-ok-sign"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="glyphicon glyphicon-bell"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td class="actions">
                                    <a href="#">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm btn-success">
                                            <i class="glyphicon glyphicon-ok-sign"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="glyphicon glyphicon-bell"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection