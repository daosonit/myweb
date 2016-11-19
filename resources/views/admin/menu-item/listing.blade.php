@extends('admin.layout.master')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách
                <small><a href="{{route('admin.menu-item.create')}}">Thêm mới</a></small>
            </h1>
            <ol class="breadcrumb">
                <li>Menu - Item</li>
                <li class="active">Danh sách</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div>
                <div class="box-body">
                    @if (session('status'))
                        <div class="alert flash-message text-center alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!! session('status') !!}
                        </div>
                    @endif

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="10%">STT</th>
                            <th>Tên</th>
                            <th style="text-align: center;" width="8%">Order</th>
                            <th style="text-align: center;" width="5%">Sửa</th>
                            <th style="text-align: center;" width="5%">Xóa</th>
                        </tr>
                        </thead>

                        <tbody>

                        @forelse($listing as $keys => $values)
                            <tr id="row_{{$values->id}}">
                                <td>{{$no++}}</td>

                                <td>
                                    <a href="{{route($values->route)}}">
                                    <strong>{{$values->getNavParent->name}}</strong>/{{$values->name}}
                                    </a>
                                </td>

                                <td style="text-align: center;">{{$values->order}}</td>
                                <td style="text-align: center;">
                                    <a href="{{route('admin.menu-item.edit',array('menu'=>$values->id))}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a data-toggle="modal" href="#menu_item{{$values->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    @include('admin.layout.modal',array('href'=>'menu_item'.$values->id,'url'=>route('admin.menu-item.destroy',$values->id)))
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