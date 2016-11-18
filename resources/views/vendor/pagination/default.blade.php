<div class="row">
    <div class="col-sm-5">
        <div class="dataTables_info">
            <span style="color: red;">Hiển thị {{$paginator->firstItem()}} tới {{$paginator->lastItem()}} của {{$paginator->lastPage()}} trang</span>
        </div>
    </div>
    <div class="pagination">

        @if ($paginator->onFirstPage())
            <li class="paginate_button disabled"><span>&laquo;</span></li>
        @else
            <li class="paginate_button"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class=" paginate_buttondisabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button active"><span>{{ $page }}</span></li>
                    @else
                        <li class="paginate_button"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="paginate_button"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="paginate_button disabled"><span>&raquo;</span></li>
        @endif
    </div>
</div>