@extends('admin.layout.master')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Order</th>
                            <th width="20%">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @forelse($listing as $keys => $values)
                            <tr id="row_{{$values->id}}">
                                <td>{{$no++}}</td>
                                <td>{{$values->getNavParent->name}}-{{$values->name}}</td>
                                <td>
                                    <a href="{{route($values->route)}}">
                                        {{route($values->route)}}
                                    </a>
                                </td>
                                <td>{{$values->order}}</td>
                                <td>
                                    <a href="{{route('admin.menu-item.edit',array('menu'=>$values->id))}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="javascript:void(0);" class="action_delete" data-id="{{$values->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
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