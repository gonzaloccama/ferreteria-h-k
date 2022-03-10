<div>
    @php
        $witems = Cart::instance('wishlist')->content()->pluck('id');
    @endphp
    <?php
    $up_page = ['page' => 'Tienda', 'route' => route('shop')];
    ?>
    @include('livewire.widgets.breadcrumb')
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            @include('livewire.frontend.details-component.gallery')
                            @include('livewire.frontend.details-component.detail-info')
                        </div>
                        @include('livewire.frontend.details-component.detail-features')
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">PRODUCTOS RELACIONADOS</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach($related_product as $r_pro)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ route('product.details', ['slug' => $r_pro->slug]) }}"
                                                           tabindex="0">
                                                            <img class="default-img"
                                                                 src="{{ asset('assets/images/products/').'/'.$r_pro->image }}"
                                                                 alt="">
                                                            <img class="hover-img"
                                                                 src="{{ asset('assets/images/products/').'/'.$r_pro->image }}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up"
                                                           data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                                class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist"
                                                           class="action-btn small hover-up"
                                                           href="javascript:;" tabindex="0"><i
                                                                class="fi-rs-heart"></i></a>
                                                        {{--                                                        <a aria-label="Compare" class="action-btn small hover-up"--}}
                                                        {{--                                                           href="shop-compare.html" tabindex="0"><i--}}
                                                        {{--                                                                class="fi-rs-shuffle"></i></a>--}}
                                                    </div>
                                                    <div
                                                        class="product-badges product-badges-position product-badges-mrg">
                                                        {{--                                                        <span class="hot">Hot</span>--}}
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2>
                                                        <a href="{{ route('product.details', ['slug'=>$r_pro->slug]) }}"
                                                           tabindex="0">{{ $r_pro->name }}</a>
                                                    </h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                        </span>
                                                    </div>
                                                    <div class="product-price">

                                                        @if($r_pro->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
                                                            <span>S/ {{ $r_pro->sale_price }}</span>
                                                            <span
                                                                class="old-price">S/ {{ $r_pro->regular_price }}</span>
                                                        @else
                                                            <span>S/ {{ $r_pro->regular_price }}</span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="banner-img banner-big wow fadeIn f-none animated mt-50">--}}
                        {{--                            <img class="border-radius-10" src="assets/imgs/banner/banner-4.png" alt="">--}}
                        {{--                            <div class="banner-text">--}}
                        {{--                                <h4 class="mb-15 mt-40">Repair Services</h4>--}}
                        {{--                                <h2 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h2>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/video.js/video-js.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/video.js/index.css') }}">

    <style>
        .reg-price {
            font-weight: 300;
            font-size: 16px !important;
            color: #aaa !important;
            text-decoration: line-through;
            padding-left: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/video.js/video.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/video.js/Youtube.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('addCart', () => {
                notificationSwal(`¡Se agregó extosamente al <span class="fst-italic">Carrito de compras</span>!`, 'rgba(8,129,120,0.9)');
            });

            window.livewire.on('addWishlist', () => {
                notificationSwal(`¡Se agregó extosamente <span class="fst-italic">a la Lista de deseos</span>!`, 'rgba(8,129,120,0.9)');
            });
        });
    </script>
@endpush
