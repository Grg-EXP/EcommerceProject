@if ($paginator->hasPages())
    <ul class="pager">

        @if ($paginator->onFirstPage())
            <li class="disabled"><span>← {{ trans('content.previous') }}</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← {{ trans('content.previous') }}</a></li>
        @endif


        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">{{ trans('content.next') }} →</a></li>
        @else
            <li class="disabled"><span>{{ trans('content.next') }} →</span></li>
        @endif
    </ul>
@endif
