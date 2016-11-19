<div id="{{$href}}" class="modal text-left fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p> Bạn chắc chắn xóa muốn xóa dữ liệu này? </p>
            </div>

            <div class="modal-footer">
                {!! Form::open(['method' => 'DELETE', 'url' => $url])!!}
                {!! Form::hidden('page', Request::get('page',0)) !!}
                {!! Form::button('Hủy', array('class'=>'btn btn-primary','data-dismiss'=>'modal')) !!}
                {!! Form::submit('Xóa', array('class'=>'btn btn-primary')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
