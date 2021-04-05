@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="pagination__numbers">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a><i class="las la-arrow-left la-24"></i></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"><i class="las la-arrow-left la-24"></i></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span>{{ $page }}</span>
                    @elseif ((($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() - 1) || $page == $paginator->lastPage()) && !isMobile())
                        <a href="{{ $url }}">{{ $page }}</a>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                        <a href="{{ $url }}">{{ $page }}</a>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <a>...</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                <i class="las la-arrow-right la-24"></i>
            </a>
        @else
            <a>
                <i class="las la-arrow-right la-24"></i>
            </a>
        @endif
    </div>
    <!-- Pagination -->
@endif