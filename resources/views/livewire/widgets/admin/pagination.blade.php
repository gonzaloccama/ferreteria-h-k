<nav class="pt-2 pb-2">
    @if ($paginator->hasPages())
        <ul class="pagination pagination-rounded">

            @if ( ! $paginator->onFirstPage())
                {{-- First Page Link --}}
                <li class="page-item text-center">
                    <a href="javascript:;" class="page-link first" wire:click="gotoPage(1)">
                        <i class="fe-chevrons-left"></i>
                    </a>
                </li>
                @if($paginator->currentPage() > 2)
                    {{-- Previous Page Link --}}
                    <li class="page-item text-center">
                        <a href="javascript:;" class="page-link prev" wire:click="previousPage">
                            <span>anterior</span>
                        </a>
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
                            <li class="page-item text-center">
                                <span class="page-link"><i class="fe-more-horizontal"></i></span>
                            </li>
                        @endif

                    <!--  Show active page two pages before and after it.  -->
                        @if ($page == $paginator->currentPage())
                            <li class="page-item text-center active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() - 1)
                            <li class="page-item text-center">
                                <a href="javascript:;" class="page-link"
                                   wire:click="gotoPage({{$page}})">{{ $page }}
                                </a>
                            </li>
                        @endif

                    <!--  Use three dots when current page is away from end.  -->
                        @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                            <li class="page-item text-center">
                                <span class="page-link"><i class="fe-more-horizontal"></i></span>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                @if($paginator->lastPage() - $paginator->currentPage() >= 2)
                    <li class="page-item text-center">
                        <a href="javascript:;" class="page-link" wire:click="nextPage" aria-label="Previous">
                            <span>siguiente</span>
                        </a>
                    </li>
                @endif
                <li class="page-item text-center">
                    <a href="javascript:;" class="page-link last"
                       wire:click="gotoPage({{ $paginator->lastPage() }})">
                        <i class="fe-chevrons-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    @endif
</nav>
