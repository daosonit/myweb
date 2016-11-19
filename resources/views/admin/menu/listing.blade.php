@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">
@endsection

@section('js')

@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách
                <small><a href="{{route('admin.menu.create')}}">Thêm mới</a></small>
            </h1>
            <ol class="breadcrumb">
                <li> Navigate</li>
                <li class="active">Danh sách</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách navigate hệ thống</h3>
                </div>
                <div class="box-body">
                    @if (session('status'))
                        <div class="alert flash-message text-center alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!! session('status') !!}
                        </div>
                    @endif
                    {!! Form::open(['route' => 'admin.menu.index','method'=>'GET','class'=>'form-inline']) !!}
                    <div class="form-group">
                        {!! Form::text('name',$name,array('class'=>'form-control','placeholder' => 'Nhập navigate...')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::select('type', Navigate::getNavigate(),$type, array('class'=>'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                    {!! Form::close() !!}
                </div>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="text-align: center;" width="4%">STT</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th style="text-align: center;" width="8%">Order</th>
                            <th style="text-align: center;" width="4%">Sửa</th>
                            <th style="text-align: center;" width="4%">Xóa</th>
                        </tr>
                        </thead>

                        <tbody>

                        @forelse($listing as $keys => $values)
                            <tr id="row_{{$values->id}}">
                                <td>{{$no++}}</td>
                                <td>{{$values->name}}</td>
                                <td>{{Navigate::getNavigate()[$values->type]}}</td>
                                <td style="text-align: center;">{{$values->order}}</td>
                                <td style="text-align: center;">
                                    <a href="{{route('admin.menu.edit',array('menu'=>$values->id))}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a data-toggle="modal" href="#menu_{{$values->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    @include('admin.layout.modal',array('href'=>'menu_'.$values->id,'url'=>route('admin.menu.destroy',$values->id),))
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    @if($listing->lastPage() >1)
                        {!! $listing->links('vendor.pagination.default') !!}
                    @endif
                </div>

            </div>
        </section>
    </div>
@endsection