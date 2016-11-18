@extends('admin.layout.master')
@section('content')
    <div class="content-wrapper">

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

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nhà cung cấp</h3>
                </div>
                <div class="box-body">
                    @if (session('status'))
                        <div class="alert flash-message text-center alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!! session('status') !!}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::model($navigate, ['method' => 'PUT','route' => ['admin.menu.update', $navigate->id]]) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name',$navigate->name,array('class'=>'form-control','placeholder' => 'Tên navigate')) !!}
                                @if ($errors->has('name'))
                                    <div class="text-danger">{!! $errors->first('name') !!}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('type', 'Navigate') !!}
                                {!! Form::select('type', Navigate::getNavigate(),$navigate->nav_id, array('class'=>'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Sửa',array('class'=>'btn btn-primary')) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection