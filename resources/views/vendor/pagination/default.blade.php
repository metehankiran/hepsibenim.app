@if ($paginator->hasPages())
    <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Önceki</a>
                </li>
            </ul>
        @else
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="ci-arrow-left me-2"></i>Önceki</a>
            </li>
        </ul>
        @endif

        <ul class="pagination">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">...</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">{{ $page }}<span
                        class="visually-hidden">(current)</span></span></li>
                    @else
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        </ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item d-none d-sm-block"><a class="page-link"
                    href="{{ $paginator->nextPageUrl() }}">Sonraki<i class="ci-arrow-right ms-2"></i></a></li>
        @else
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#" aria-label="Next">Sonraki</a></li>
            </ul>
        @endif
        </ul>
    </nav>
@endif
