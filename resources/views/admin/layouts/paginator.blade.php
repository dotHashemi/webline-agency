@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <a href="{{ $paginator->url(1) }}" class="paginate-item {{ ($paginator->currentPage() == 1) ? 'hidden' : '' }}">
        <li>
            قبلی
        </li>
    </a>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <a href="{{ $paginator->url($i) }}" class="paginate-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
            <li>
                {{ $i }}
            </li>
        </a>
    @endfor
    <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="paginate-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? 'hidden' : '' }}">
        <li>
            بعدی
        </li>
    </a>
</ul>
@endif