<main id="main" class="main-site left-sidebar">

    <div class="container">


        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ URL::to('/') }}" class="link">home</a></li>
                <li class="item-link"><span>Digital & Electronics</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{ asset('assets/images/shop-banner.jpg') }}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Digital & Electronics</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby">
                            <select name="orderby" class="use-chosen" wire:model="sorting">
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="page_size">
                                <option value="3">3 per page</option>
                                <option value="6">6 per page</option>
                                <option value="9">9 per page</option>
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="24">24 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->

                <div class="row">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success</strong> {{ Session::get('success_message') }}
                        </div>
                    @endif

                    <ul class="product-list grid-products equal-container">
                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @foreach($products as $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug'=>$product->slug]) }}"
                                           title="{{ $product->name }}">
                                            <figure><img
                                                    src="{{ asset('assets/images/products/').'/'.$product->image }}"
                                                    alt="{{ $product->name }}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug'=>$product->slug]) }}"
                                           class="product-name"><span>{{ $product->name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">${{ $product->regular_price }}</span></div>
                                        <a href="javascript:;" class="btn add-to-cart"
                                           wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})">Add
                                            To Cart</a>
                                        <div class="product-wish">
                                            @if($witems->contains($product->id))
                                                <a href="javascript:;" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                            @else
                                                <a href="javascript:;"
                                                   wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"><i
                                                        class="fa fa-heart"></i></a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{ $products->links('livewire.widgets.livewire-pagination-links') }}
{{--                                        <ul class="page-numbers">--}}
{{--                                            <li><span class="page-number-item current">1</span></li>--}}
{{--                                            <li><a class="page-number-item" href="#">2</a></li>--}}
{{--                                            <li><a class="page-number-item" href="#">3</a></li>--}}
{{--                                            <li><a class="page-number-item next-link" href="#">Next</a></li>--}}
{{--                                        </ul>--}}
{{--                                        <p class="result-count">Showing 1-8 of 12 result</p>--}}
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category">
{{--                                                        <li class="category-item has-child-cate">--}}
{{--                                                            <a href="#" class="cate-link">Fashion & Accessories</a>--}}
{{--                                                            <span class="toggle-control">+</span>--}}
{{--                                                            <ul class="sub-cate">--}}
{{--                                                                <li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>--}}
{{--                                                                <li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>--}}
{{--                                                                <li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>--}}
{{--                                                            </ul>--}}
{{--                                                        </li>--}}
                            @foreach($categories as $category)
                                <li class="category-item">
                                    <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}"
                                       class="cate-link">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Brand</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                            <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a>
                            </li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a>
                            </li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone &
                                    Tablets</a></li>
                            <li class="list-item"><a
                                    data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>'
                                    class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down"
                                                                                               aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div><!-- brand widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price</h2>
                    <div class="widget-content" style="padding: 10px 5px 40px 5px;">
                        <div id="slider" wire:ignore></div>
                    </div>
                    <b class="text-gray-800">MIN:</b><b class="text-info"> ${{ $min_price }}</b><br>
                    <b class="text-gray-800">MAX:</b><b class="text-info"> ${{ $max_price }}</b>
                    <hr>
                </div><!-- Price-->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Color</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list has-count-index">
                            <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
                        </ul>
                    </div>
                </div><!-- Color -->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Size</h2>
                    <div class="widget-content">
                        <ul class="list-style inline-round ">
                            <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                            <li class="list-item"><a class="filter-link " href="#">M</a></li>
                            <li class="list-item"><a class="filter-link " href="#">l</a></li>
                            <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                        </ul>
                        <div class="widget-banner">
                            <figure><img src="{{ asset('assets/images/size-banner-widget.jpg') }}" width="270"
                                         height="331" alt=""></figure>
                        </div>
                    </div>
                </div><!-- Size -->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_01.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_18.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_20.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>


