<div class="">
    @push('title')
        {{ $title }}
    @endpush
    @php
        $_sale = $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now();
        $witems = Cart::instance('wishlist')->content()->pluck('id');
    @endphp

    <section class="home-slider position-relative mb-30 mt-0 pt-0" style="background-color: var(--st-patricks-blue);"
             wire:ignore>
        <div class="container">
            <div class="home-slide-cover  mt-0">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    @foreach($sliders as $slider)
                        <div class="single-hero-slider single-animation-wrap">
                            <div class="container">
                                <div class="row align-items-center slider-animated-1">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="hero-slider-content-2">
                                            <h4 class="animated text-white">{!! $slider->title !!}</h4>
                                            <h3 class="animated fw-900 text-white">{!! $slider->subtitle !!}</h3>
                                            <h2 class="animated pt-1 pb-1 fw-900 text-7-a">
                                                S/ {!! $slider->price !!}</h2></h2>
                                            {{--                                            <p class="animated">Save more with coupons & up to 70% off</p>--}}
                                            <a class="animated btn btn-brush btn-brush-2 pb-4 text-white"
                                               href="{{ URL::to('/').'/'.$slider->link }}"
                                               tabindex="0"> Comprar </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6">
                                        <div class="single-slider-img single-slider-img-1">
                                            <img class="animated"
                                                 src="{{ asset('assets/images/sliders/').'/'.$slider->image }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </div>
    </section>

    <!--On Sale-->
    @if($sproducts->count() > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
        <section class="banners mb-15" wire:ignore>

            <div class="container">
                <div class="card">
                    <div class="col-md-12 pl-20 pt-20 pb-10" style="background-color: var(--st-patricks-blue);">
                        <h3 class="section-title text-white"><span>DIAS </span> DE OFERTA
                        </h3>
                    </div>
                    <div class="col-md-6 pb-10 row">
                        <div class="ml-10 ml-2">¡Darse prisa! Oferta termina en:</div>
                        <div class="deals-countdown"
                             data-countdown="{{ Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s') }}"></div>
                    </div>
                    <div class="container wow fadeIn animated pb-10">
                        <div class="carausel-6-columns-cover position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                                 id="carausel-sale-columns-2-arrows"></div>
                            <div class="carausel-sale-columns carausel-arrow-center" id="carausel-sale-columns-2">
                                @foreach($sproducts as $sproduct)
                                    <div class="product-cart-wrap small hover-up">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', ['slug' => $sproduct->slug]) }}">
                                                    <img class="default-img"
                                                         src="{{ asset('assets/images/products/').'/'.$sproduct->image }}"
                                                         alt="">
                                                    <img class="hover-img"
                                                         src="{{ asset('assets/images/products/').'/'.$sproduct->image }}"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                   {{--                                                   data-bs-toggle="modal" data-bs-target="#quickViewModal"--}}
                                                   wire:click.prevent="$emitTo('front-end-modal', 'quickViewRefresh', {{$sproduct->id}})">
                                                    <i class="fi-rs-eye"></i></a>

                                                @if($witems->contains($sproduct->id))
                                                    <a aria-label="Add To Wishlist"
                                                       class="action-btn small hover-up product-wish"
                                                       wire:click.prevent="removeFromWishlist({{$sproduct->id}})"
                                                       href="javascript:;" tabindex="0">
                                                        <i class="fi-rs-heart"></i>
                                                    </a>
                                                @else
                                                    <a aria-label="Add To Wishlist"
                                                       class="action-btn small hover-up"
                                                       wire:click.prevent="addToWishlist({{$sproduct->id}}, '{{$sproduct->name}}', {{$sproduct->regular_price}})"
                                                       href="javascript:;" tabindex="0">
                                                        <i class="fi-rs-heart"></i>
                                                    </a>
                                                @endif

                                                {{--                                            <a aria-label="Compare" class="action-btn small hover-up"--}}
                                                {{--                                               href="shop-compare.html"--}}
                                                {{--                                                                                   tabindex="0"><i class="fi-rs-shuffle"></i></a>--}}
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up"
                                                   href="javascript:;"
                                                   wire:click.prevent="store({{$sproduct->id}}, '{{$sproduct->name}}', {{$sproduct->sale_price}})">
                                                    <i class="fi-rs-shopping-bag-add"></i>
                                                </a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot bg-danger">En oferta</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <h2>
                                                <a href="{{ route('product.details', ['slug' => $sproduct->slug]) }}">{{ $sproduct->name }}</a>
                                            </h2>
                                            <div class="rating-result" title="90%">

                                            </div>
                                            <div class="product-price">
                                                <span>S/ {{ $sproduct->sale_price }}</span>
                                                <span class="old-price">S/ {{ $sproduct->regular_price }}</span>
                                            </div>

                                        </div>

                                    </div>

                                    <!--End product-cart-wrap-2-->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="banners mb-15 mt-25" wire:ignore>
        <div class="container">
            <div class="card">
                <div class="col-md-12 pl-20 pt-20 pb-15" style="background-color: var(--st-patricks-blue);">
                    <h3 class="section-title text-white">
                        <span>RECIEN </span> LLEGADOS
                    </h3>
                </div>


                <div class="col-12">
                    <div class="banner-bg wow fadeIn animated img-banner"
                         style="background-image: url('{{ asset('assets/images/banner-1.jpg') }}');">
                        <div class="banner-content" style="position: relative">
                            {{--                            <h5 class="text-white mb-15">Shop Today’s Deals</h5>--}}
                            {{--                            <h2 class="fw-600 text-white">Happy <span class="text-brand text-white">Mother's Day</span>.--}}
                            {{--                                Big Sale Up to 40%--}}
                            {{--                            </h2>--}}
                        </div>
                    </div>
                </div>
                <div class="container wow fadeIn animated pb-10">
                    <div class="carausel-6-columns-cover position-relative">
                        <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                             id="carausel-new-columns-2-arrows"></div>
                        <div class="carausel-new-columns carausel-arrow-center" id="carausel-new-columns-2">
                            @foreach($lproducts as $product)
                                <div class="product-cart-wrap small hover-up">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                <img class="default-img"
                                                     src="{{ asset('assets/images/products/').'/'.$product->image }}"
                                                     alt="">
                                                <img class="hover-img"
                                                     src="{{ asset('assets/images/products/').'/'.$product->image }}"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up"
                                               data-bs-toggle="modal"
                                               data-bs-target="#quickViewModal">
                                                <i class="fi-rs-eye"></i></a>
                                            @if($witems->contains($product->id))
                                                <a aria-label="Add To Wishlist"
                                                   class="action-btn small hover-up product-wish"
                                                   wire:click.prevent="removeFromWishlist({{$product->id}})"
                                                   href="javascript:;" tabindex="0">
                                                    <i class="fi-rs-heart"></i>
                                                </a>
                                            @else
                                                <a aria-label="Add To Wishlist"
                                                   class="action-btn small hover-up"
                                                   wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"
                                                   href="javascript:;" tabindex="0">
                                                    <i class="fi-rs-heart"></i>
                                                </a>
                                            @endif
                                            {{--                                            <a aria-label="Compare" class="action-btn small hover-up"--}}
                                            {{--                                               href="shop-compare.html"--}}
                                            {{--                                                                                   tabindex="0"><i class="fi-rs-shuffle"></i></a>--}}
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up"
                                               wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{($product->sale_price > 0 && $_sale)?$product->sale_price:$product->regular_price}})"
                                               href="javascript:;"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if($product->sale_price > 0 && $_sale)
                                                <span class="hot bg-danger">En oferta</span>
                                            @else
                                                <span class="new bg-success">Nuevo producto</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $product->category->name }}</a>
                                        </div>
                                        <h2>
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                        </h2>
                                        <div class="rating-result" title="90%">

                                        </div>
                                        <div class="product-price">
                                            @if($product->sale_price > 0 && $_sale)
                                                <span>S/ {{ $product->sale_price }}</span>
                                                <span class="old-price">S/ {{ $product->regular_price }}</span>
                                            @else
                                                <span>S/ {{ $product->regular_price }}</span>
                                            @endif
                                            {{--                                        <span class="old-price">S/ {{ $product->regular_price }}</span>--}}
                                        </div>

                                    </div>

                                </div>

                                <!--End product-cart-wrap-2-->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-grey-9 section-padding" wire:ignore>
        <div class="container pt-25 pb-25">
            <div class="card">
                <div class="col-md-12 pl-20 pt-20 pb-15" style="background-color: var(--st-patricks-blue);">
                    <h3 class="section-title text-white">
                        <span>PRODUCTOS  </span> POR CATEGORIAS
                    </h3>
                </div>

                <div class="col-12">
                    <div class="banner-bg wow fadeIn animated img-banner"
                         style="background-image: url('{{ asset('assets/images/banner-1.jpg') }}');">
                        <div class="banner-content" style="position: relative">
                            {{--                            <h5 class="text-white mb-15">Shop Today’s Deals</h5>--}}
                            {{--                            <h2 class="fw-600 text-white">Happy <span class="text-brand text-white">Mother's Day</span>.--}}
                            {{--                                Big Sale Up to 40%--}}
                            {{--                            </h2>--}}
                        </div>
                    </div>
                </div>

                <div class="heading-tab d-flex p-20">

                    <div class="heading-tab-right wow fadeIn animated">
                        <ul class="nav nav-tabs right no-border" id="myTab-1" role="tablist">
                            @foreach($categories as $key => $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ ($key == 0)?'active':'' }}" id="nav-tab-{{ $key }}-1"
                                            data-bs-toggle="tab"
                                            data-bs-target="#tab-{{ $key }}-1" type="button" role="tab"
                                            aria-controls="tab-{{ $key }}"
                                            aria-selected="true">{{ $category->name }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row p-20">

                    <div class="col-lg-12 col-md-12">
                        <div class="tab-content wow fadeIn animated" id="myTabContent-1">
                            @foreach($categories as $key => $category)
                                <div class="tab-pane fade show {{ ($key == 0)?'active':'' }}" id="tab-{{ $key }}-1"
                                     role="tabpanel"
                                     aria-labelledby="tab-{{ $key }}-1">
                                    <div class="carausel-4-columns-cover arrow-center position-relative">
                                        <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                             id="carausel-4-columns-{{ $key }}-arrows"></div>
                                        <div class="carausel-4-columns carausel-arrow-center"
                                             id="carausel-4-columns-{{ $key }}">
                                            @php
                                                $c_products =  \App\Models\Product::where('category_id', $category->id)->get()->take($no_of_products);
                                            @endphp
                                            @foreach($c_products as $c_product)
                                                <div class="product-cart-wrap">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ route('product.details', ['slug' => $c_product->slug]) }}">
                                                                <img class="default-img"
                                                                     src="{{ asset('assets/images/products').'/'.$c_product->image }}"
                                                                     alt="">
                                                                <img class="hover-img"
                                                                     src="{{ asset('assets/images/products').'/'.$c_product->image }}"
                                                                     alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="Quick view" class="action-btn small hover-up"
                                                               data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                                <i class="fi-rs-eye"></i></a>
                                                            @if($witems->contains($c_product->id))
                                                                <a aria-label="Add To Wishlist"
                                                                   class="action-btn small hover-up product-wish"
                                                                   wire:click.prevent="removeFromWishlist({{$c_product->id}})"
                                                                   href="javascript:;" tabindex="0">
                                                                    <i class="fi-rs-heart"></i>
                                                                </a>
                                                            @else
                                                                <a aria-label="Add To Wishlist"
                                                                   class="action-btn small hover-up"
                                                                   wire:click.prevent="addToWishlist({{$c_product->id}}, '{{$c_product->name}}', {{$c_product->regular_price}})"
                                                                   href="javascript:;" tabindex="0">
                                                                    <i class="fi-rs-heart"></i>
                                                                </a>
                                                            @endif
                                                            {{--                                                    <a aria-label="Compare" class="action-btn small hover-up"--}}
                                                            {{--                                                       href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>--}}
                                                        </div>
                                                        <div class="product-action-1 show">
                                                            <a aria-label="Add To Cart" class="action-btn hover-up"
                                                               wire:click.prevent="store({{$c_product->id}}, '{{$c_product->name}}', {{($c_product->sale_price > 0 && $_sale)?$c_product->sale_price:$c_product->regular_price}})"
                                                               href="shop-cart.html"><i
                                                                    class="fi-rs-shopping-bag-add"></i></a>
                                                        </div>
                                                        <div
                                                            class="product-badges product-badges-position product-badges-mrg">
                                                            @if($c_product->sale_price > 0 && $_sale)
                                                                <span class="hot bg-danger">En oferta</span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <div class="product-category">
                                                            <a href="shop-grid-right.html">{{ $c_product->category->name }}</a>
                                                        </div>
                                                        <h2>
                                                            <a href="{{ route('product.details', ['slug' => $c_product->slug]) }}">{{ $c_product->name }}</a>
                                                        </h2>
                                                        {{--                                                <div class="rating-result" title="90%">--}}
                                                        {{--                                                    <span>--}}
                                                        {{--                                                        <span>70%</span>--}}
                                                        {{--                                                    </span>--}}
                                                        {{--                                                </div>--}}
                                                        <div class="product-price">
                                                            @if($c_product->sale_price > 0 && $_sale)
                                                                <span>S/ {{ $c_product->sale_price }}</span>
                                                                <span
                                                                    class="old-price">S/ {{ $c_product->regular_price }}</span>
                                                            @else
                                                                <span>S/ {{ $c_product->regular_price }}</span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!--End Col-lg-9-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" wire:ignore>
        <div class="container">
            <div class="card">
                <div class="col-md-12 pl-20 pt-20 pb-15" style="background-color: var(--st-patricks-blue);">
                    <h3 class="section-title text-white"><span>MARCAS </span> DESTACADAS
                    </h3>
                </div>
                <div class="container">
                    <div class="carausel-6-columns-cover position-relative wow fadeIn animated pt-20 mt-60 pb-20">
                        <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                             id="carausel-6-columns-3-arrows"></div>
                        <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                            @foreach($brands as $brand)
                                <div class="brand-logo">
                                    <img class="img-grey-hover"
                                         src="{{ asset('assets/images/brands/').'/'.$brand->image }}"
                                         alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured section-padding position-relative">
        <div class="container">

            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/frontend/imgs/theme/icons/feature-1.png') }}" alt="">
                        <h4 class="bg-1">Envío gratis</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/frontend/imgs/theme/icons/feature-2.png') }}" alt="">
                        <h4 class="bg-3">Pedido en línea</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/frontend/imgs/theme/icons/feature-3.png') }}" alt="">
                        <h4 class="bg-2">Ahorrar dinero</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/frontend/imgs/theme/icons/feature-4.png') }}" alt="">
                        <h4 class="bg-4">Promociones</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/frontend/imgs/theme/icons/feature-5.png') }}" alt="">
                        <h4 class="bg-5">Venta feliz</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/frontend/imgs/theme/icons/feature-6.png') }}" alt="">
                        <h4 class="bg-6">24/7 Soporte</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('styles')
    <style>
        .img-banner {
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
        }

        .img-banner:before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(7, 15, 28, 0.74) !important;
        }

        .slider-page {
            width: 690px;
            height: 492px;
        }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            window.livewire.on('addCart', () => {
                notificationSwal(`¡Se agregó extosamente al <b class="fst-italic">Carrito de compras</b>!`, 'rgba(8,64,129,0.9)');
            });

            window.livewire.on('addWishlist', () => {
                notificationSwal(`¡Se agregó extosamente <b class="fst-italic">a la Lista de deseos</b>!`, 'rgba(8,64,129,0.9)');
            });

            window.livewire.on('showQuickView', () => {
                $('#quickViewModal').modal('show');
            });
        });

        $(".carausel-sale-columns").each(function (key, item) {
            var id = $(this).attr("id");
            var sliderID = '#' + id;
            var appendArrowsClassName = '#' + id + '-arrows'

            $(sliderID).slick({
                dots: false,
                infinite: true,
                speed: 1000,
                arrows: true,
                autoplay: true,
                slidesToShow: 6,
                slidesToScroll: 1,
                loop: true,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ],
                prevArrow: '<span class="slider-btn slider-prev"><i class="fi-rs-angle-left"></i></span>',
                nextArrow: '<span class="slider-btn slider-next"><i class="fi-rs-angle-right"></i></span>',
                appendArrows: (appendArrowsClassName),
            });
        });

        $(".carausel-new-columns").each(function (key, item) {
            var id = $(this).attr("id");
            var sliderID = '#' + id;
            var appendArrowsClassName = '#' + id + '-arrows'

            $(sliderID).slick({
                dots: false,
                infinite: true,
                speed: 1000,
                arrows: true,
                autoplay: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                loop: true,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ],
                prevArrow: '<span class="slider-btn slider-prev"><i class="fi-rs-angle-left"></i></span>',
                nextArrow: '<span class="slider-btn slider-next"><i class="fi-rs-angle-right"></i></span>',
                appendArrows: (appendArrowsClassName),
            });
        });

    </script>
@endpush
