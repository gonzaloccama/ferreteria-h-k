@push('styles')
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

<div>
    @push('title'){{ $titlePage }}@endpush
    @php
        $witems = Cart::instance('wishlist')->content()->pluck('id');
    @endphp
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Inicio</a>
                <span></span> Producto
                <span></span> {{ $product->name }}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12" wire:ignore>
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">

                                        <figure class="border-radius-10">
                                            <img src="{{ asset('assets/images/products/').'/'. $product->image }}"
                                                 alt="product image">
                                        </figure>

                                        <figure class="border-radius-10">
                                            <img src="{{ asset('assets/images/products/1627864043.jpg') }}"
                                                 alt="product image">
                                        </figure>

                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        <div><img src="{{ asset('assets/images/products/').'/'. $product->image }}"
                                                  alt="product image"></div>
                                        <div><img src="{{ asset('assets/images/products/1627864043.jpg') }}"
                                                  alt="product image"></div>

                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-facebook.svg') }}"
                                                    alt=""></a></li>
                                        <li class="social-twitter"><a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-twitter.svg') }}"
                                                    alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-instagram.svg') }}"
                                                    alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-pinterest.svg') }}"
                                                    alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{ $product->name }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Marca: <a href="shop-grid-right.html">Steal</a></span>
                                        </div>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            @if($s=$product->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
                                                <ins><span class="text-brand">S/ {{ $product->sale_price }}</span></ins>
                                                <ins><span
                                                        class="old-price font-md ml-15">S/ {{ $product->regular_price }}</span>
                                                </ins>
                                            @else
                                                <ins><span class="text-brand">S/ {{ $product->regular_price }}</span>
                                                </ins>
                                            @endif
                                            {{--                                            <span class="save-price  font-md color3 ml-15">25% Off</span>--}}
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        {!! $product->short_description !!}
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        {{--                                        <ul>--}}
                                        {{--                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand--}}
                                        {{--                                                Warranty--}}
                                        {{--                                            </li>--}}
                                        {{--                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy--}}
                                        {{--                                            </li>--}}
                                        {{--                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>--}}
                                        {{--                                        </ul>--}}
                                    </div>
                                    {{--                                    <div class="attr-detail attr-color mb-15">--}}
                                    {{--                                        <strong class="mr-10">Color</strong>--}}
                                    {{--                                        <ul class="list-filter color-filter">--}}
                                    {{--                                            <li><a href="#" data-color="Red"><span class="product-color-red"></span></a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li><a href="#" data-color="Yellow"><span--}}
                                    {{--                                                        class="product-color-yellow"></span></a></li>--}}
                                    {{--                                            <li class="active"><a href="#" data-color="White"><span--}}
                                    {{--                                                        class="product-color-white"></span></a></li>--}}
                                    {{--                                            <li><a href="#" data-color="Orange"><span--}}
                                    {{--                                                        class="product-color-orange"></span></a></li>--}}
                                    {{--                                            <li><a href="#" data-color="Cyan"><span--}}
                                    {{--                                                        class="product-color-cyan"></span></a></li>--}}
                                    {{--                                            <li><a href="#" data-color="Green"><span class="product-color-green"></span></a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li><a href="#" data-color="Purple"><span--}}
                                    {{--                                                        class="product-color-purple"></span></a></li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="attr-detail attr-size">--}}
                                    {{--                                        <strong class="mr-10">Size</strong>--}}
                                    {{--                                        <ul class="list-filter size-filter font-small">--}}
                                    {{--                                            <li><a href="#">S</a></li>--}}
                                    {{--                                            <li class="active"><a href="#">M</a></li>--}}
                                    {{--                                            <li><a href="#">L</a></li>--}}
                                    {{--                                            <li><a href="#">XL</a></li>--}}
                                    {{--                                            <li><a href="#">XXL</a></li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </div>--}}
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <div class="detail-extralink">

                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down" wire:click.prevent="refreshQuantity(false)"><i
                                                    class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val" wire:model="qty">{{ $qty }}</span>
                                            <a href="#" class="qty-up" wire:click.prevent="refreshQuantity"><i
                                                    class="fi-rs-angle-small-up"></i></a>
                                        </div>

                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart"
                                                    @if($s)
                                                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})"
                                                    @else
                                                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})"
                                                @endif >
                                                Add to cart
                                            </button>
                                            @if($witems->contains($product->id))
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up product-wish"
                                                   wire:click.prevent="removeFromWishlist({{$product->id}})"
                                                   href="javascript:;"><i class="fi-rs-heart"></i>
                                                </a>
                                            @else
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                   wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"
                                                   href="javascript:;"><i class="fi-rs-heart"></i>
                                                </a>
                                            @endif
                                            {{--                                            <a aria-label="Compare" class="action-btn hover-up"--}}
                                            {{--                                               href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>--}}
                                        </div>
                                    </div>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#">{{ $product->SKU }}</a></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3 card">
                            <ul class="nav nav-tabs text-uppercase card-header">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                       href="#Description">DESCRIPCIÓN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                       href="#Additional-info">CARACTERISTICAS</a>
                                </li>
                                @if($product->video_url != '')
                                    <li class="nav-item">
                                        <a class="nav-link" id="video-info-tab" data-bs-toggle="tab"
                                           href="#video-info">VIDEO</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">VALORACIÓN
                                        (3)</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content card-body">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>{!! $product->description !!}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Additional-info">
                                    <table class="font-md">
                                        <tbody>
                                        <tr class="stand-up">
                                            <th>Stand Up</th>
                                            <td>
                                                <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-wo-wheels">
                                            <th>Folded (w/o wheels)</th>
                                            <td>
                                                <p>32.5″L x 18.5″W x 16.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-w-wheels">
                                            <th>Folded (w/ wheels)</th>
                                            <td>
                                                <p>32.5″L x 24″W x 18.5″H</p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if($product->video_url != '')
                                    <div class="tab-pane fade" id="video-info">
                                        <video
                                            id="vid1"
                                            class="video-js vjs-theme-sea"
                                            controls
                                            width="640"
                                            data-setup='{ "controlBar": { "muteToggle": false }, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $product->video_url }}"}] }'
                                        >
                                        </video>
                                    </div>
                                @endif
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Customer questions & answers</h4>
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img
                                                                    src="{{ asset('assets/frontend/imgs/page/avatar-6.jpg') }}"
                                                                    alt="">
                                                                <h6><a href="#">Jacky Chan</a></h6>
                                                                <p class="font-xxs">Since 2012</p>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <p>Thank you very fast shipping from Poland only
                                                                    3days.</p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30">December 4, 2020 at
                                                                            3:12 pm </p>
                                                                        <a href="#" class="text-brand btn-reply">Reply
                                                                            <i class="fi-rs-arrow-right"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--single-comment -->
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img
                                                                    src="{{ asset('assets/frontend/imgs/page/avatar-7.jpg') }}"
                                                                    alt="">
                                                                <h6><a href="#">Ana Rosie</a></h6>
                                                                <p class="font-xxs">Since 2008</p>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <p>Great low price and works well.</p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30">December 4, 2020 at
                                                                            3:12 pm </p>
                                                                        <a href="#" class="text-brand btn-reply">Reply
                                                                            <i class="fi-rs-arrow-right"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--single-comment -->
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img
                                                                    src="{{ asset('assets/frontend/imgs/page/avatar-8.jpg') }}"
                                                                    alt="">
                                                                <h6><a href="#">Steven Keny</a></h6>
                                                                <p class="font-xxs">Since 2010</p>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <p>Authentic and Beautiful, Love these way more than
                                                                    ever expected They are Great earphones</p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30">December 4, 2020 at
                                                                            3:12 pm </p>
                                                                        <a href="#" class="text-brand btn-reply">Reply
                                                                            <i class="fi-rs-arrow-right"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--single-comment -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <h4 class="mb-30">Customer reviews</h4>
                                                <div class="d-flex mb-30">
                                                    <div class="product-rate d-inline-block mr-15">
                                                        <div class="product-rating" style="width:90%">
                                                        </div>
                                                    </div>
                                                    <h6>4.8 out of 5</h6>
                                                </div>
                                                <div class="progress">
                                                    <span>5 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 50%;"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>4 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>3 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 45%;"
                                                         aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>2 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 65%;"
                                                         aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%
                                                    </div>
                                                </div>
                                                <div class="progress mb-30">
                                                    <span>1 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 85%;"
                                                         aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%
                                                    </div>
                                                </div>
                                                <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--comment form-->
                                    <div class="comment-form">
                                        <h4 class="mb-15">Add a review</h4>
                                        <div class="product-rate d-inline-block mb-30">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <form class="form-contact comment_form" action="#" id="commentForm">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control w-100" name="comment"
                                                                          id="comment" cols="30" rows="9"
                                                                          placeholder="Write Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="name" id="name"
                                                                       type="text" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="email" id="email"
                                                                       type="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <input class="form-control" name="website" id="website"
                                                                       type="text" placeholder="Website">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="button button-contactForm">Submit
                                                            Review
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
