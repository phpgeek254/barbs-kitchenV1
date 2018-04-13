@if ($paginator->lastPage() > 1)
    <ul class="pagination center">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="btn-flat" href="{{ $paginator->url(1) }}">&laquo;prev</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="btn-flat" href="{{ $paginator->url($paginator->currentPage()+1) }}" >next&raquo;</a>
        </li>
    </ul>
@endif