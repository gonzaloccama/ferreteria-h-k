<div class="">
{{--    @push('title'){{ $titlePage }}@endpush--}}
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Inicio</a>
                <span></span> Shop
                <span></span> Busqueda
            </div>
        </div>
    </div>

    <section class="mt-50 mb-50">

        <div class="container">

            <div class="row flex-row-reverse">

                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            {{--                            <p> Mostramos <strong class="text-brand">688</strong> items for you!</p>--}}
                            {{--                            @stack('pagination')--}}
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Mostrar:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> {{ $page_size }} <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li>
                                            <a class="{{ $page_size==3?'active':'' }}" href="#"
                                               wire:click.prevent="updatePagination(3)">3</a>
                                        </li>
                                        <li>
                                            <a class="{{ $page_size==6?'active':'' }}" href="#"
                                               wire:click.prevent="updatePagination(6)">6</a>
                                        </li>
                                        <li>
                                            <a class="{{ $page_size==12?'active':'' }}" href="#"
                                               wire:click.prevent="updatePagination(12)">12</a>
                                        </li>
                                        <li>
                                            <a class="{{ $page_size==24?'active':'' }}" href="#"
                                               wire:click.prevent="updatePagination(24)">24</a>
                                        </li>
                                        <li>
                                            <a class="{{ $page_size==48?'active':'' }}" href="#"
                                               wire:click.prevent="updatePagination(48)">48</a>
                                        </li>
                                        <li>
                                            <a class="{{ $page_size==96?'active':'' }}" href="#"
                                               wire:click.prevent="updatePagination(96)">96</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Ordenar por:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> ... <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li>
                                            <a class="{{ $sorting=='default'?'active':'' }}"
                                               wire:click.prevent="updateSortBy('dafault')" href="#">Por defecto</a>
                                        </li>
                                        <li>
                                            <a class="{{ $sorting=='price'?'active':'' }}"
                                               wire:click.prevent="updateSortBy('price')" href="#">Precio: Baja a
                                                Alta</a>
                                        </li>
                                        <li>
                                            <a class="{{ $sorting=='price-desc'?'active':'' }}"
                                               wire:click.prevent="updateSortBy('price-desc')" href="#">Precio: Alto a
                                                Bajo</a>
                                        </li>
                                        <li>
                                            <a class="{{ $sorting=='date'?'active':'' }}"
                                               wire:click.prevent="updateSortBy('date')" href="#">Reciente</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
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
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                               data-bs-toggle="modal"
                                               data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i>
                                            </a>
                                            @if($witems->contains($product->id))
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up product-wish"
                                                   wire:click.prevent="removeFromWishlist({{$product->id}})"
                                                   href="javascript:;"><i class="fi-rs-heart"></i>
                                                </a>
                                            @else
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                   wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"
                                                   href="javascript:;"><i class="fi-rs-heart "></i>
                                            @endif
                                            {{--                                            <a aria-label="Compare" class="action-btn hover-up"--}}
                                            {{--                                               href="shop-compare.html"><i--}}
                                            {{--                                                    class="fi-rs-shuffle"></i></a>--}}
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if($product->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
                                                <span class="hot bg-danger">En oferta</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="javascript:;">{{ $product->category->name }}</a>
                                        </div>
                                        <h2>
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h2>
                                        <div class="rating-result" title="90%">
                                            <span>
{{--                                                <span>90%</span>--}}
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            @if($product->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
                                                <span>S/ {{ $product->sale_price }}</span>
                                                <span class="old-price">S/ {{ $product->regular_price }}</span>
                                            @else
                                                <span>S/ {{ $product->regular_price }}</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up"
                                               href="javascript:;"
                                               wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})">
                                                <i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--pagination-->

                    {{ $products->links('livewire.widgets.frontend-pagination-link') }}

                </div>

                {{--                    primary-sidebar sticky-sidebar --}}
                <div class="col-lg-3">

                    <div class="widget-category mb-30" wire:ignore.self>
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">CATEGORIAS</h5>
                        <ul class="categories">
                            @php
                                $i = 0;
                            @endphp
                            @foreach($categories as $category)
                                @if($i++ < 6)
                                    <li>
                                        <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @elseif($i++ >= 6)
                                    <li>
                                        <ul class="more_slide_open" style="display: none;">
                                            <li>
                                                <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                            @if($i >= 6)
                                <div class="more_categories">Mostrar más...</div>
                            @endif
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">FILTRAR POR PRECIO</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>

                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div class="widget-content" style="padding: 10px 5px 40px 5px;">
                                    <div id="slider" wire:ignore></div>
                                </div>
                                <b class="text-gray-800">MIN:</b><b class="text-info"> ${{ $min_price }}</b><br>
                                <b class="text-gray-800">MAX:</b><b class="text-info"> ${{ $max_price }}</b>
                                {{--                            <div id="slider-range"></div>--}}
                                {{--                            <div class="price_slider_amount">--}}
                                {{--                                <div class="label-input">--}}
                                {{--                                    <span>Range:</span><input type="text" id="amount" name="price"--}}
                                {{--                                                              placeholder="Add Your Price"/>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>

                        {{--                        <div class="list-group">--}}
                        {{--                            <div class="list-group-item mb-10 mt-10">--}}
                        {{--                                <label class="fw-900">Color</label>--}}
                        {{--                                <div class="custome-checkbox">--}}
                        {{--                                    <input class="form-check-input" type="checkbox" name="checkbox"--}}
                        {{--                                           id="exampleCheckbox1" value="">--}}
                        {{--                                    <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>--}}
                        {{--                                    <br>--}}
                        {{--                                    <input class="form-check-input" type="checkbox" name="checkbox"--}}
                        {{--                                           id="exampleCheckbox2" value="">--}}
                        {{--                                    <label class="form-check-label"--}}
                        {{--                                           for="exampleCheckbox2"><span>Green (78)</span></label>--}}
                        {{--                                    <br>--}}
                        {{--                                    <input class="form-check-input" type="checkbox" name="checkbox"--}}
                        {{--                                           id="exampleCheckbox3" value="">--}}
                        {{--                                    <label class="form-check-label"--}}
                        {{--                                           for="exampleCheckbox3"><span>Blue (54)</span></label>--}}
                        {{--                                </div>--}}
                        {{--                                <label class="fw-900 mt-15">Item Condition</label>--}}
                        {{--                                <div class="custome-checkbox">--}}
                        {{--                                    <input class="form-check-input" type="checkbox" name="checkbox"--}}
                        {{--                                           id="exampleCheckbox11" value="">--}}
                        {{--                                    <label class="form-check-label"--}}
                        {{--                                           for="exampleCheckbox11"><span>New (1506)</span></label>--}}
                        {{--                                    <br>--}}
                        {{--                                    <input class="form-check-input" type="checkbox" name="checkbox"--}}
                        {{--                                           id="exampleCheckbox21" value="">--}}
                        {{--                                    <label class="form-check-label"--}}
                        {{--                                           for="exampleCheckbox21"><span>Refurbished (27)</span></label>--}}
                        {{--                                    <br>--}}
                        {{--                                    <input class="form-check-input" type="checkbox" name="checkbox"--}}
                        {{--                                           id="exampleCheckbox31" value="">--}}
                        {{--                                    <label class="form-check-label"--}}
                        {{--                                           for="exampleCheckbox31"><span>Used (45)</span></label>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>--}}
                        {{--                            Fillter</a>--}}
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10" wire:ignore>
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">NUEVOS PRODUCTOS</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach($lproducts as $lproduct)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('assets/images/products/').'/'.$lproduct->image }}" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="shop-product-detail.html">{{ $lproduct->name }}</a></h5>
                                    <p class="price mb-0 mt-5">S/ {{ $lproduct->regular_price }}</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--                    <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">--}}
                    {{--                        <img src="{{ asset('assets/frontend/imgs/banner/banner-11.jpg') }}" alt="">--}}
                    {{--                        <div class="banner-text">--}}
                    {{--                            <span>Women Zone</span>--}}
                    {{--                            <h4>Save 17% on <br>Office Dress</h4>--}}
                    {{--                            <a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>

</div>

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css"
          integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
        .noUi-tooltip {
            display: none;
        }

        .noUi-active .noUi-tooltip {
            display: block;
        }

        .noUi-pips .noUi-value-larg {
            margin-top: 1px;
            padding-top: 1px;
        }

    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"
            integrity="sha512-jWNpWAWx86B/GZV4Qsce63q5jxx/rpWnw812vh0RE+SBIo/mmepwOSQkY2eVQnMuE28pzUEO7ux0a5sJX91g8A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            window.livewire.on('addCart', () => {
                notificationSwal(`¡Se agregó extosamente al <b class="fst-italic">Carrito de compras</b>!`, 'rgba(8,129,120,0.9)');
            });

            window.livewire.on('addWishlist', () => {
                notificationSwal(`¡Se agregó extosamente <b class="fst-italic">a la Lista de deseos</b>!`, 'rgba(8,129,120,0.9)');
            });
        });

        var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start: [1, 1000],
            connect: true,
            range: {
                'min': 1,
                'max': 1000
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            }
        });

        slider.noUiSlider.on('update', function (value) {
        @this.set('min_price', value[0]);
        @this.set('max_price', value[1]);
        });

    </script>
@endpush
