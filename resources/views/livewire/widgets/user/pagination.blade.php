@if ($paginator->hasPages())
    <ul class="pagination">

        @if ( ! $paginator->onFirstPage())
            {{-- First Page Link --}}
            <li class="page-item">
                <a class="page-link" href="javascript:;" wire:click="gotoPage(1)">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </li>

            @if($paginator->currentPage() > 2)
                {{-- Previous Page Link --}}
                <li class="page-item">
                    <a class="page-link" href="javascript:;" wire:click="previousPage">anterior</a>
                </li>
            @endif
        @endif

    <!-- Pagination Elements -->
        @foreach ($elements as $element)
        <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                <!--  Use three dots when current page is greater than 3.  -->
                    @if ($paginator->currentPage() > 3 && $page === 2)
                        <li class="page-item">
                            <span class="page-link">...</span>
                        </li>

                    @endif

                <!--  Show active page two pages before and after it.  -->
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active-filter" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() - 1)
                        <li class="page-item">
                            <a class="page-link" href="javascript:;" wire:click="gotoPage({{$page}})">{{ $page }}</a>
                        </li>
                    @endif

                <!--  Use three dots when current page is away from end.  -->
                    @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                        <li class="page-item">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            @if($paginator->lastPage() - $paginator->currentPage() >= 2)
                <li class="page-item">
                    <a class="page-link" href="javascript:;" wire:click="nextPage">siguiente</a>
                </li>
            @endif
                <li class="page-item">
                    <a class="page-link" href="javascript:;" wire:click="gotoPage({{ $paginator->lastPage() }})">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </li>
        @endif
    </ul>
@endif
