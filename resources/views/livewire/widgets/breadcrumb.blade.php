<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb uppercase" style="text-transform: uppercase; font-size: 13px; font-weight: 500;">
            <a href="{{ route('home') }}" rel="nofollow">Inicio</a>
            @if(isset($up_page) && !empty($up_page))
                <span></span> <a href="{{ $up_page['route'] }}">{{ $up_page['page'] }}</a>
            @endif
{{--            @if($segment = Request::segment(1))--}}
{{--                <span></span> <a href="{{ $up_page['route'] }}">{{ $segment }}</a>--}}
{{--            @endif--}}
            <span></span> {{ $title }}
        </div>
        @push('title'){{ $title }}@endpush
    </div>
</div>
