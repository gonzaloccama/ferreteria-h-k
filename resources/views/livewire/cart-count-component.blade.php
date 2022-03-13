{{--<div class="wrap-icon-section minicart">--}}
{{--    <a href="{{ route('product.cart') }}" class="link-direction">--}}
{{--        <i class="fa fa-shopping-basket" aria-hidden="true"></i>--}}
{{--        <div class="left-info">--}}
{{--            <span class="index">--}}
{{--                {{ Cart::instance('cart')->count() > 0 ? Cart::instance('cart')->count() : 0 }} items--}}
{{--            </span>--}}
{{--            <span class="title">CART</span>--}}
{{--        </div>--}}
{{--    </a>--}}
{{--</div>--}}

<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="javascript:;">
        <img alt="cart"
             src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}">
        <span
            class="pro-count blue">{{ Cart::instance('cart')->count() > 0 ? Cart::instance('cart')->count() : 0 }}</span>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2" style="min-height: auto; max-height: 520px; overflow-y: auto;">
        @if(Cart::instance('cart')->count() > 0)
            <ul>
                @foreach(Cart::instance('cart')->content() as $item)
                    <li>
                        <div class="shopping-cart-img">
                            <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                <img alt="{{ $item->model->name }}" class="border"
                                     src="{{ asset('assets/images/products/').'/'.$item->model->image }}">
                            </a>
                        </div>
                        <div class="shopping-cart-title" style="width: 150px">
                            <h6>
                                <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                            </h6>
                            <p><span>{{ $item->qty }} × </span>S/ {{ $item->model->regular_price }}</p>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="#"><i class="fi-rs-cross-small"
                                           wire:click.prevent="destroy('{{ $item->rowId }}')"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Ningún!</strong> artículo en el carrito.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>S/ {{ Cart::instance('cart')->total() }}</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{ route('product.cart') }}" class="outline">Ver carrito</a>
                <a href="{{ route('checkout') }}">Checkout</a>
{{--                <a href="{{ route('product.cart') }}">Ver carrito</a>--}}
            </div>
        </div>
    </div>
</div>
