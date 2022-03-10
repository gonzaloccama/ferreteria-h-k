
<div class="pagination-area mt-15 mb-sm-5 mb-lg-0 row">
    <nav class="Page navigation example col-md-7">
        @if ($paginator->hasPages())
            <ul class="pagination justify-content-start">

                @if ( ! $paginator->onFirstPage())
                    {{-- First Page Link --}}
                    <li class="page-item">
                        <a href="javascript:;" class="page-link first" wire:click="gotoPage(1)">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </li>
                    @if($paginator->currentPage() > 2)
                        {{-- Previous Page Link --}}
                        <li class="page-item">
                            <a href="javascript:;" class="page-link prev" wire:click="previousPage">
                                <i class="fas fa-angle-left"></i>
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
                                <li class="page-item">
                                    <span class="page-link">...</span>
                                </li>
                            @endif

                        <!--  Show active page two pages before and after it.  -->
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() - 1)
                                <li class="page-item">
                                    <a href="javascript:;" class="page-link"
                                       wire:click="gotoPage({{$page}})">{{ $page }}
                                    </a>
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
                            <a href="javascript:;" class="page-link next" wire:click="nextPage">
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </li>
                    @endif
                    <li class="page-item">
                        <a href="javascript:;" class="page-link last"
                           wire:click="gotoPage({{ $paginator->lastPage() }})">
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    </li>
                @endif
            </ul>
        @endif
    </nav>

    <div class="text-end col-md-5">
        <p> Mostrando <strong class="text-brand">{{ $paginator->firstItem() }} a {{ $paginator->lastItem() }}
                de {{ $paginator->total() }}</strong> artículos.</p>

    </div>
</div>
