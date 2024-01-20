@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Anterior Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo; Anterior</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Anterior</a></li>
        @endif

        {{-- Siguiente Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Siguiente &raquo;</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Siguiente &raquo;</span></li>
        @endif
    </ul>
@endif