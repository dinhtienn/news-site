<ul class="pagination">
    <li class="@if (!$dataPagination->previous) disabled @endif">
        <a href="{{ route('home', ['page' => $dataPagination->page - 1]) }}">
            &#8701;
        </a>
    </li>
    @if ($dataPagination->page - 1 > 1)
        <li>
            <a href="{{ route('home', ['page' => 1]) }}">
                1
            </a>
        </li>
        <li class="page-numbers"><span>...</span></li>
    @endif
    @if ($dataPagination->previous)
        <li>
            <a href="{{ route('home', ['page' => $dataPagination->page - 1]) }}">
                {{ $dataPagination->page - 1 }}
            </a>
        </li>
    @endif
    <li class="active">
        <a href="#">{{ $dataPagination->page }}
            <span class="sr-only">(current)</span>
        </a>
    </li>
    @if ($dataPagination->next)
        <li>
            <a href="{{ route('home', ['page' => $dataPagination->page + 1]) }}">
                {{ $dataPagination->page + 1 }}
            </a>
        </li>
    @endif
    @if ($dataPagination->page + 1 < $dataPagination->lastPage)
        <li class="page-numbers"><span>...</span></li>
        <li>
            <a href="{{ route('home', ['page' => $dataPagination->lastPage]) }}">
                {{ $dataPagination->lastPage }}
            </a>
        </li>
    @endif
    <li class="@if (!$dataPagination->next) disabled @endif">
        <a href="{{ route('home', ['page' => $dataPagination->page + 1]) }}">
            &#8702;
        </a>
    </li>
</ul>
