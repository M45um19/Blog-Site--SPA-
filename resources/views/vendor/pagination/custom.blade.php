<style>
    .my-active span {
        background-color: #00CCCC;
        color: white;
        border-color: #00CCCC;
        border-radius: 10px;
        padding: 8px 16px;
    }

    .disabled span {
        padding: 8px 16px;
    }

    .disabled span {
        padding: 8px 16px;
    }

    .pagination_link {
        padding: 8px 16px;
    }

    .next_pagination {
        padding: 8px 16px;
    }
</style>
@if ($paginator->hasPages())
<ul class="pagination">

    @if ($paginator->onFirstPage())
    <li class="disabled"><span>← Previous</span></li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
    @endif



    @foreach ($elements as $element)

    @if (is_string($element))
    <li class="disabled"><span>{{ $element }}</span></li>
    @endif



    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="active my-active"><span>{{ $page }}</span></li>
    @else
    <li><a class="pagination_link" href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach



    @if ($paginator->hasMorePages())
    <li><a class="next_pagination" href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
    @else
    <li class="disabled"><span>Next →</span></li>
    @endif
</ul>
@endif