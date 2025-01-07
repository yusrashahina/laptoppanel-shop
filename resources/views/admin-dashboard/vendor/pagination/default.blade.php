@if ($paginator->hasPages())
    <ul class="pagination justify-content-center justify-content-md-start">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Prev</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Prev</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- If it's a string, show the dots --}}
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
            @endif

            {{-- Array of Links with Ellipsis Logic --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    {{-- Show first 2 pages, current page, last 2 pages --}}
                    @if ($page == $paginator->currentPage() || $page == 1 || $page == $paginator->lastPage() ||
                        $page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() + 1)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif($page == $paginator->currentPage() - 2 || $page == $paginator->currentPage() + 2)
                        {{-- Show dots where necessary --}}
                        <li class="page-item disabled"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        @endif

    </ul>
@endif
