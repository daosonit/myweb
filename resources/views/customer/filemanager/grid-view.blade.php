<div class="row">

    @if((sizeof($file_info) > 0) || (sizeof($directories) > 0))

        @foreach($directories as $key => $dir_name)
            @include('customer.filemanager.folders')
        @endforeach

        @foreach($file_info as $key => $file)
            @include('customer.filemanager.item')
        @endforeach

    @else
        <div class="col-md-12">
            <p>{{ Lang::get('lfm.message-empty') }}</p>
        </div>
    @endif

</div>