<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery" wire:ignore>
                            <ul class="slides">

                                <li data-thumb="{{ asset('assets/images/products/').'/'.$product->image }}">
                                    <img src="{{ asset('assets/images/products/').'/'.$product->image }}"
                                         alt="{{ $product->name }}"/>
                                </li>

                                <li data-thumb="{{ asset('assets/images/products/digital_17.jpg') }}">
                                    <img src="{{ asset('assets/images/products/digital_17.jpg') }}"
                                         alt="product thumbnail"/>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <a href="#" class="count-review">(05 review)</a>
                        </div>
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div class="short-desc">
                            {!! $product->short_description !!}
                            {{--                            <ul>--}}
                            {{--                                <li>7,9-inch LED-backlit, 130Gb</li>--}}
                            {{--                                <li>Dual-core A7 with quad-core graphics</li>--}}
                            {{--                                <li>FaceTime HD Camera 7.0 MP Photos</li>--}}
                            {{--                            </ul>--}}
                        </div>
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{ asset('assets/images/social-list.png') }}"
                                                                 alt=""></a>
                        </div>
                        @if($product->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
                            <div class="wrap-price">
                                <span class="product-price">${{ $product->sale_price }}</span>
                                <del><span class="product-price reg-price">${{ $product->regular_price }}</span></del>
                            </div>
                        @else
                            <div class="wrap-price">
                                <span class="product-price">${{ $product->regular_price }}</span>
                            </div>
                        @endif
                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>{{ $product->stock_status }}</b></p>
                        </div>
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*"
                                       wire:model="qty">

                                <a class="btn btn-reduce" href="#" wire:click.prevent="refreshQuantity(false)"></a>
                                <a class="btn btn-increase" href="#" wire:click.prevent="refreshQuantity"></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            @if($product->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
                                <a href="javascript:;"
                                   wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})"
                                   class="btn add-to-cart">Add to Cart</a>
                            @else
                                <a href="javascript:;"
                                   wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})"
                                   class="btn add-to-cart">Add to Cart</a>
                            @endif
                            <div class="wrap-btn">
                                <a href="#" class="btn btn-compare">Add Compare</a>
                                <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                            </div>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                <p>{!! $product->description !!}</p>
                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <table class="shop_attributes">
                                    <tbody>
                                    <tr>
                                        <th>Weight</th>
                                        <td class="product_weight">1 kg</td>
                                    </tr>
                                    <tr>
                                        <th>Dimensions</th>
                                        <td class="product_dimensions">12 x 15 x 23 cm</td>
                                    </tr>
                                    <tr>
                                        <th>Color</th>
                                        <td><p>Black, Blue, Grey, Violet, Yellow</p></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content-item " id="review">

                                <div class="wrap-review-form">

                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">01 review for <span>Radiant-360 R6 Chainsaw Omnidirectional [Orage]</span>
                                        </h2>
                                        <ol class="commentlist">
                                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                id="li-comment-20">
                                                <div id="comment-20" class="comment_container">
                                                    <img alt="" src="{{ asset('assets/images/author-avata.jpg') }}"
                                                         height="80" width="80">
                                                    <div class="comment-text">
                                                        <div class="star-rating">
                                                            <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
                                                        </div>
                                                        <p class="meta">
                                                            <strong class="woocommerce-review__author">admin</strong>
                                                            <span class="woocommerce-review__dash">–</span>
                                                            <time class="woocommerce-review__published-date"
                                                                  datetime="2008-02-14 20:00">Tue, Aug 15, 2017
                                                            </time>
                                                        </p>
                                                        <div class="description">
                                                            <p>Pellentesque habitant morbi tristique senectus et netus
                                                                et malesuada fames ac turpis egestas.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div><!-- #comments -->

                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">

                                                <form action="#" method="post" id="commentform" class="comment-form"
                                                      novalidate="">
                                                    <p class="comment-notes">
                                                        <span
                                                            id="email-notes">Your email address will not be published.</span>
                                                        Required fields are marked <span class="required">*</span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <span>Your rating</span>
                                                        <p class="stars">

                                                            <label for="rated-1"></label>
                                                            <input type="radio" id="rated-1" name="rating" value="1">
                                                            <label for="rated-2"></label>
                                                            <input type="radio" id="rated-2" name="rating" value="2">
                                                            <label for="rated-3"></label>
                                                            <input type="radio" id="rated-3" name="rating" value="3">
                                                            <label for="rated-4"></label>
                                                            <input type="radio" id="rated-4" name="rating" value="4">
                                                            <label for="rated-5"></label>
                                                            <input type="radio" id="rated-5" name="rating" value="5"
                                                                   checked="checked">
                                                        </p>
                                                    </div>
                                                    <p class="comment-form-author">
                                                        <label for="author">Name <span class="required">*</span></label>
                                                        <input id="author" name="author" type="text" value="">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label for="email">Email <span class="required">*</span></label>
                                                        <input id="email" name="email" type="email" value="">
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your review <span class="required">*</span>
                                                        </label>
                                                        <textarea id="comment" name="comment" cols="45"
                                                                  rows="8"></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit"
                                                               value="Submit">
                                                    </p>
                                                </form>

                                            </div><!-- .comment-respond-->
                                        </div><!-- #review_form -->
                                    </div><!-- #review_form_wrapper -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach($popular_product as $popular)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{ route('product.details', ['slug' => $popular->slug]) }}"
                                               title="{{ $popular->name }}">
                                                <figure><img
                                                        src="{{ asset('assets/images/products/').'/'.$popular->image }}"
                                                        alt="{{ $popular->name }}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details', ['slug'=>$popular->slug]) }}"
                                               class="product-name"><span>{{ $popular->name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">${{ $popular->regular_price }}</span></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div><!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site" wire:ignore>
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                             data-loop="false" data-nav="true" data-dots="false"
                             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                            @foreach($related_product as $related)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $related->slug]) }}"
                                           title="{{ $related->name }}">
                                            <figure>
                                                <img src="{{ asset('assets/images/products/') . '/' . $related->image}}"
                                                     width="214" height="214"
                                                     alt="{{ $related->name }}">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                            <span class="flash-item sale-label">sale</span>
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{ $related->name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">${{ $related->regular_price }}</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div>

        </div><!--end row-->

    </div><!--end container-->

</main>

{{--CART--}}
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ URL::to('/') }}" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">

            <div class="wrap-iten-in-cart">

                @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>Success</strong> {{ Session::get('success_message') }}
                    </div>
                @endif

                @if(Cart::instance('cart')->count() > 0)
                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">
                        @foreach(Cart::instance('cart')->content() as $item)
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure>
                                        <img src="{{ asset('assets/images/products/').'/'.$item->model->image }}"
                                             alt="{{ $item->model->name }}">
                                    </figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product"
                                       href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}
                                    </a>
                                </div>
                                <div class="price-field produtc-price"><p class="price">
                                        ${{ $item->model->regular_price }}</p>
                                </div>
                                <div class="quantity">
                                    <div class="quantity-input">
                                        <input type="text" name="product-quatity" value="{{ $item->qty }}"
                                               data-max="120" pattern="[0-9]*">
                                        <a class="btn btn-increase" href="#"
                                           wire:click.prevent="refreshQuantity('{{ $item->rowId }}')"></a>
                                        <a class="btn btn-reduce" href="#"
                                           wire:click.prevent="refreshQuantity('{{ $item->rowId }}', false)"></a>
                                    </div>
                                    <p class="text-center">
                                        <a href=""
                                           wire:click.prevent="switchToSaveForLater('{{ $item->rowId }}')">Save for later</a>
                                    </p>
                                </div>
                                <div class="price-field sub-total"><p class="price">${{ $item->subtotal }}</p></div>
                                <div class="delete">
                                    <a href="#" class="btn btn-delete" title=""
                                       wire:click.prevent="destroy('{{ $item->rowId }}')">
                                        <span>Delete from your cart</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-danger">Ningún artículo en el carrito</p>
                @endif
            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b
                            class="index">${{ Cart::instance('cart')->subtotal() }}</b></p>
                    <p class="summary-info"><span class="title">Tax</span><b
                            class="index">${{ Cart::instance('cart')->tax() }}</b></p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info total-info "><span class="title">Total</span><b
                            class="index">${{ Cart::instance('cart')->total() }}</b></p>
                </div>
                <div class="checkout-info">
                    <label class="checkbox-field">
                        <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                    </label>
                    <a class="btn btn-checkout" href="checkout.html">Check out</a>
                    <a class="link-to-shop" href="{{ route('shop') }}">Continue Shopping<i
                            class="fa fa-arrow-circle-right"
                            aria-hidden="true"></i></a>
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#"
                       wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                    <a class="btn btn-update" href="#">Update Shopping Cart</a>
                </div>
            </div>

            <div class="wrap-iten-in-cart">

                <h3 class="title-box" style="border-bottom: 1px solid; padding-bottom: 15px;">
                    {{ Cart::instance('saveForLater')->count() }} item(s) Save for later
                </h3>

                @if(Cart::instance('saveForLater')->count() > 0)
                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">
                        @foreach(Cart::instance('saveForLater')->content() as $item)
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure>
                                        <img src="{{ asset('assets/images/products/').'/'.$item->model->image }}"
                                             alt="{{ $item->model->name }}">
                                    </figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product"
                                       href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}
                                    </a>
                                </div>
                                <div class="price-field produtc-price"><p class="price">
                                        ${{ $item->model->regular_price }}</p>
                                </div>
                                <div class="quantity">
                                    <p class="text-center">
                                        <a href=""
                                           wire:click.prevent="moveToCart('{{ $item->rowId }}')">
                                            Move to Cart
                                        </a>
                                    </p>
                                </div>

                                <div class="delete">
                                    <a href="#" class="btn btn-delete" title=""
                                       wire:click.prevent="deleteFromForLater('{{ $item->rowId }}')">
                                        <span>Delete from save for later</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-danger">No item save for later</p>
                @endif
            </div>


            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                         data-loop="false" data-nav="true" data-dots="false"
                         data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_04.jpg') }}" width="214"
                                                 height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}" width="214"
                                                 height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price">
                                    <ins><p class="product-price">$168.00</p></ins>
                                    <del><p class="product-price">$250.00</p></del>
                                </div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_15.jpg') }}" width="214"
                                                 height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price">
                                    <ins><p class="product-price">$168.00</p></ins>
                                    <del><p class="product-price">$250.00</p></del>
                                </div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_01.jpg') }}" width="214"
                                                 height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_21.jpg') }}" width="214"
                                                 height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_03.jpg') }}" width="214"
                                                 height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price">
                                    <ins><p class="product-price">$168.00</p></ins>
                                    <del><p class="product-price">$250.00</p></del>
                                </div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_04.jpg') }}" width="214"
                                                 height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products/digital_05.jpg') }}" width="214"
                                                 height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>
                    </div>
                </div><!--End wrap-products-->
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>

