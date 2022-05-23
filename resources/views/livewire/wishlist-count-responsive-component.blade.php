{{--<div class="wrap-icon-section wishlist">--}}
{{--    <a href="{{ route('product.wishlist') }}" class="link-direction">--}}
{{--        <i class="fa fa-heart" aria-hidden="true"></i>--}}
{{--        <div class="left-info">--}}
{{--            <span class="index">--}}
{{--                {{ Cart::instance('wishlist')->count() > 0 ? Cart::instance('wishlist')->count() : 0 }} items--}}
{{--            </span>--}}
{{--            <span class="title">Wishlist</span>--}}
{{--        </div>--}}
{{--    </a>--}}
{{--</div>--}}

<div class="header-action-icon-2">
    <a href="{{ route('product.wishlist') }}">
        <img class="svgInject" alt="Evara"
             src="{{ asset('assets/frontend/imgs/theme/icons/icon-heart-res.svg') }}">
        <span class="pro-count" style="background: var(--bittersweet);">{{ Cart::instance('wishlist')->count() > 0 ? Cart::instance('wishlist')->count() : 0 }}</span>
    </a>
</div>

