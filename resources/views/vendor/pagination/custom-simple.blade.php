@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item mx-2 disabled" aria-disabled="true">
                    <span class="page-link">Sebelumnya</span>
                </li>
            @else
                <li class="page-item mx-2">
                    <a class="page-link text-decoration-none btn btn-primary" href="{{ $paginator->previousPageUrl() }}" rel="prev"><< Sebelumnya</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item mx-2">
                    <a class="page-link text-decoration-none btn btn-primary" href="{{ $paginator->nextPageUrl() }}" rel="next">Selanjutnya >></a>
                </li>
            @else
                <li class="page-item mx-2 disabled" aria-disabled="true">
                    <span class="page-link">Selanjutnya</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