{{--WISHLIST--}}
<main id="main" class="main-site left-sidebar">

    <div class="container">


        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ URL::to('/') }}" class="link">home</a></li>
                <li class="item-link"><span>Wishlist</span></li>
            </ul>
        </div>
        <div class="row">
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <strong>Success</strong> {{ Session::get('success_message') }}
                </div>
            @endif
            @if(Cart::instance('wishlist')->content()->count() > 0)
                <ul class="product-list grid-products equal-container">
                    @foreach(Cart::instance('wishlist')->content() as $item)
                        <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}"
                                       title="{{ $item->model->name }}">
                                        <figure><img
                                                src="{{ asset('assets/images/products/').'/'.$item->model->image }}"
                                                alt="{{ $item->model->name }}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}"
                                       class="product-name"><span>{{ $item->model->name }}</span></a>
                                    <div class="wrap-price"><span
                                            class="product-price">${{ $item->model->regular_price }}</span></div>
                                    <a href="javascript:;" class="btn add-to-cart"
                                       wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')">
                                        Move To Cart</a>
                                    <div class="product-wish">

                                        <a href="javascript:;"
                                           wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i
                                                class="fa fa-heart fill-heart"></i></a>

                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-danger text-center">No items Wishlist</div>
            @endif
        </div>
    </div>
