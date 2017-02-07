@extends('customer.layout.master')
@section('css')
    <link rel="stylesheet" media="screen" href="{{asset('vendors/bootstrap-datepicker/css/datepicker.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset('css/datepicker.fixes.css')}}">
    <link rel="stylesheet" media="screen"
          href="{{asset('vendors/uniform/themes/default/css/uniform.default.min.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset('css/uniform.default.fixes.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset('vendors/chosen.min.css')}}">
    <link rel="stylesheet" media="screen"
          href="{{asset('vendors/selectize/dist/css/selectize.bootstrap3.css')}}">
    <link rel="stylesheet" media="screen"
          href="{{asset('vendors/bootstrap-wysihtml5-rails-b3/vendor/assets/stylesheets/bootstrap-wysihtml5/core-b3.css')}}">
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('vendors/uniform/jquery.uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/chosen.jquery.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('vendors/twitter-bootstrap-wizard/jquery.bootstrap.wizard-for.bootstrap3.js')}}"></script>

    <script src="{{asset('vendors/ckeditor/ckeditor.js')}}"></script>

    <script>
        CKEDITOR.replace( 'id_content', {
            filebrowserImageBrowseUrl: '/customer/file?type=Images',
            filebrowserImageUploadUrl: '/customer/file/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/customer/file?type=Files',
            filebrowserUploadUrl: '/customer/file/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>

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
                <div class="panel panel-default bootstrap-admin-no-table-panel">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">Tạo bài viết</div>
                    </div>
                    <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                        {!! Form::open(['route' => 'customer.post.store','class'=>'form-horizontal']) !!}

                        <fieldset>
                            <div class="form-group {{($errors->has('name'))?'has-error':''}}">
                                {!!  Form::label('name', 'Tên bài viết:', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::text('name', '', array('class'=>'form-control')) !!}
                                    @if($errors->has('name'))
                                        <span class="help-block">{!! $errors->first('name') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{($errors->has('image'))?'has-error':''}}">
                                {!!  Form::label('image', 'Ảnh đại diện:', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::file('image',array('class'=>'form-control')) !!}
                                    @if($errors->has('image'))
                                        <span class="help-block">{!! $errors->first('image') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{($errors->has('title'))?'has-error':''}}">
                                {!!  Form::label('title', 'Title:', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::text('title', '', array('class'=>'form-control')) !!}
                                    @if($errors->has('title'))
                                        <span class="help-block">{!! $errors->first('title') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{($errors->has('keyword'))?'has-error':''}}">
                                {!!  Form::label('keyword', 'Keyword:', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::text('keyword', '', array('class'=>'form-control')) !!}
                                    @if($errors->has('keyword'))
                                        <span class="help-block">{!! $errors->first('keyword') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{($errors->has('description'))?'has-error':''}}">
                                {!!  Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::text('description', '', array('class'=>'form-control')) !!}
                                    @if($errors->has('description'))
                                        <span class="help-block">{!! $errors->first('description') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{($errors->has('excerpt'))?'has-error':''}}">
                                {!!  Form::label('excerpt', 'Trích đoạn:', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::textarea('excerpt', '', array('class'=>'form-control')) !!}
                                    @if($errors->has('excerpt'))
                                        <span class="help-block">{!! $errors->first('excerpt') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{($errors->has('content'))?'has-error':''}}">
                                {!!  Form::label('id_content', 'Nội dung:', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::textarea('content', '', array('class'=>'form-control','id'=>'id_content')) !!}
                                    @if($errors->has('content'))
                                        <span class="help-block">{!! $errors->first('content') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm mới</button>

                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection