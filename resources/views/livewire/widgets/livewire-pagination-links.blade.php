{{--@if ($paginator->hasPages())--}}
{{--    <ul class="page-numbers">--}}
{{--        --}}{{-- Previous Page Link --}}
{{--        @if ($paginator->onFirstPage())--}}
{{--            <li><a href="javascript:;" wire:click="previousPage" class="page-number-item">Prev</a></li>--}}
{{--        @else--}}
{{--            <li><a href="javascript:;" wire:click="previousPage" rel="prev" class="page-number-item">Prev</a></li>--}}
{{--        @endif--}}

{{--        --}}{{-- Pagination Element Here --}}
{{--        @foreach ($elements as $element)--}}
{{--            --}}{{-- Make dots here --}}
{{--            @if (is_string($element))--}}
{{--                <li><a class="page-link"><span>{{ $element }}</span></a></li>--}}
{{--            @endif--}}

{{--            --}}{{-- Links array Here --}}
{{--            @if (is_array($element))--}}
{{--                @foreach ($element as $page=>$url)--}}
{{--                    @if ($page == $paginator->currentPage())--}}
{{--                        <li><span class="page-number-item current">{{ $page }}</span></li>--}}
{{--                    @else--}}
{{--                        <li><a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-number-item">{{$page}}</a></li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}

{{--        --}}{{-- Next Page Link --}}
{{--        @if ($paginator->hasMorePages())--}}
{{--            <li><a href="javascript:;" wire:click="nextPage" class="page-number-item">Next</a></li>--}}
{{--        @else--}}
{{--            <li><a href="javascript:;" class="page-number-item">Next</a></li>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--@endif--}}

@if ($paginator->hasPages())
    <ul class="page-numbers">

        @if ( ! $paginator->onFirstPage())
            {{-- First Page Link --}}
            <li>
                <a href="javascript:;" class="page-number-item" wire:click="gotoPage(1)">
                    <i class="fa fa-angle-double-left"></i>
                </a>
            </li>
            @if($paginator->currentPage() > 2)
                {{-- Previous Page Link --}}
                <li>
                    <a href="javascript:;" class="page-number-item" wire:click="previousPage">
                        <i class="fa fa-angle-left"></i>
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
                        <li>
                            <span class="page-number-item">...</span>
                        </li>
                    @endif

                <!--  Show active page two pages before and after it.  -->
                    @if ($page == $paginator->currentPage())
                        <li><span class="page-number-item current">{{ $page }}</span></li>
                    @elseif ($page === $paginator->currentPage() + 1 /*|| $page === $paginator->currentPage() + 2*/ || $page === $paginator->currentPage() - 1 /*| $page === $paginator->currentPage() - 2*/)
                        <li><a href="javascript:;" class="page-number-item"
                               wire:click="gotoPage({{$page}})">{{ $page }}</a></li>
                    @endif

                <!--  Use three dots when current page is away from end.  -->
                    @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                        <li>
                            <span class="page-number-item">...</span>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            @if($paginator->lastPage() - $paginator->currentPage() >= 2)
                <li>
                    <a href="javascript:;" wire:click="nextPage" class="page-number-item">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            @endif
            <li>
                <a href="javascript:;" class="page-number-item" wire:click="gotoPage({{ $paginator->lastPage() }})">
                    <i class="fa fa-angle-double-right"></i>
                </a>
            </li>
        @endif
    </ul>

    <div class="text-right">
        <p class="text-gray" style="padding-top: 8px; padding-bottom: 0;">
            <span>{!! __('Motrando') !!}</span>
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            <span>{!! __('a') !!}</span>
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            <span>{!! __('de') !!}</span>
            <span class="font-medium">{{ $paginator->total() }}</span>
            <span>{!! __('resultados') !!}</span>
        </p>
    </div>
@endif