</main>

{{--CATEGORY PRODUCT--}}
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ URL::to('/') }}" class="link">home</a></li>
                <li class="item-link"><span>Product Categories</span></li>
                <li class="item-link"><span>{{ $category_name }}</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{ asset('assets/images/shop-banner.jpg') }}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Digital & Electronics</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model="sorting">
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="page_size">
                                <option value="3">3 per page</option>
                                <option value="6">6 per page</option>
                                <option value="9">9 per page</option>
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="24">24 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach($products as $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug'=>$product->slug]) }}"
                                           title="{{ $product->name }}">
                                            <figure><img
                                                    src="{{ asset('assets/images/products/').'/'.$product->image }}"
                                                    alt="{{ $product->name }}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug'=>$product->slug]) }}"
                                           class="product-name"><span>{{ $product->name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">${{ $product->regular_price }}</span></div>
                                        <a href="javascript:;" class="btn add-to-cart"
                                           wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})">Add
                                            To Cart</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{ $products->links('livewire.widgets.livewire-pagination-links') }}
                    {{--                    <ul class="page-numbers">--}}
                    {{--                        <li><span class="page-number-item current">1</span></li>--}}
                    {{--                        <li><a class="page-number-item" href="#">2</a></li>--}}
                    {{--                        <li><a class="page-number-item" href="#">3</a></li>--}}
                    {{--                        <li><a class="page-number-item next-link" href="#">Next</a></li>--}}
                    {{--                    </ul>--}}
                    {{--                    <p class="result-count">Showing 1-8 of 12 result</p>--}}
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            {{--                            <li class="category-item has-child-cate">--}}
                            {{--                                <a href="#" class="cate-link">Fashion & Accessories</a>--}}
                            {{--                                <span class="toggle-control">+</span>--}}
                            {{--                                <ul class="sub-cate">--}}
                            {{--                                    <li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>--}}
                            {{--                                    <li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>--}}
                            {{--                                    <li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </li>--}}
                            @foreach($categories as $category)
                                <li class="category-item">
                                    <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}"
                                       class="cate-link">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Brand</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                            <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a>
                            </li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a>
                            </li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone &
                                    Tablets</a></li>
                            <li class="list-item"><a
                                    data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>'
                                    class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down"
                                                                                               aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div><!-- brand widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price</h2>
                    <div class="widget-content">
                        <div id="slider-range"></div>
                        <p>
                            <label for="amount">Price:</label>
                            <input type="text" id="amount" readonly>
                            <button class="filter-submit">Filter</button>
                        </p>
                    </div>
                </div><!-- Price-->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Color</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list has-count-index">
                            <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
                        </ul>
                    </div>
                </div><!-- Color -->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Size</h2>
                    <div class="widget-content">
                        <ul class="list-style inline-round ">
                            <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                            <li class="list-item"><a class="filter-link " href="#">M</a></li>
                            <li class="list-item"><a class="filter-link " href="#">l</a></li>
                            <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                        </ul>
                        <div class="widget-banner">
                            <figure><img src="{{ asset('assets/images/size-banner-widget.jpg') }}" width="270"
                                         height="331" alt=""></figure>
                        </div>
                    </div>
                </div><!-- Size -->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_01.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_18.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_20.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>

