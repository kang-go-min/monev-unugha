@if ($paginator->hasPages())
    <nav class="g-mb-50" aria-label="Page Navigation">
        <ul class="list-inline">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="list-inline-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-13">
                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                        <span class="sr-only">&lsaquo;</span>
                    </a>
                </li>
            @else
                <li class="list-inline-item">
                    <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-13"
                        href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                        <span class="sr-only">&lsaquo;</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled list-inline-item g-hidden-sm-down" aria-disabled="true">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="list-inline-item g-hidden-sm-down" aria-current="page">
                                <a class="u-pagination-v1__item u-pagination-v1-5 u-pagination-v1-5--active rounded g-pa-4-11" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @else
                            <li class="list-inline-item g-hidden-sm-down">
                                <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-11" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="list-inline-item g-hidden-sm-down">
                    <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-13" rel="next" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                        <span class="sr-only">&rsaquo;</span>
                    </a>
                </li>
            @else
                <li class="disabled list-inline-item g-hidden-sm-down" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-13">
                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                        <span class="sr-only">&rsaquo;</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