{{--SEARCH PRODUCT--}}
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ URL::to('/') }}" class="link">home</a></li>
                <li class="item-link"><span>Digital & Electronics</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{ asset('assets/images/shop-banner.jpg') }}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Digital & Electronics</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby">
                            <select name="orderby" class="use-chosen" wire:model="sorting">
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="page_size">
                                <option value="3">3 per page</option>
                                <option value="6">6 per page</option>
                                <option value="9">9 per page</option>
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="24">24 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->
                @if($products->count() > 0)
                    <div class="row">

                        <ul class="product-list grid-products equal-container">
                            @foreach($products as $product)
                                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('product.details', ['slug'=>$product->slug]) }}"
                                               title="{{ $product->name }}">
                                                <figure><img
                                                        src="{{ asset('assets/images/products/').'/'.$product->image }}"
                                                        alt="{{ $product->name }}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details', ['slug'=>$product->slug]) }}"
                                               class="product-name"><span>{{ $product->name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">${{ $product->regular_price }}</span></div>
                                            <a href="javascript:;" class="btn add-to-cart"
                                               wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})">Add
                                                To Cart</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                @else
                    <p class="text-danger">Sin resultados</p>
                @endif
                <div class="wrap-pagination-info">
                    {{ $products->links('livewire.widgets.livewire-pagination-links') }}
                    {{--                    <ul class="page-numbers">--}}
                    {{--                        <li><span class="page-number-item current">1</span></li>--}}
                    {{--                        <li><a class="page-number-item" href="#">2</a></li>--}}
                    {{--                        <li><a class="page-number-item" href="#">3</a></li>--}}
                    {{--                        <li><a class="page-number-item next-link" href="#">Next</a></li>--}}
                    {{--                    </ul>--}}
                    {{--                    <p class="result-count">Showing 1-8 of 12 result</p>--}}
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            {{--                            <li class="category-item has-child-cate">--}}
                            {{--                                <a href="#" class="cate-link">Fashion & Accessories</a>--}}
                            {{--                                <span class="toggle-control">+</span>--}}
                            {{--                                <ul class="sub-cate">--}}
                            {{--                                    <li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>--}}
                            {{--                                    <li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>--}}
                            {{--                                    <li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </li>--}}
                            @foreach($categories as $category)
                                <li class="category-item">
                                    <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}"
                                       class="cate-link">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Brand</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                            <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a>
                            </li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a>
                            </li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone &
                                    Tablets</a></li>
                            <li class="list-item"><a
                                    data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>'
                                    class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down"
                                                                                               aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div><!-- brand widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price</h2>
                    <div class="widget-content">
                        <div id="slider-range"></div>
                        <p>
                            <label for="amount">Price:</label>
                            <input type="text" id="amount" readonly>
                            <button class="filter-submit">Filter</button>
                        </p>
                    </div>
                </div><!-- Price-->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Color</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list has-count-index">
                            <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
                            <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
                        </ul>
                    </div>
                </div><!-- Color -->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Size</h2>
                    <div class="widget-content">
                        <ul class="list-style inline-round ">
                            <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                            <li class="list-item"><a class="filter-link " href="#">M</a></li>
                            <li class="list-item"><a class="filter-link " href="#">l</a></li>
                            <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                        </ul>
                        <div class="widget-banner">
                            <figure><img src="{{ asset('assets/images/size-banner-widget.jpg') }}" width="270"
                                         height="331" alt=""></figure>
                        </div>
                    </div>
                </div><!-- Size -->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_01.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_18.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                           title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_20.jpg') }}"
                                                         alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>
